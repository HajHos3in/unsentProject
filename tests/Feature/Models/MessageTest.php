<?php

namespace Tests\Feature\Models;

use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MessageTest extends TestCase
{
    use RefreshDatabase;

    public function testInsertData(): void
    {
        $messages = Message::factory()->count(5)->create();



        $this->assertDatabaseCount('messages', 5);

        $this->assertDatabaseHas('messages', [
            'name' => $messages[0]->name,
        ]);
    }

    public function testNotToAddDuplicateDataInOneHour(): void
    {
        $error = "";

        try {

            Message::factory()->count(2)->state(["ip" => "192.168.1.1"])->create();

        } catch (\Exception $exception) {
            $error = $exception->getMessage();
        }


        $this->assertDatabaseCount('messages', 1);
        $this->assertEquals("You can only send one message per hour.", $error);
    }

    public function testAddingDuplicateDataInTwoHours(): void
    {
        Message::factory()->state(["ip" => "192.168.1.1","created_at" => Carbon::now()->subHours(2)])->create();
        Message::factory()->state(["ip" => "192.168.1.1"])->create();


        $this->assertDatabaseCount('messages', 2);
    }

}

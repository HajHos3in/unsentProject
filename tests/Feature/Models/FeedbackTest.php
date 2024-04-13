<?php

namespace Tests\Feature\Models;


use App\Models\feedback;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FeedbackTest extends TestCase
{
    use RefreshDatabase;

    public function testInsertData(): void
    {
        $feedback = feedback::factory()->count(5)->create();



        $this->assertDatabaseCount('feedback', 5);

        $this->assertDatabaseHas('feedback', [
            'fullname' => $feedback[0]->fullname,
        ]);
    }

    public function testNotToAddDuplicateDataIn12Hours(): void
    {
        $error = "";

        try {

            feedback::factory()->count(2)->state(["ip" => "192.168.1.1"])->create();

        } catch (\Exception $exception) {
            $error = $exception->getMessage();
        }


        $this->assertDatabaseCount('feedback', 1);
        $this->assertEquals("You can only send one message per 12 hours.", $error);
    }

    public function testAddingDuplicateDataIn24Hours(): void
    {
        feedback::factory()->state(["ip" => "192.168.1.1","created_at" => Carbon::now()->subHours(14)])->create();
        feedback::factory()->state(["ip" => "192.168.1.1"])->create();


        $this->assertDatabaseCount('feedback', 2);
    }
}

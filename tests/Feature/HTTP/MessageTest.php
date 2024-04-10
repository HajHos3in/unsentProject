<?php

namespace Tests\Feature\HTTP;

use App\Models\Message;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MessageTest extends TestCase
{
    use RefreshDatabase;

    public function testSavingMessageWorksCorrectly(): void
    {
        $name = fake()->name();

        $response = $this->post(route("StoreMessage"),[
            "name" => $name,
            "message" => fake()->paragraph(1),
            "backgroundColor" => fake()->hexColor()
        ]);


        $response->assertStatus(200);
        $response->assertViewIs("posted");
        $response->assertViewHas('message', function (Message $message) use ($name) {
            return $message->name === $name;
        });
    }

    public function testMessageSearchWithId(): void
    {
        $this->withoutExceptionHandling();

        $messages = Message::factory()->count(20)->create();


        $response = $this->get(route("search",[
            "q" => $messages[10]->id
        ]));

        $response->assertViewIs("search");
        $response->assertSee($messages[10]->name);
    }
}

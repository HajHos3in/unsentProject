<?php

namespace Tests\Feature\HTTP;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FeedbackTest extends TestCase
{
    use RefreshDatabase;

    public function testSavingFeedbackWorksCorrectly(): void
    {
        $this->withoutExceptionHandling();

        $fullname = fake()->name();

        $response = $this->post(route("saveFeedback"),[
            "fullname" => $fullname,
            "email" => fake()->email(),
            "text" => fake()->paragraph(),
            "ip" => fake()->ipv4()
        ]);

        $response->assertRedirectToRoute("feedbackPage");
        $this->assertDatabaseHas("feedback",[
            "fullname" => $fullname
        ]);
    }
}

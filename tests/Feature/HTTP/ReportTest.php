<?php

namespace Tests\Feature\HTTP;

use App\Models\Message;
use App\Models\report;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReportTest extends TestCase
{
    use RefreshDatabase;

    public function testSendingReportWorksCorrectly(): void
    {
        $this->withoutExceptionHandling();

        $messages = Message::factory()->count(5)->create();

        $response = $this->post('/report',[
            "message_id" => $messages[3]->id
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas("reports",[
           "message_id" => $messages[3]->id
        ]);
    }

    public function testInvisibilityMessageAfterThirdReport(): void
    {
        $messages = Message::factory()->count(5)->create();

        report::factory()->count(2)->state(["message_id" => $messages[3]->id])->create();

        $response = $this->post('/report',[
            "message_id" => $messages[3]->id
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas("reports",[
            "message_id" => $messages[3]->id
        ]);
        $this->assertDatabaseHas("messages",[
            "id" => $messages[3]->id,
            "visibility" => false
        ]);

    }
}

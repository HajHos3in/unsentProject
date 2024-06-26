<?php

namespace Tests\Feature\Views;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SubmitMessageTest extends TestCase
{

    public function testSubmitMessagePageLoadedCorrectly(): void
    {
        $response = $this->get('/submit');

        $response->assertStatus(200);
        $response->assertViewIs("submit");
        $response->assertSee("ارسال پیام جدید");
        $response->assertSee('<input type="color" name="backgroundColor" class="form-control form-control-color" value="#ced4da" id="colorInput" title="Choose your color">',false);
    }
}

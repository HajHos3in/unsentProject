<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = Arr::shuffle(config("messages.names"));
        $messages = Arr::shuffle(config("messages.messages"));

        foreach ($messages as $message){
            Message::create([
                "name" => Arr::random($names),
                "message" => $message,
                "backgroundColor" => fake()->hexColor(),
                "ip" => fake()->ipv4()
            ]);
        }
    }
}

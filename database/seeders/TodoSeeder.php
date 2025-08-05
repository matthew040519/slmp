<?php

namespace Database\Seeders;

use App\Models\todos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $response = file_get_contents('https://jsonplaceholder.typicode.com/todos');
        $json = json_decode($response, true);

        foreach ($json as $todo) {
            todos::create([
                'iUserId' => $todo['userId'],
                'title' => $todo['title'],
                'completed' => $todo['completed'],
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\posts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $response = file_get_contents('https://jsonplaceholder.typicode.com/posts');
        $json = json_decode($response, true);

        if (empty($json)) {
            return; // Exit if no data is returned
        }

        foreach ($json as $post) {
            posts::updateOrCreate(
                ['id' => $post['id']], // Use id as unique identifier
                [
                    'iUserId' => $post['userId'],
                    'title' => $post['title'],
                    'body' => $post['body'],
                ]
            );
        }
    }
}

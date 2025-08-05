<?php

namespace Database\Seeders;

use App\Models\comments;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $response = file_get_contents('https://jsonplaceholder.typicode.com/comments');
        $json = json_decode($response, true);

        if (empty($json)) {
            return; // Exit if no data is returned
        }

        foreach ($json as $commentData) {
            comments::updateOrCreate(
                ['id' => $commentData['id']], // Use id as unique identifier
                [
                    'postId' => $commentData['postId'],
                    'name' => $commentData['name'],
                    'email' => $commentData['email'],
                    'body' => $commentData['body'],
                ]
            );
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\albums;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $response = file_get_contents('https://jsonplaceholder.typicode.com/albums');
        $json = json_decode($response, true);

        if (empty($json)) {
            return; // Exit if no data is returned
        }

        foreach ($json as $albumData) {
            albums::updateOrCreate(
                ['id' => $albumData['id']], // Use id as unique identifier
                [
                    'iUserId' => $albumData['userId'],
                    'title' => $albumData['title'],
                ]
            );
        }
    }
}

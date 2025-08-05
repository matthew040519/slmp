<?php

namespace Database\Seeders;

use App\Models\photos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $response = file_get_contents('https://jsonplaceholder.typicode.com/photos');
        $json = json_decode($response, true);

        if (empty($json)) {
            return; // Exit if no data is returned
        }

        foreach ($json as $photoData) {
            photos::updateOrCreate(
                ['id' => $photoData['id']], // Use id as unique identifier
                [
                    'albumId' => $photoData['albumId'],
                    'title' => $photoData['title'],
                    'url' => $photoData['url'],
                    'thumbnailUrl' => $photoData['thumbnailUrl'],
                ]
            );
        }
    }
}

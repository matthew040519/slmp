<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $response = file_get_contents('https://jsonplaceholder.typicode.com/users');
        $json = json_decode($response, true);
        // return response()->json($json);
        if (empty($json)) {
            return; // Exit if no data is returned
        }

        foreach ($json as $userData) {
            User::updateOrCreate(
                ['email' => $userData['email']], // Use email as unique identifier
                [
                    'name' => $userData['name'],
                    'username' => $userData['username'],
                    'password' => Hash::make('password'), // Use a secure password
                    'address' => json_encode($userData['address']),
                    'phone' => $userData['phone'],
                    'website' => $userData['website'],
                    'company' => json_encode($userData['company']),
                ]
            );
        }
    }
}

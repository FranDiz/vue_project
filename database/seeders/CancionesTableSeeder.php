<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class CancionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     */
    public function run()
    {
        $clientId = 'b94ff936eb4b484397fabf9f5822d61d';
        $clientSecret = '23237797c4354eae8b699e6691d8efa2';

        // Get access token
        $response = Http::asForm()->withBasicAuth($clientId, $clientSecret)->post('https://accounts.spotify.com/api/token', [
            'grant_type' => 'client_credentials',
        ]);

        $accessToken = $response->json()['access_token'];

        // Get songs data
        $response = Http::withToken($accessToken)->get('https://api.spotify.com/v1/playlists/3cEYpjA9oz9GiPac4AsH4n/tracks');

        $songs = $response->json()['items'];

        // Insert songs into database
        foreach ($songs as $song) {
            DB::table('canciones')->insert([
                'title' => $song['track']['name'],
                'cancion_path' => $song['track']['preview_url'] ?? '',
            ]);
        }
    }
}
<?php

use Illuminate\Database\Seeder;
use App\Models\UserLink;

class UserLinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            UserLink::create([
                'user_id'    => $i,
                'link_name'       => 'TEST'.$i,
                'link' => 'https://'.str_random(5).'.com',
                'created_at'     => now(),
                'updated_at'     => now()
            ]);
        }
    }
}

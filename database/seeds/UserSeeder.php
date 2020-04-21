<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'superuser',
            'email' => 'superuser@email.com',
            'password' => bcrypt('password'),
            'email_verified_at' => Carbon::now()
        ]);
    }
}

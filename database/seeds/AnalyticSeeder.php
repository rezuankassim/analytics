<?php

use Illuminate\Database\Seeder;

class AnalyticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        config('bqanalytic.analytic')::create([
            'name' => 'get active users'
        ]);

        config('bqanalytic.analytic')::create([
            'name' => 'get new users'
        ]);

        config('bqanalytic.analytic')::create([
            'name' => 'get active users by platform'
        ]);

        config('bqanalytic.analytic')::create([
            'name' => 'get all event name with event count'
        ]);

        config('bqanalytic.analytic')::create([
            'name' => 'get users by country'
        ]);

        config('bqanalytic.analytic')::create([
            'name' => 'get total event count by event name'
        ]);

        config('bqanalytic.analytic')::create([
            'name' => 'get total event count by users'
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $colors = [
            ['color' => 'Red'],
            ['color' => 'Orange'],
            ['color' => 'Yellow'],
            ['color' => 'Green'],
            ['color' => 'Blue'],
            ['color' => 'Indigo'],
            ['color' => 'Violet'],
        ];

        DB::table('colors')->insert($colors);

        $votes = [
            ['city' => 'Anchorage', 'color' => 'Blue', 'votes' => 10000 ],
            ['city' => 'Anchorage', 'color' => 'Yellow', 'votes' => 15000 ],
            ['city' => 'Brooklyn', 'color' => 'Red', 'votes' => 100000 ],
            ['city' => 'Brooklyn', 'color' => 'Blue', 'votes' => 250000 ],
            ['city' => 'Detroit', 'color' => 'Red', 'votes' => 160000 ],
            ['city' => 'Selma', 'color' => 'Yellow', 'votes' => 15000 ],
            ['city' => 'Selma', 'color' => 'Violet', 'votes' => 5000 ],
        ];

        DB::table('votes')->insert($votes);

    }
}

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 1; $i <= 50; $i++) {
            $sitegroup_id = rand(1, 2);

            $artist_id = DB::table('Artists')->insertGetId([
                'name' => str_random(15),
                'sitegroup_id' => $sitegroup_id
            ]);
           

            for ($x = 1; $x <= rand(1,4); $x++) {

                $single_id = DB::table('SINGLES')->insertGetId([
                    'sitegroup_id' => $sitegroup_id,
                    'sideA' => str_random(25),
                    'sideB' => str_random(25)
                ]);

                DB::table('SINGLE_artists')->insert([
                    'single_id' => $single_id,
                    'artist_id' => $artist_id
                ]);
            }
        }

    }
}

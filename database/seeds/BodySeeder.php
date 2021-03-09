<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BodySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('body_types')->insert([
            'name' => 'Sedan',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('body_types')->insert([
            'name' => 'Coupe',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('body_types')->insert([
            'name' => 'SUV',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('body_types')->insert([
            'name' => 'Hatchback',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('body_types')->insert([
            'name' => 'Tagra',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}

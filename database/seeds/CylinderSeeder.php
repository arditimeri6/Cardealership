<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CylinderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cylinders')->insert([
            'amount' => '1.5',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('cylinders')->insert([
            'amount' => '2.0',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('cylinders')->insert([
            'amount' => '2.5',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('cylinders')->insert([
            'amount' => '3.0',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('cylinders')->insert([
            'amount' => '3.5',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('cylinders')->insert([
            'amount' => '4.0',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}

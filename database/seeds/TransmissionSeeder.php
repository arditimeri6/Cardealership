<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TransmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transmissions')->insert([
            'name' => 'Auto',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('transmissions')->insert([
            'name' => 'Mechanic',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('equipments')->insert([
            'name' => 'ABS',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('equipments')->insert([
            'name' => 'Panoramic',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('equipments')->insert([
            'name' => 'Differential lock',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('equipments')->insert([
            'name' => 'Velor interior',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('equipments')->insert([
            'name' => 'Radion/CD',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('equipments')->insert([
            'name' => 'Adjustable suspension',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('equipments')->insert([
            'name' => 'EDS',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('equipments')->insert([
            'name' => 'Protection framework',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('equipments')->insert([
            'name' => 'Tinted glass',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('equipments')->insert([
            'name' => 'Alloy wheels',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('equipments')->insert([
            'name' => 'Heated seats',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('equipments')->insert([
            'name' => 'Leather upholstery',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('equipments')->insert([
            'name' => 'ESP',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('equipments')->insert([
            'name' => 'Tow',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('equipments')->insert([
            'name' => 'Electric windows',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('equipments')->insert([
            'name' => 'Electric mirrors',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('equipments')->insert([
            'name' => 'Parking sensors',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('equipments')->insert([
            'name' => 'Hatch',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('equipments')->insert([
            'name' => 'Air Conditioning',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('equipments')->insert([
            'name' => 'Traction control',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('equipments')->insert([
            'name' => 'Immobilizer',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('equipments')->insert([
            'name' => 'Heated windscreen',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('equipments')->insert([
            'name' => 'Rain sensors',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('equipments')->insert([
            'name' => 'Xenon',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('equipments')->insert([
            'name' => 'Airbag',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('equipments')->insert([
            'name' => 'Board computer',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('equipments')->insert([
            'name' => 'Auxiliary heating',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('equipments')->insert([
            'name' => 'Autopilot',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('equipments')->insert([
            'name' => 'Power steering',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('equipments')->insert([
            'name' => '4WD',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('equipments')->insert([
            'name' => 'Alarm',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('equipments')->insert([
            'name' => 'Steering wheel control',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('equipments')->insert([
            'name' => 'Central locking',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('equipments')->insert([
            'name' => 'Fog lights',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('equipments')->insert([
            'name' => 'Navigation system',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}

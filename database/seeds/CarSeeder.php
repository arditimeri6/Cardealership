<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cars')->insert([
            'manufacturer_id' => 1,
            'model_id' => 1,
            'body_type_id' => 1,
            'fuel_type_id' => 3,
            'transmission_id' => 1,
            'door_id' => 3,
            'cylinder_id' => 4,
            'hp' => 100,
            'color_id' => 1,
            'year' => 2011,
            'vin_number' => '4T1BG22K2VU147222',
            'price' => 15000,
            'origin_id' => 1,
            'registration_id' => 1,
            'first_registration' => 2011,
            'condition_id' => 2,
            'mileage' => 50000,
            'co2_emission' => '4.6',
            'slider' => 1,
            'photos' => '["20042019_150025_A186772_full.jpg", "20042019_150028_A186773_full.jpg", "20042019_150028_fotonoticia_20180620122125_640.jpg", "20042019_151123_audi_a1_sportback_35_tfsi_s_line_4.jpeg"]',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('cars')->insert([
            'manufacturer_id' => 2,
            'model_id' => 9,
            'body_type_id' => 2,
            'fuel_type_id' => 3,
            'transmission_id' => 1,
            'door_id' => 3,
            'cylinder_id' => 4,
            'hp' => 120,
            'color_id' => 2,
            'year' => 2012,
            'vin_number' => '3GNBABDB4AS603662',
            'price' => 17000,
            'origin_id' => 2,
            'registration_id' => 2,
            'first_registration' => 2012,
            'condition_id' => 2,
            'mileage' => 75000,
            'co2_emission' => '3.7',
            'slider' => 1,
            'photos' => '["20042019_150313_ogi2-2019-mercedes-benz-a-class-sedan-002.jpg", "20042019_150314_1-mercedes-benz-a-class-saloon-2018-fd-hero-front.jpg", "20042019_150315_mercedes-benz-a220-white_001.jpg"]',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('cars')->insert([
            'manufacturer_id' => 3,
            'model_id' => 18,
            'body_type_id' => 3,
            'fuel_type_id' => 3,
            'transmission_id' => 2,
            'door_id' => 3,
            'cylinder_id' => 4,
            'hp' => 135,
            'color_id' => 3,
            'year' => 2015,
            'vin_number' => '1FAFP36302W266794',
            'price' => 31000,
            'origin_id' => 1,
            'registration_id' => 1,
            'first_registration' => 2015,
            'condition_id' => 2,
            'mileage' => 20000,
            'co2_emission' => '2.5',
            'slider' => 1,
            'photos' => '["20042019_150716_automotive-the-2016-bmw-m2-unveil-2015-the-2016-bmw-m2.jpg", "20042019_150717_automotive-the-2016-bmw-m2-unveil-2015-the-2016-bmw-m2 _2).jpg", "20042019_150718_automotive-the-2016-bmw-m2-unveil-2015-the-2016-bmw-m2 _1).jpg"]',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}

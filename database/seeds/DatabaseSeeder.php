<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ManufacturerSeeder::class,
            ModelSeeder::class,
            BodySeeder::class,
            FuelSeeder::class,
            TransmissionSeeder::class,
            DoorSeeder::class,
            CylinderSeeder::class,
            ColorSeeder::class,
            OriginSeeder::class,
            RegistrationSeeder::class,
            ConditionSeeder::class,
            CarSeeder::class,
            EquipmentSeeder::class,
        ]);

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admini'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Pegawai;
class PegawaiSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create();
        foreach (range(1, 100) as $i) {
        	# code...
        	Pegawai::create([
        		'name' => $faker->name,
        		'priority' => $faker->priority,
        		'location' => $faker->location,
        		'time_start' =>$faker->time_start,
        		'username'  =>$faker->username,
        		'password' =>$faker->password,	
        	]);
        }
    }
}

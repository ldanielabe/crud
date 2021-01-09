<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Client::class, 20)->create();
        /**
        *  DB::table('clients')->insert([
        *    'identification'=>rand(1000000,9999999),
        *   'name' => Str::random(10),
        *    'address'=>'Calle '.rand(0,999) .' Número '. rand(0,999) . Str::random(2) .' - ' .rand(0,999),
        *    'email' => Str::random(10).'@gmail.com',
        *    'phone' => '31'.rand(1000000,9999999),
        *]);
         */
    }
}

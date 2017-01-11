<?php

use Illuminate\Database\Seeder;
use Illumiate\Database\Eloquent\Model;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Administrador',
            'email'=>'admin@courses.com',
            'password'=>bcrypt('cbtis2014$')
        ]);
    }
}

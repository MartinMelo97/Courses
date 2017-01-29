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
        //$this->call(InstitucionSeeder::class);
        //$this->call(AdminSeeder::class);
        //$this->call(DocenteSeeder::class);
        //$this->call(AlumnoSeeder::class);
        //$this->call(CategoriaSeeder::class);
        //$this->call(CursoSeeder::class);
        //$this->call(TagSeeder::class);
        //$this->call(ComentarioSeeder::class);
        //$this->call(VentajaSeeder::class);
        //$this->call(TemarioSeeder::class);
        $this->call(ManyToManySeeders::class);
        // $this->call(UsersTableSeeder::class);
    }
}

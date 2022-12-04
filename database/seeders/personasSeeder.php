<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class personasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\persona::create(['nombre'=>'persona 1','correo'=>'persona1@test.com']);
        \App\Models\persona::create(['nombre'=>'persona 2','correo'=>'persona2@test.com']);

        \App\Models\persona::factory(20)->create();
    }
}

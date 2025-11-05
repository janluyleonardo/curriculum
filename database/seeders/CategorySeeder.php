<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Deportes',
                'state' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Arte',
                'state' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Música',
                'state' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tecnología',
                'state' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Viajes',
                'state' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lectura',
                'state' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cocina',
                'state' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Juegos',
                'state' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cine',
                'state' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fotografía',
                'state' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Idiomas',
                'state' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ciencia',
                'state' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Negocios',
                'state' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Salud',
                'state' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Manualidades',
                'state' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

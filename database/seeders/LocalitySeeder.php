<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('localities')->insert([
            [
                'name' => 'Usaquén',
                'postal_code' => '110111',
                'area' => '65.54',
                'population' => '503.767',
                'density' => '7686.4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Chapinero',
                'postal_code' => '110211',
                'area' => '35.78',
                'population' => '139.701',
                'density' => '3904.44',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Santa Fé',
                'postal_code' => '110311',
                'area' => '44.82',
                'population' => '109.195',
                'density' => '2436.3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'San Cristóbal',
                'postal_code' => '110411',
                'area' => '48.83',
                'population' => '402.554',
                'density' => '8243.98',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Usme',
                'postal_code' => '110511',
                'area' => '122.63',
                'population' => '457.302',
                'density' => '3729.12',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tunjuelito',
                'postal_code' => '110611',
                'area' => '10.79',
                'population' => '217.139',
                'density' => '20124.11',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bosa',
                'postal_code' => '110711',
                'area' => '24.22',
                'population' => '681.234',
                'density' => '28126.91',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kennedy',
                'postal_code' => '110811',
                'area' => '38.72',
                'population' => '1092.110',
                'density' => '28205.31',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fontibón',
                'postal_code' => '110911',
                'area' => '33.32',
                'population' => '395.122',
                'density' => '11858.41',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Engativá',
                'postal_code' => '111011',
                'area' => '36.06',
                'population' => '891.530',
                'density' => '24723.52',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Suba',
                'postal_code' => '111111',
                'area' => '101.07',
                'population' => '1124.692',
                'density' => '11127.85',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Barrios Unidos',
                'postal_code' => '111211',
                'area' => '11.92',
                'population' => '243.874',
                'density' => '20459.24',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Teusaquillo',
                'postal_code' => '111311',
                'area' => '14.2',
                'population' => '153.133',
                'density' => '10.784',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Los Mártires',
                'postal_code' => '111411',
                'area' => '6.53',
                'population' => '99.423',
                'density' => '15225.65',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Antonio Nariño',
                'postal_code' => '111511',
                'area' => '4.99',
                'population' => '111.637',
                'density' => '22372.12',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Puente Aranda',
                'postal_code' => '111611',
                'area' => '17.24',
                'population' => '257.242',
                'density' => '14921.25',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'La Candelaria',
                'postal_code' => '111711',
                'area' => '1.83',
                'population' => '24.088',
                'density' => '13162.84',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rafael Uribe Uribe',
                'postal_code' => '111811',
                'area' => '13.44',
                'population' => '374.246',
                'density' => '27845.68',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ciudad Bolívar',
                'postal_code' => '111911',
                'area' => '130',
                'population' => '733.859',
                'density' => '5645.06',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sumapaz',
                'postal_code' => '112011',
                'area' => '780.96',
                'population' => '6.529',
                'density' => '8.36',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

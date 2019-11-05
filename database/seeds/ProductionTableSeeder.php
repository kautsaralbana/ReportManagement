<?php

use App\Models\Production;
use Illuminate\Database\Seeder;

class ProductionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productions = [
      		[
            	'id_production' => 1,
            	'name' => 'PRA',
            	'is_active' => true,
            	'location_id' => 1,
            ],
            [
            	'id_production' => 2,
            	'name' => 'PRB',
            	'is_active' => true,
            	'location_id' => 1,
            ],
            [
            	'id_production' => 3,
            	'name' => 'PRE',
            	'is_active' => true,
            	'location_id' => 4,
            ],
            [
            	'id_production' => 4,
            	'name' => 'PRF',
            	'is_active' => true,
            	'location_id' => 4,
            ],
            [
            	'id_production' => 5,
            	'name' => 'PRG',
            	'is_active' => true,
            	'location_id' => 2,
            ],
            [
            	'id_production' => 6,
            	'name' => 'PRC',
            	'is_active' => true,
            	'location_id' => 4,
            ]
        ];
        Production::insert($productions);
    }
}

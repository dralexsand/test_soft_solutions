<?php

namespace Database\Seeders;

use App\Traits\SeederDataTrait;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarModelSeeder extends Seeder
{
    use SeederDataTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = self::listBrands();

        $brands = DB::table('brands')->get();

        // id, brand_id, name, created_at, updated_at

        foreach ($brands as $brand) {

            foreach ($list as $brandName => $modeNames) {

                if ($brand->name == $brandName) {

                    foreach ($modeNames as $modeName) {
                        $date = date('Y-m-d H:i:s');

                        DB::table('car_models')->insert([
                            'brand_id' => $brand->id,
                            'name' => $modeName,
                            'created_at' => $date,
                            'updated_at' => $date,
                        ]);
                    }
                }

            }
        }

    }
}

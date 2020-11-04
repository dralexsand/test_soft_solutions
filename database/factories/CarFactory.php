<?php

namespace Database\Factories;

use App\Models\Car;
use App\Traits\SeederDataTrait;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class CarFactory extends Factory
{
    use SeederDataTrait;

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Car::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $transmissions = DB::table('transmissions')->get();
        $colors = DB::table('colors')->get();
        $brands = DB::table('brands')->get();

        $date = date('Y-m-d H:i:s');
        $photo = ucfirst(strtolower(self::generateRandomString() . '.jpg'));
        $brand_id = self::getRandomValueFromObject($brands)['id'];
        $model_id = DB::table('brands')->where('id', $brand_id)->get()[0]->id;
        $car_created_year = rand(1886, (int)date('Y'));
        $car_number = self::generateCarNumber();
        $color_id = self::getRandomValueFromObject($colors)['id'];
        $transmission_id = self::getRandomValueFromObject($transmissions)['id'];
        $price_per_day = round(rand(100, 1000) + rand(100, 1000) / 10000, 2);

        return [
            'photo' => $photo,
            'brand_id' => $brand_id,
            'model_id' => $model_id,
            'car_created_year' => $car_created_year,
            'car_number' => $car_number,
            'color_id' => $color_id,
            'transmission_id' => $transmission_id,
            'price_per_day' => $price_per_day,

            'created_at' => $date,
            'updated_at' => $date,
        ];
    }
}

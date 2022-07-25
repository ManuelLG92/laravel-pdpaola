<?php

namespace Database\Factories\Product;

use App\Models\Product\Product;
use App\Models\Product\ProductProperties;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            ProductProperties::NAME => fake()->name(),
            ProductProperties::STOCK => fake()->numberBetween(100,1000),
            ProductProperties::PRICE => fake()->numberBetween(1, 2000),
        ];
    }

    public static function byTimes(int $times = 20): array
    {
        $productsId = [];
        for (; $times > 0; $times--){
            $product = Product::create(
                [
                    ProductProperties::NAME => fake()->company(),
                    ProductProperties::STOCK => fake()->numberBetween(100,1000),
                    ProductProperties::PRICE => fake()->numberBetween(1, 2000),
                ]
            );
            $product->save();
            $productsId[] = $product->attributesToArray()['id']->serialize();
        }

        return $productsId;
    }
}

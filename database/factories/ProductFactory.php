<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    public function definition(): array
    {
        $coffeeTypes = ['Espresso', 'Pour Over', 'Cold Brew', 'French Press', 'Americano'];
        $teaTypes = ['Green Tea', 'Black Tea', 'Oolong', 'Chai', 'Herbal'];
        $origins = ['Ethiopia', 'Colombia', 'Japan', 'India', 'Sri Lanka', 'China', 'Brazil', 'Kenya'];

        $category = Category::inRandomOrder()->first();
        $types = $category->name === 'Coffee' ? $coffeeTypes : $teaTypes;
        $type = $this->faker->randomElement($types);
        $origin = $this->faker->randomElement($origins);

        return [
            'category_id' => $category->id,
            'name' => $origin . ' ' . $type,
            'description' => $this->faker->sentence(12),
            'price' => $this->faker->randomFloat(2, 49, 399),
            'type' => $type,
            'origin' => $origin,
            'weight_grams' => $this->faker->randomElement([100, 150, 250, 500, 1000]),
            'stock' => $this->faker->numberBetween(0, 100),
        ];
    }
}

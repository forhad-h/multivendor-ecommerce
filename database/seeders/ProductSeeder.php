<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Product;
use App\Models\ProductPrice;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Exception
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        Product::factory()->times(100)
            ->create()
            ->each(function (Product $product) use ($faker) {
                print_r($product->toArray());

                // Start => image upload section
                for ($x = 0; $x <= 3; $x++) {
                    $image_path = $faker->imageUrl(Product::PRODUCT_WIDTH, Product::PRODUCT_HEIGHT);
                    $product->images()->create([ // save an image
                        'url' => $image_path,
                        'type' => 'lg',
                    ]);
                }
                // End => image upload section
            });
    }
}

<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newproduct = new Product();
        $newproduct->name = "shoes";
        $newproduct->price = "20";
        $newproduct->image = "1664192157.jpg";
        $newproduct->serial_number = "100022";
        $newproduct->stock = "20";
        $newproduct->category_id = "1";
        $newproduct->description = "New shoes";
        $newproduct-> save();

        $newproduct = new Product();
        $newproduct->name = "Bags";
        $newproduct->price = "20";
        $newproduct->image = "1664193959.jpg";
        $newproduct->serial_number = "100022";
        $newproduct->stock = "20";
        $newproduct->category_id = "2";
        $newproduct->description = "New Bags";
        $newproduct-> save();

        $newproduct = new Product();
        $newproduct->name = "Belt";
        $newproduct->price = "20";
        $newproduct->image = "1664563884.jpg";
        $newproduct->serial_number = "100022";
        $newproduct->stock = "20";
        $newproduct->category_id = "1";
        $newproduct->description = "New Belt";
        $newproduct-> save();
    }
}

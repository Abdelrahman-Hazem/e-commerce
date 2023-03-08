<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductUser;
class ProductUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productuser = new ProductUser();
        $productuser ->product_id = "1" ;
        $productuser ->user_id = "1" ;
        $productuser ->amount = "1" ;
        $productuser ->size = "1" ;
        $productuser ->status = "0" ;
        $productuser -> save();

    }
}

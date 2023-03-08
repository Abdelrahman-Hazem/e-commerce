<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newcategory =new Category();
        $newcategory->name_ar = "رجال" ;
        $newcategory->name_en = "Men" ;
        $newcategory->active = "1" ;
        $newcategory->save();

        $newcategory =new Category();
        $newcategory->name_ar = "نساء" ;
        $newcategory->name_en = "Women" ;
        $newcategory->active = "1" ;
        $newcategory->save(); 
        
        $newcategory =new Category();
        $newcategory->name_ar = "اطفال" ;
        $newcategory->name_en = "Kids" ;
        $newcategory->active = "1" ;
        $newcategory->save();
    }
}

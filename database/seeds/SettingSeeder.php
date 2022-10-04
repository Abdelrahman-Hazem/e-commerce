<?php
use vendor\laravel\framework\src\Illuminate\Container\Container ;
use Illuminate\Database\Seeder;
use App\Models\Setting;
class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = new Setting ();
        $setting ->site_name_en = 'Mavi' ; 
        $setting ->site_name_ar = 'مافي' ; 
        $setting -> site_title_en= 'MADE WELL';
        $setting ->site_title_ar = 'مصنوع باعلي جودة';
        $setting ->title_desc_en = 'WINTER COLLECTION';
        $setting ->title_desc_ar = 'ملابس شتوي';
        $setting ->about_us_en = 'Lorem ipsum dolor sit amet
         consectetur adictum piscing elit fusce sit amet inerdum neque ultra icies.';
        $setting ->about_us_ar = 'اولي شركات الملابس في مصر ';
        $setting ->address_en = '203 Fake St. Mountain View, San Francisco, California, USA';
        $setting ->address_ar = '203 شارع احمد ماهر المنصورة مصر';
        $setting ->phone_en = '01060809341';
        $setting ->phone_ar = '01060809341';
        $setting -> email= 'emailaddress@domain.com';
        $setting ->save();
    }
}

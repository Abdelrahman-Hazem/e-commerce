<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\admin;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newadmin = new Admin();
        $newadmin->name = "admin";
        $newadmin->email = "admin@site.com";
        $newadmin->image = "admin.jpg";
        $newadmin->role_id = 1;
        $newadmin->phone = "010";
        $newadmin->address = "admin";
        $newadmin->password = bcrypt("admin");
        $newadmin->save();
    }
}

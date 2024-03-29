<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newuser = new User();
        $newuser->name = "user";
        $newuser->email = "user@site.com";
        $newuser->image = "user";
        $newuser->address = "49 street";
        $newuser->phone = "01060809341";
        $newuser->password = bcrypt("user");
        $newuser->save();
    }
}

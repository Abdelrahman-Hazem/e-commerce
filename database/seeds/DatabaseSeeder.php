<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(CategorySeeder::class);
         $this->call(AdminSeeder::class);
         $this->call(UserSeeder::class);
         $this->call(ProductSeeder::class);
         $this->call(ProductUserSeeder::class);
         $this->call(SettingSeeder::class);
    }
}

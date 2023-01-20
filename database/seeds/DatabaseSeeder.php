<?php

use Illuminate\Database\Seeder;
use App\Client;
use App\Product;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\Client::class, 30)->create();
        factory(App\Product::class, 30)->create();
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Client;
use App\Product;
use App\Manufacturer;
use App\Invoice;


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
        factory(App\Manufacturer::class, 10)->create();
    }
}

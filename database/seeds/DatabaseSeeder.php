<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

         $this->call(CardSeeder::class);

        Model::reguard();
    }

    /*
     *
     * php artisan db:seed
     * php artisan db:seed --class=CardSeeder
     *
     **/
}

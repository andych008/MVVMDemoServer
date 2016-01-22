<?php

use Illuminate\Database\Seeder;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Card::class, 'female', 50)->create();
        factory(App\Card::class, 'male', 50)->create();
    }
}

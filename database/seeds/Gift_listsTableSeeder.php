<?php

use Illuminate\Database\Seeder;

class Gift_listsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\GiftList::class, 40)->create();
    }
}

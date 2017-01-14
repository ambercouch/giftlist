<?php

use Illuminate\Database\Seeder;
use App\GiftList;

class GiftsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $giftlists = GiftList::get();
        foreach ($giftlists as $giftlist)
        {
            factory(App\Gift::class, 10)->create(array('gift_list_id' => $giftlist->id));
        }

    }
}

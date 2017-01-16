<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    //
    public function giftlist()
    {
        return $this->belongsTo('App\Giftlist', 'gift_list_id');
    }
}

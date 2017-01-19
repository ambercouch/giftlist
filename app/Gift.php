<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    //
    protected $fillable = ['gift_name', 'gift_url'];

    public function giftlist()
    {
        return $this->belongsTo('App\Giftlist', 'gift_list_id');
    }
}

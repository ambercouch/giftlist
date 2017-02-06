<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiftList extends Model
{
    protected $fillable = ['gift_list_name','user_id'];
    /**
     * Get the gifts for the list.
     */
    public function gifts()
    {
        return $this->hasMany('App\Gift');
    }
}

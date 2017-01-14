<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiftList extends Model
{
    //
    /**
     * Get the gifts for the list.
     */
    public function gifts()
    {
        return $this->hasMany('App\Gift');
    }
}

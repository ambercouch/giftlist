<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GiftList extends Model
{
    use SoftDeletes;

    protected $fillable = ['gift_list_name','user_id'];
    protected $dates = ['deleted_at'];
    /**
     * Get the gifts for the list.
     */
    public function gifts()
    {
        return $this->hasMany('App\Gift');
    }
}

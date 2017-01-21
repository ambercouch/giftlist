<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gift extends Model
{
    use SoftDeletes;

    protected $fillable = ['gift_name', 'gift_url'];
    protected $dates = ['deleted_at'];

    public function giftlist()
    {
        return $this->belongsTo('App\Giftlist', 'gift_list_id');
    }
}

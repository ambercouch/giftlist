<?php

namespace App\Http\Controllers\Web;

use App\GiftList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class GiftListController extends Controller
{
    function __construct()
    {

    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('giftlists');
    }



    public function authUser()
    {
        return  Auth::guard('api')->user();
    }
}

<?php

namespace App\Http\Controllers\Web;

use App\GiftList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\User;

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

    public function show($id)
    {
        return view('giftlist')->with('id', $id);
    }

    public function gift($id)
    {
        return view('gift')->with('id', $id);
    }



    public function authUser()
    {
        return  Auth::guard('api')->user();
    }
}

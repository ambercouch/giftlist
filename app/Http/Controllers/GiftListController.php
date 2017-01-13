<?php

namespace App\Http\Controllers;

use App\GiftList;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

class GiftListController extends ApiController
{
    protected $authUser;

    function __construct()
    {
        $this->authUser = $this->authUser();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return 'Auth User' . $this->authUser->id;

        $limit = Input::get('limit', 3);
        $giftlists = GiftList::where('user_id', $this->authUser->id)->paginate($limit);



        return $this->respondWithPagination($giftlists, [
            'data' => $giftlists->toArray()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $giftlist = GiftList::where('user_id', $this->authUser()->id)->find($id);

        if (!$giftlist)
        {
            return $this->respondNotFound('Giftlist not found');
        }

        return $this->respond([
            'data' => $giftlist
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

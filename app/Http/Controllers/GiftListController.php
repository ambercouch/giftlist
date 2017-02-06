<?php

namespace App\Http\Controllers;

use App\GiftList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;

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

        $limit = Input::get();
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
        $userId = $this->authUser()->id;
        $request->request->add(['user_id' => $userId]);
//        dd($request->all());
        $validator = Validator::make($request->all(), [
            'gift_list_name' => 'required|max:255',
            'user_id' => 'required'
        ]);

        if ($validator->fails())
        {
            $errors = $validator->messages()->toArray();
            return $this->respondUnprocessable('Unable to Create Gift List', $errors);
        }

        $giftList = GiftList::create($request->all());

        $giftList = GiftList::where('id', $giftList->id)->get();

        return $this->respondCreated(['data' => $giftList], 'New gift List created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $giftlist = GiftList::with('gifts')->where('user_id', $this->authUser()->id)->find($id);

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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gift;
use Illuminate\Support\Facades\Input;
use Validator;

class GiftController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        return 'some gift';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gift = Gift::with('giftlist')->find($id);


        if (!$gift)
        {
            return $this->respondNotFound('Gift not found');
        }

        return $this->respond([
            'data' => $gift
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


        $validator = Validator::make($request->all(), [
            'gift_name' => 'required|max:255',
            'gift_url' => 'required',
        ]);

        if ($validator->fails())
        {
            $errors = $validator->messages()->toArray();
            return $this->respondUnprocessable('Unable to Create booking sheet', $errors);
        }

        $request->request->remove('_method');

        $gift = Gift::find($id)->update($request->all());

        return $this->respondCreated(['data' => $gift], 'Gift updated.');

        //$gift = Booking_sheet::create($this->booking_sheetTransformer->transformBack(Input::all()));

        //return $request->all();
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

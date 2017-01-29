@extends('layouts.app')

@section('content')

<div class="container">
    <flashmessage></flashmessage>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <giftlist listid="{{$id}}" ></giftlist>

            <addgift listid="{{$id}}" ></addgift>
        </div>
    </div>
</div>

@endsection

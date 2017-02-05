@extends('layouts.app')

@section('content')

<div class="container">
    <flashmessage></flashmessage>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <giftlist v-bind:giftlist="shared.state.giftlist" v-on:updategiftlist="updateGiftList" listid="{{$id}}" ></giftlist>

            <addgift listid="{{$id}}" ></addgift>
        </div>
    </div>
</div>

@endsection

@extends('layouts.app')

@section('content')
    @verbatim

<div class="container">
    <flashmessage v-bind:flashmessage="shared.state.flashMessage" ></flashmessage>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <GiftListList v-bind:giftlists="shared.state.giftlists" v-on:updategiftlists="updateGiftLists"></GiftListList>

            <addgiftlist  v-on:refreshgiftlist="refreshGiftList" v-on:updateflashmessage="updateFlashMessage"></addgiftlist>
        </div>
    </div>
</div>
    @endverbatim
@endsection

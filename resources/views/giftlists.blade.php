@extends('layouts.app')

@section('content')
    @verbatim

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <GiftListList v-bind:giftlists="shared.state.giftlists" v-on:updategiftlists="updateGiftLists"></GiftListList>

            <addgiftlist></addgiftlist>
        </div>
    </div>
</div>
    @endverbatim
@endsection

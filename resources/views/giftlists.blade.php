@extends('layouts.app')

@section('content')
    @verbatim
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>Your Gift List.</h2>

            <ul id="giftList">
                <li>{{message}}</li>
            </ul>

        </div>
    </div>
</div>
    @endverbatim
@endsection

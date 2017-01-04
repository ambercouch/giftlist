@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>Your Gift List.</h2>
            <ul>

            @foreach ($giftlists as $list)
                <li>{{ $list->gift_list_name }}</li>
            @endforeach
            </ul>
            {{$giftlists->links()}}
        </div>
    </div>
</div>
@endsection

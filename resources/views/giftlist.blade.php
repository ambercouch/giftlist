@extends('layouts.app')

@section('content')
    a single list {{$id}}
    @verbatim

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
           a single list {{$id}}
        </div>
    </div>
</div>
    @endverbatim
@endsection

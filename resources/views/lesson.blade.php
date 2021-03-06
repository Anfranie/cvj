@extends('layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Show Event</div>
                <div class="card-body">

                    <ul class="item-group">
                        @foreach($event as $eve)
                            <li class="list-group-item">
                                <h2>{{ $eve->title }}</h2>
                                <hr>
                                {{ $eve->startdate }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
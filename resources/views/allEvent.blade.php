@extends('layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Show Events</div>

                <div class="card-body">
                    <ul class="item-group">

                        @foreach($Events as $event)
                            <li class="list-group-item">
                                <h2>{{ $event->data['levent']['title'] }}</h2>
                                <hr>
                                {{ $event->data['event']['body'] }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
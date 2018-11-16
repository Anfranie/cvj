@extends('layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Read Lesson</div>
                <div class="card-body">

                    <ul class="item-group">
                        @foreach($lesson as $les)
                            <li class="list-group-item">
                                <h2>{{ $les->title }}</h2>
                                <hr>
                                {{ $les->body }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
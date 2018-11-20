@extends('layout.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Event to Calendar Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Event Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-sm-4">

          <h1>Add Event</h1>
          {!! Form::open(['action' => 'AddEventController@store', 'method' => 'POST']) !!}
            <div class="form-group">
              {{Form::label('title', 'Title')}}
              {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
            </div>
            <div class="form-group">
              {{Form::label('startdate', 'Start Date')}}
              {{Form::text('startdate', '', ['class' => 'form-control', 'placeholder' => 'Start Date'])}}
            </div>
            <div class="form-group">
              {{Form::label('enddate', 'End Date')}}
              {{Form::text('enddate', '', ['class' => 'form-control', 'placeholder' => 'End Date'])}}
            </div>
            {{Form::submit('Submit', ['class' =>'btn btn-primary'])}}	
          {!! Form::close() !!}

        </div>  
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
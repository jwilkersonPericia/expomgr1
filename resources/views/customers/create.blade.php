@extends('layouts.dash')

@section('content')
  <h1>Create Customer</h1>
  {!! Form::open(['action' => 'CustomersController@store', 'method' => 'POST']) !!}
    {{Form::bsText('name')}}
    {{Form::bsSubmit('Submit', ['class' => 'btn btn-primary'])}}
  {!! Form::close() !!}
  <hr />
@endsection

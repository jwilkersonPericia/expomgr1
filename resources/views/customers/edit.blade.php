@extends('layouts.dash')

@section('content')
  <a class="btn btn-primary" href="/customer/{{$customer->id}}" role="button">Back</a><br /><br />
  <h1>Edit Customer</h1>
  {!! Form::open(['action' => ['CustomersController@update', $customer->id], 'method' => 'POST']) !!}
    {{Form::bsText('name', $customer->name)}}
    {{Form::bsSubmit('Submit', ['class' => 'btn btn-primary'])}}
  {!! Form::close() !!}
@endsection

@extends('layouts.dash')

@section('content')
  <a class="btn btn-primary" href="/order/{{$order->id}}" role="button">Back</a><br /><br />
  <h1>Edit Order</h1>
  {!! Form::open(['action' => ['OrdersController@update', $order->id], 'method' => 'POST']) !!}
    {{Form::bsNumber('orderNo', $order->orderNo)}}
    {{Form::bsText('customer', $order->customer)}}
    {{Form::bsText('origin', $order->origin)}}
    <div class="form-group">
      {{Form::label('tf', 'To/From')}}
      {{Form::select('tf', ['To','From'], $order->tf, ['class' => 'form-control'])}}
    </div>
    {{Form::bsText('show', $order->show)}}
    {{Form::bsNumber('boothNo', $order->boothNo)}}
    {{Form::bsText('carrier', $order->carrier)}}
    <div class="form-group">
      {{Form::label('estPrice', 'Estimated Price $')}}
      {{Form::number('estPrice', $order->estPrice, ['step' =>'0.01'])}}
    </div>
    <div class="form-group">
      {{Form::label('shipDate', 'Estimated Ship Date')}}
      {{Form::date('shipDate', $order->shipDate)}}
    </div>
    <div class="form-group">
      {{Form::label('dlvDate', 'Estimated Delivery Date')}}
      {{Form::date('dlvDate', $order->dlvDate)}}
    </div>
    <div class="form-group">
      {{Form::label('stopNo', 'Stop (if applicable)')}}
      {{Form::select('stopNo', ['ONE','TWO', 'THREE', 'FOUR', 'FIVE'], $order->stopNo)}}
    </div>
    {{Form::bsTextArea('comments', $order->comments)}}

    {{ Form::hidden('_method', 'PUT') }}
    {{ Form::bsSubmit('Submit', ['class'=>'btn btn-primary']) }}
  {!! Form::close() !!}
@endsection

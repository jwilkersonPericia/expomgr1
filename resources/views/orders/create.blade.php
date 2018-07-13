@extends('layouts.dash')

@section('content')
  <h1>Create Order</h1>

  {!! Form::open(['action' => 'OrdersController@store', 'method' => 'POST']) !!}
    {{Form::bsNumber('orderNo')}}
    {{Form::bsSelect('customer_id',$customers)}}
    {{Form::bsText('origin')}}
    {{Form::bsSelect('tf',['TO','FROM'])}}
    {{Form::bsText('show')}}
    {{Form::bsNumber('boothNo')}}
    {{Form::bsText('carrier')}}
    {{Form::bsNumber('estPrice', '',['step' =>'0.01'])}}
    {{Form::bsDate('shipDate')}}
    {{Form::bsDate('dlvDate')}}
    {{Form::bsSelect('stopNo',['ONE','TWO', 'THREE', 'FOUR', 'FIVE'])}}
    {{Form::bsTextArea('comments')}}
    {{Form::bsSubmit('Submit', ['class' => 'btn btn-primary'])}}
  {!! Form::close() !!}
  <hr />
@endsection
<!-- <div class="form-group">
  {{Form::label('estPrice', 'Estimated Price $')}}
  {{Form::number('estPrice', '',['step' =>'0.01'])}}
</div>
<div class="form-group">
  {{Form::label('customer_id', 'Customer:')}}
  {{Form::select('customer_id',$customers, null, ['placeholder' => ''])}}
</div>
<div class="form-group">
  {{Form::label('tf', 'To/From')}}
  {{Form::select('tf', ['TO','FROM'], null, ['placeholder' => ''])}}
</div>
<div class="form-group">
  {{Form::label('stopNo', 'Stop (if applicable)')}}
  {{Form::select('stopNo',['ONE','TWO', 'THREE', 'FOUR', 'FIVE'] , null, ['placeholder' => ''])}}
</div>
<div class="form-group">
  {{Form::label('shipDate', 'Estimated Ship Date')}}
  {{Form::date('shipDate', \Carbon\Carbon::now())}}
</div>
<div class="form-group">
  {{Form::label('dlvDate', 'Estimated Delivery Date')}}
  {{Form::date('dlvDate', \Carbon\Carbon::now())}}
</div>
-->

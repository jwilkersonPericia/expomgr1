@extends('layouts.dash')

@section('content')
    <h1>Add OrderAAAAAAAAG</h1>
    <br />
    {!! Form::open(['url' => 'addorder/submit']) !!}
      <div class="form-group">
        {{Form::label('orderNo', 'Order Number')}}
        {{Form::number('orderNo', '', ['class' => 'form-control', 'placeholder' => '125xxx'])}}
      </div>
      <div class="form-group">
        {{Form::label('customer', 'Customer (if not origin)')}}
        {{Form::text('customer', '', ['class' => 'form-control'])}}
      </div>
      <div class="form-group">
        {{Form::label('origin', 'Origin/Customer')}}
        {{Form::text('origin', '', ['class' => 'form-control'])}}
      </div>
      <div class="form-group">
        {{Form::label('tf', 'To/From')}}
        {{Form::select('tf', ['To','From'], ['class' => 'form-control'])}}
      </div>
      <div class="form-group">
        {{Form::label('show', 'Show/Whse')}}
        {{Form::text('show', '', ['class' => 'form-control'])}}
      </div>
      <div class="form-group">
        {{Form::label('boothNo', 'Booth Number')}}
        {{Form::number('boothNo', '', ['class' => 'form-control'])}}
      </div>
      <div class="form-group">
        {{Form::label('carrier', 'Carrier')}}
        {{Form::text('carrier', '', ['class' => 'form-control'])}}
      </div>
      <div class="form-group">
        {{Form::label('estPrice', 'Estimated Price $')}}
        {{Form::number('estPrice', '',['step' =>'0.01'])}}
      </div>
      <div class="form-group">
        {{Form::label('shipDate', 'Estimated Ship Date')}}
        {{Form::date('shipDate', \Carbon\Carbon::now())}}
      </div>
      <div class="form-group">
        {{Form::label('dlvDate', 'Estimated Delivery Date')}}
        {{Form::date('dlvDate', \Carbon\Carbon::now())}}
      </div>
      <div class="form-group">
        {{Form::label('stopNo', 'Stop (if applicable)')}}
        {{Form::select('stopNo', ['ONE','TWO', 'THREE', 'FOUR', 'FIVE'], null, ['placeholder' => ''])}}
      </div>
      <div class="form-group">
        {{Form::label('comments', 'Additional Comments')}}
        {{Form::textarea('comments', '', ['class' => 'form-control'])}}
      </div>
      <div>
        {{form::submit('Submit', ['class'=>'btn btn-primary'])}}
      </div>
    {!! Form::close() !!}
@endsection

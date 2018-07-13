@extends('layouts.dash')

@section('content')
  <a class="btn btn-primary" href="/orders" role="button">Back</a><br /><br />
  <h1>{{$order->orderNo}}</h1>
  <h4>{{$order->customer}}</h4>
  @if(($order->tf)==1)
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h2>Origin</h2>
          <p>{{$order->show}} Booth: {{$order->boothNo}}</p>
          <p>{{$order->dlvDate}}</p>
        </div>
        <div class="col-md-6">
          <h2>Destination</h2>
          <p>{{$order->origin}}</p>
          <p>{{$order->shipDate}}</p>
        </div>
      </div>
    </div>
  @else
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h2>Origin</h2>
          <p>{{$order->origin}}</p>
          <p>{{$order->shipDate}}</p>
        </div>
        <div class="col-md-6">
          <h2>Destination</h2>
          <p>{{$order->show}} Booth: {{$order->boothNo}}</p>
          <p>{{$order->dlvDate}}</p>
        </div>
      </div>
    </div>
  @endif
  <p>{{$order->comments}}</p>
  <hr />
  <div>
    <a href="/order/{{$order->id}}/edit" class="btn btn-secondary">Edit</a>
  </div>
@endsection

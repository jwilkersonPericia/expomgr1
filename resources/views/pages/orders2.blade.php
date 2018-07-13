@extends('layouts.dash')

@section('content')
    <h1>Orders</h1>
    <br />
    <a class="btn btn-primary" href="/addorder" role="button">Add Order</a>
    <br />
    <p>orders go here</p>
    <!-- @if(count($orders) > 0)
      @foreach($orders as $order)
        <ul class="list-group">
          <li class="list-group-item">Order Number: {{$order->orderNo}} - Customer: {{$order->customer}}</li>
          <li class="list-group-item">{{$order->origin}} {{$order->tf}} {{$order->show}} Booth Number: {{$order->boothNo}}</li>
          <li class="list-group-item">{{$order->shipDate}} - {{$order->dlvDate}}</li>
          <br>
        </ul>
      @endforeach
    @endif -->
@endsection

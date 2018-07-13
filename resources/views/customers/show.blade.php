@extends('layouts.dash')

@section('content')
  <a class="btn btn-primary" href="/customers" role="button">Back</a><br /><br />
  <h1>{{$customer->name}}</h1>
  <hr />
  <h4>Orders</h4>
    @if(count($customer->orders)>0)
      @foreach($customer->orders as $order)
        <ul class="list-group">
          <li class="list-group-item"><a href="order/{{$order->id}}">Order Number: {{$order->orderNo}} </a>- Customer: {{$order->customer}}</li>
          <li class="list-group-item">{{$order->origin}} {{$order->tf}} {{$order->show}} Booth Number: {{$order->boothNo}}</li>
          <li class="list-group-item">{{$order->shipDate}} - {{$order->dlvDate}}</li>
          <br>
        </ul>
      @endforeach
    @else
      No Orders To Display
    @endif
  <div>
    <a href="/customer/{{$customer->id}}/edit" class="btn btn-secondary">Edit</a>
  </div>
@endsection

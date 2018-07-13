@extends('layouts.dash')

@section('content')
    <h1>Customers</h1>
    <br />
    <a class="btn btn-primary" href="customer/create" role="button">Add Customer</a>
    <br />
    <p>customers go here</p>
    @if(count($customers) > 0)
      @foreach($customers as $customer)
        <ul class="list-group">
          <li class="list-group-item"><a href="customer/{{$customer->id}}">{{$customer->name}} </a></li>
          <br>
        </ul>
      @endforeach
    @endif
@endsection

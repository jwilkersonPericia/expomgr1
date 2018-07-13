@extends('layouts.dash')

@section('content')
    <h1>Quote Requests</h1>
    <br />
  <div class="list-group">
    <div class="list-group-item list-group-item-action active">
      Pending Requests
    </div>
    @if(count($quoteRequests) > 0)
        @foreach($quoteRequests as $quoteRequest)
          <a href="quoteRequest/{{$quoteRequest->id}}" class="list-group-item list-group-item-action">
            {{$quoteRequest->customerName}} -
            {{ ($quoteRequest->p_name == "NA") ? '' : $quoteRequest->p_name }}
            {{$quoteRequest->p_city}}, {{$quoteRequest->p_state}}
            {{ ($quoteRequest->roundTrip == "Yes") ? '⟷' : '→' }}
            {{$quoteRequest->d_name}} {{$quoteRequest->d_city}}, {{$quoteRequest->d_state}}
          </a>
        @endforeach
    @else
      <h6>nothing to display at this time</h6>
    @endif
  </div>
@endsection

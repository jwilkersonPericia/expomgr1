@extends('layouts.dash')

@section('content')
<div class="row">
  <a class="btn btn-primary col-md-1" href="/quoteRequests" role="button">Back</a><br />
  <div class="col-md-10"></div>
  <a class="btn btn-info col-md-1" href="/quoteRequest/{{$quoteRequest->id}}/print" target="_blank">Print</a><br />
</div>
  <h1><center>
    QUOTE REQUEST
  </center></h1>

  {{-- information_headder --}}
    <center>{{$quoteRequest->customerName}} -
    {{ ($quoteRequest->p_name == "NA") ? '' : $quoteRequest->p_name }}
    {{$quoteRequest->p_city}}, {{$quoteRequest->p_state}}
    {{ ($quoteRequest->roundTrip == "Yes") ? '⟷' : '→' }}
    {{$quoteRequest->d_name}} {{$quoteRequest->d_city}}, {{$quoteRequest->d_state}}</center>

  {{-- customer information --}}
  <div class="container">
    <table class="table table-bordered">
      <thead>
        <tr class="table-secondary">
          <th>Customer</th>
          <th>POC</th>
          <th>Phone Number</th>
          <th>Email</th>
          <th>Load</th>
          <th>Type</th>
        </tr>
      </thead>
      <tbody>
        <tr class="table-light">
          <td>{{$quoteRequest->customerName}}</td>
          <td>{{$quoteRequest->contact_first}} {{$quoteRequest->contact_last}}</td>
          <td>{{$quoteRequest->contact_phone}}</td>
          <td>{{$quoteRequest->contact_email}}</td>
          <td>{{$quoteRequest->shipType}}</td>
          <td>{{ ($quoteRequest->roundTrip == "Yes") ? 'Round Trip' : 'One Way' }}</td>
        </tr>
      </tbody>
    </table>
  </div>

  {{-- origin and destination information --}}
  <div class="card-group">
    <div class="card">
      <div class="card-header">Origin</div>
      <div class="card-body">
        <p class="card-text">
          @if($quoteRequest->p_name != "NA")
            <strong>{{$quoteRequest->p_name}}<br /></strong>
          @else
            <strong>{{$quoteRequest->customerName}}</strong><br />
          @endif
          @if($quoteRequest->p_line1 != "NA")
            {{$quoteRequest->p_line1}}<br />
          @endif
          @if($quoteRequest->p_line2 != "NA")
            {{$quoteRequest->p_line2}}<br />
          @endif
          {{ ($quoteRequest->p_city == "NA") ? '' : $quoteRequest->p_city }},
          {{ ($quoteRequest->p_state == "NA") ? '' : $quoteRequest->p_state }}
          {{ ($quoteRequest->p_zip == "NA") ? '' : $quoteRequest->p_zip }}
        </p>
      </div>
      <div class="card-footer">
        {{ ($quoteRequest->p_earlyDate == "NA") ? '' : $quoteRequest->p_earlyDate }}
        @if($quoteRequest->p_earlyDate != "NA" && $quoteRequest->p_lateDate != "NA")
           -
        @endif
        {{ ($quoteRequest->p_lateDate == "NA") ? '' : $quoteRequest->p_lateDate }}
      </div>
    </div>
    <div class="card">
      <div class="card-header">Destination</div>
      <div class="card-body">
        <p class="card-text">
            @if($quoteRequest->d_name != "NA")
              <strong>{{$quoteRequest->d_name}}</strong><br />
            @endif
            @if($quoteRequest->d_line1 != "NA")
              {{$quoteRequest->d_line1}}<br />
            @endif
            @if($quoteRequest->d_line2 != "NA")
              {{$quoteRequest->d_line2}}<br />
            @endif
            {{ ($quoteRequest->d_city == "NA") ? '' : $quoteRequest->d_city }},
            {{ ($quoteRequest->d_state == "NA") ? '' : $quoteRequest->d_state }}
            {{ ($quoteRequest->d_zip == "NA") ? '' : $quoteRequest->d_zip }}
        </p>
      </div>
      <div class="card-footer">
        {{ ($quoteRequest->d_earlyDate == "NA") ? '' : $quoteRequest->d_earlyDate }}
        @if($quoteRequest->d_earlyDate != "NA" && $quoteRequest->d_lateDate != "NA")
           -
        @endif
        {{ ($quoteRequest->d_lateDate == "NA") ? '' : $quoteRequest->d_lateDate }}
      </div>
    </div>
  </div>
  <br />

  {{-- inventory information --}}
  <h5>Inventory (coming soon)</h5>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td colspan="2">Larry the Bird</td>
        <td>@twitter</td>
      </tr>
    </tbody>
  </table>
  <br />

  {{-- billing information --}}
  <h5>Billing Information</h5>
      <strong>{{$quoteRequest->customerName}}</strong><br />
    @if($quoteRequest->b_line1 != "NA")
      {{$quoteRequest->b_line1}}<br />
    @endif
    @if($quoteRequest->b_line2 != "NA")
      {{$quoteRequest->b_line2}}<br />
    @endif
    {{ ($quoteRequest->b_city == "NA") ? '' : $quoteRequest->b_city }},
    {{ ($quoteRequest->b_state == "NA") ? '' : $quoteRequest->b_state }}
    {{ ($quoteRequest->b_zip == "NA") ? '' : $quoteRequest->b_zip }}
  <br /><br />

  <h5>Special Instructions</h5>
    <strong>Special Handling: </strong>{{$quoteRequest->handling()}}<br />
    <strong>Shuttle Required: </strong>{{$quoteRequest->shuttle()}}<br />
    <strong>Pickup Limitations: </strong>{{$quoteRequest->p_limitations()}}<br />
    <strong>Destinaion Limitations: </strong>{{$quoteRequest->d_limitations()}}<br />
    <strong>Special Services: </strong>{{$quoteRequest->services()}}<br />
    <strong>Special Equipment: </strong>{{$quoteRequest->equipment()}}<br />
  <br />

  @if($quoteRequest->comments != "NA")
    <div class="card">
      <div class="card-header">Comments</div>
      <div class="card-body">
        <p class="card-text">
          {{$quoteRequest->comments}}<br />
        </p>
      </div>
    </div>
  @endif
<br />

  @if($quoteRequest->quoteBy != "NA")
    <h4><strong>Quote needed by: </strong>{{$quoteRequest->quoteBy}}</h4>
  @endif

@endsection


  {{-- <h5>Special Instructions</h5>
  @if($quoteRequest->sHandling != "NA")
    <strong>Special Handling: </strong>{{$quoteRequest->sHandling}}<br />
  @endif
  @if($quoteRequest->shuttle != "NA")
    <strong>Shuttle Required: </strong>{{$quoteRequest->shuttle}}<br />
  @endif
  @if($quoteRequest->p_limitations != "NA")
    <strong>Limitations at origin: </strong>{{$quoteRequest->p_limitations}}<br />
  @endif
  @if($quoteRequest->d_limitations != "NA")
    <strong>Limitations at destination: </strong>{{$quoteRequest->d_limitations}}<br />
  @endif
  @if($quoteRequest->specialServices != "NA")
    <strong>Special Services: </strong>{{$quoteRequest->specialServices}}<br />
  @endif
<br /> --}}

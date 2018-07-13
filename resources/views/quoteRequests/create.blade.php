@extends('layouts.app')

@section('content')
	<script src="https://code.jquery.com/jquery-3.1.0.js"   integrity="sha256-slogkvB1K3VOkzAI8QITxV3VzpOnkeNVsKvtkYLMjfk="   crossorigin="anonymous"></script>

  <center>
    <h1>Request for Quote</h1>
  </center>
	<br><br>
  {!! Form::open(['action' => 'QuoteRequestsController@store', 'method' => 'POST']) !!}
    <div class="row">
      <div class="col-md-2 form-group required">
        {{Form::bsRadio('shipType',['Truckload', 'LTL'],null,null,'Shipment Type:')}}
      </div>
      <div class="col-md-2 form-group required">
        {{Form::bsRadio('roundTrip',['Yes', 'No'],null,null,'Quote Round-trip?')}}
      </div>
      <div class="col-md-4 form-group">
        {{ Form::label('sHandling', 'Special Handling:', ['class' => 'control-label']) }}<br />
        {{ Form::checkbox('hand1', true)}} Hazardous Materials<br />
        {{ Form::checkbox('hand2', true)}} Protect from Freezing<br />
      </div>
      <div class="col-md-4 form-group">
        {{ Form::label('shuttle', 'Shuttle Required:', ['class' => 'control-label']) }}<br />
        {{ Form::checkbox('shut1', true)}} at Origin<br />
        {{ Form::checkbox('shut2', true)}} at Destination<br />
      </div>
    </div>



    <div class="row">
      <div class="col-md-4">
        <h4 class="text-warning">Billing/Contact Information</h4>
        <div class="form-group required">
          {{Form::label('customerName', 'Billing Entity Name', ['class' => 'control-label required'])}}
          {{Form::text('customerName', '', ['class' => 'form-control', 'placeholder' => 'Billing Entity Name'])}}
        </div>
        <div class="form-group">
          {{Form::label('contactName', 'Contact Name', ['class' => 'control-label'])}}
          {{Form::text('contact_first', '', ['class' => 'form-control', 'placeholder' => 'First'])}}
          {{Form::text('contact_last', '', ['class' => 'form-control', 'placeholder' => 'Last'])}}
        </div>
        <div class="form-group">
          {{Form::label('billingAddress', 'Billing Address', ['class' => 'control-label'])}}
          {{Form::text('b_line1', '', ['class' => 'form-control', 'placeholder' => 'Address Line 1'])}}
          {{Form::text('b_line2', '', ['class' => 'form-control', 'placeholder' => 'Address Line 2'])}}
          {{Form::text('b_city', '', ['class' => 'form-control', 'placeholder' => 'City'])}}
          {{Form::bsState('b_state')}}
          {{Form::text('b_zip', '', ['class' => 'form-control', 'placeholder' => 'Zip Code'])}}
        </div>
        <div class="form-group">
            {{Form::label('contact_title', 'Position / Title', ['class' => 'control-label'])}}
            {{Form::text('contact_title', '', ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('contact_phone', 'Phone', ['class' => 'control-label'])}}
            {{Form::text('contact_phone', '', ['class' => 'form-control', 'placeholder' => '(XXX) XXX-XXXX'])}}
        </div>
        <div class="form-group">
            {{Form::label('contact_email', 'Email', ['class' => 'control-label'])}}
            {{Form::text('contact_email', '', ['class' => 'form-control'])}}
        </div>
        <div class="row">
          <div class="form-group col-md-6">
              {{Form::label('quoteBy', 'Need Quotation By:', ['class' => 'control-label'])}}
              {{ Form::date('quoteBy') }}
          </div>
          <div class="form-group col-md-6">
            {{ Form::label('urgent', 'Urgent?', ['class' => 'control-label']) }}<br />
            {{ Form::checkbox('urgent', 1)}} Yes<br />
          </div>
        </div>
      </div>



      <div class="col-md-4">
        <h4 class="text-warning">Shipment Origin</h4>
        <div class="form-group required" id="p_select">
          {{Form::label('p_type', 'Origin Location Type', ['class' => 'control-label required'])}}
          {{Form::select('p_type',[
            'Business Warehouse',
            'Tradeshow / Convention Center',
            'Freight Terminal',
            'Hotel / Conference Center',
            'Self Storage FAcility',
            'Church / School / College Campus',
            'Residence / Home'
          ], null, ['id'=>"pickup_type", 'name'=>"pickup_type", 'class' => 'form-control', 'placeholder' => ''])}}
        </div>
        <div class="form-group">
          {{ Form::label('p_limitations', 'Limitations at Origin', ['class' => 'control-label']) }}<br />
          {{ Form::checkbox('p_limit1', true)}} No Loading Dock<br />
          {{ Form::checkbox('p_limit2', true)}} Limited Access<br />
          {{Form::text('p_limitOpt', '', ['class' => 'col-xs-2"', 'placeholder' => 'Other'])}}
        </div>
        <div class="pickup_standard">
          <div class="form-group">
            {{Form::label('p_locationName', 'Location Name', ['class' => 'control-label'])}}
            {{Form::text('p_name', '', ['class' => 'form-control', 'placeholder' => ''])}}
          </div>
        </div>
        <div class="pickup_show">
          <div class="form-group">
            {{Form::label('tradeshow_info', 'Tradeshow Information (if applicable)', ['class' => 'control-label'])}}
            {{Form::text('p_show', '', ['class' => 'form-control', 'placeholder' => 'Trade Show Name'])}}
            {{Form::text('p_venue', '', ['class' => 'form-control', 'placeholder' => 'Venue Name'])}}
            {{Form::text('p_booth', '', ['class' => 'form-control', 'placeholder' => 'Booth # / Location'])}}
          </div>
        </div>
        <div class="form-group">
          {{Form::label('p_address', 'Pickup Address', ['class' => 'control-label'])}}
          {{Form::text('p_line1', '', ['class' => 'form-control', 'placeholder' => 'Address Line 1'])}}
          {{Form::text('p_line2', '', ['class' => 'form-control', 'placeholder' => 'Address Line 2'])}}
          {{Form::text('p_city', '', ['class' => 'form-control', 'placeholder' => 'City'])}}
          {{Form::bsState('p_state')}}
          {{Form::text('p_zip', '', ['class' => 'form-control', 'placeholder' => 'Zip Code'])}}
        </div>
        <div class="form-group">
            {{Form::label('p_earlyDate', 'Earilist Pickup', ['class' => 'control-label'])}}
            {{ Form::date('p_earlyDate') }}
        </div>
        <div class="form-group">
            {{Form::label('p_lateDate', 'Latest Pickup', ['class' => 'control-label'])}}
            {{ Form::date('p_lateDate') }}
        </div>
      </div>



      <div class="col-md-4">
        <h4 class="text-warning">Shipment Destination</h4>
        <div class="form-group required" id="d_select">
          {{Form::label('d_type', 'Destination Location Type', ['class' => 'control-label required'])}}
          {{Form::select('d_type',[
            'Business Warehouse',
            'Tradeshow / Convention Center',
            'Freight Terminal',
            'Hotel / Conference Center',
            'Self Storage FAcility',
            'Church / School / College Campus',
            'Residence / Home'
          ], null, ['class' => 'form-control', 'placeholder' => ''])}}
        </div>
        <div class="form-group">
          {{ Form::label('d_limitations', 'Limitations at Destination', ['class' => 'control-label']) }}<br />
          {{ Form::checkbox('d_limit1', true)}} No Loading Dock<br />
          {{ Form::checkbox('d_limit2', true)}} Limited Access<br />
          {{Form::text('d_limitOpt', '', ['class' => 'col-xs-2"', 'placeholder' => 'Other'])}}
        </div>
        <div class="delivery_standard">
          <div class="form-group">
            {{Form::label('d_locationName', 'Location Name', ['class' => 'control-label'])}}
            {{Form::text('d_name', '', ['class' => 'form-control', 'placeholder' => ''])}}
          </div>
        </div>
        <div class="delivery_show">
          <div class="form-group">
            {{Form::label('tradeshow_info', 'Tradeshow Information (if applicable)', ['class' => 'control-label'])}}
            {{Form::text('d_show', '', ['class' => 'form-control', 'placeholder' => 'Trade Show Name'])}}
            {{Form::text('d_venue', '', ['class' => 'form-control', 'placeholder' => 'Venue Name'])}}
            {{Form::text('d_booth', '', ['class' => 'form-control', 'placeholder' => 'Booth # / Location'])}}
          </div>
        </div>
        <div class="form-group">
          {{Form::label('d_address', 'Delivery Address', ['class' => 'control-label'])}}
          {{Form::text('d_line1', '', ['class' => 'form-control', 'placeholder' => 'Address Line 1'])}}
          {{Form::text('d_line2', '', ['class' => 'form-control', 'placeholder' => 'Address Line 2'])}}
          {{Form::text('d_city', '', ['class' => 'form-control', 'placeholder' => 'City'])}}
          {{Form::bsState('d_state')}}
          {{Form::text('d_zip', '', ['class' => 'form-control', 'placeholder' => 'Zip Code'])}}
        </div>
        <div class="form-group">
            {{Form::label('d_earlyDate', 'Earilist Delivery', ['class' => 'control-label'])}}
            {{ Form::date('d_earlyDate') }}
        </div>
        <div class="form-group">
            {{Form::label('d_lateDate', 'Latest Delivery', ['class' => 'control-label'])}}
            {{ Form::date('d_lateDate') }}
        </div>
      </div>
    </div>


    <h4 class="text-warning">Special Services</h4>
    <div class="col-md-9 form-group">
      {{ Form::label('specialServices', 'Special Equipment Required', ['class' => 'control-label']) }}<br />
      <div class="row">
        <div class="col-md-4">
          {{ Form::checkbox('serv1', true)}} Liftgate<br />
          {{ Form::checkbox('serv2', true)}} Full Clearance Rear Doors<br />
        </div>
        <div class="col-md-4">
          {{ Form::checkbox('serv3', true)}} Hand Truck / Dolly<br />
          {{ Form::checkbox('serv4', true)}} Flatbed<br />
        </div>
        <div class="col-md-4">
          {{ Form::checkbox('serv5', true)}} Pallet Jack<br />
          {{ Form::checkbox('serv6', true)}} Stepdeck<br />
        </div>
      </div>
      <br />
      <div class="row">
        <div class="col-md-3">
            {{ Form::label('cargoBeams', 'Cargo Beams', ['class' => 'control-label']) }}<br />
            {{Form::text('equip1', '', ['class' => 'col-xs-2"', 'placeholder' => '0'])}}
        </div>
        <div class="col-md-3">
            {{ Form::label('logStraps', 'Logistic Straps', ['class' => 'control-label']) }}<br />
            {{Form::text('equip2', '', ['class' => 'col-xs-2"', 'placeholder' => '0'])}}
        </div>
        <div class="col-md-3">
            {{ Form::label('dollies', '4-Wheel Dollies', ['class' => 'control-label']) }}<br />
            {{Form::text('equip3', '', ['class' => 'col-xs-2"', 'placeholder' => '0'])}}
        </div>
        <div class="col-md-3">
            {{ Form::label('furniturePads', 'Furniture Pads', ['class' => 'control-label']) }}<br />
            {{Form::text('equip4', '', ['class' => 'col-xs-2"', 'placeholder' => '0'])}}
        </div>
      </div>
    </div>
    {{Form::bsTextArea('comments')}}
    {{Form::bsSubmit('Submit', ['class' => 'btn btn-primary'])}}
  {!! Form::close() !!}
  <hr />
  <script>
  		$(document).ready(function(){
        $('.pickup_show').hide();
        $('.delivery_show').hide();

        $('#p_select select').change(function(){
          if($('#p_select select option:selected').text() == 'Tradeshow / Convention Center'){
            $('.pickup_standard').slideUp(500);
            $('.pickup_show').slideDown(500);
          } else {
            $('.pickup_standard').slideDown(500);
            $('.pickup_show').slideUp(500);
          }
  			});

        $('#d_select select').change(function(){
          if($('#d_select select option:selected').text() == 'Tradeshow / Convention Center'){
            $('.delivery_standard').slideUp(500);
            $('.delivery_show').slideDown(500);
          } else {
            $('.delivery_standard').slideDown(500);
            $('.delivery_show').slideUp(500);
          }
  			});
  		});
  	</script>
@endsection
<!-- 'Tradeshow / Convention Center' -->

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuoteRequest extends Model
{
  public function test(){
    return 'working';
  }

  public function handling(){
    if( $this->attributes['hand1'] == 0 &&
        $this->attributes['hand2'] == 0){
          return 'None';
    }
    $output = '';
    if ($this->attributes['hand1'] == 1) {
      $output = $output.'Hazardous Materials';
    }
    if ($this->attributes['hand2'] == 1 ) {
      $output = $output.($output != '' ? ', ' : '').'Protect from Freezing';
    }
    return $output;
  }

  public function shuttle(){
    if( $this->attributes['shut1'] == 0 &&
        $this->attributes['shut2'] == 0){
          return 'None';
    }
    $output = '';
    if ($this->attributes['shut1'] == 1) {
      $output = $output.'at Origin';
    }
    if ($this->attributes['shut2'] == 1 ) {
      $output = $output.($output != '' ? ', ' : '').'at Destinaion';
    }
    return $output;
  }

  public function p_limitations(){
    if( $this->attributes['p_limit1'] == 0 &&
        $this->attributes['p_limit2'] == 0 &&
        $this->attributes['p_limitOpt'] == "NA"){
          return 'None';
    }
    $output = '';
    if ($this->attributes['p_limit1'] == 1) {
      $output = $output.'No Loading Dock';
    }
    if ($this->attributes['p_limit2'] == 1 ) {
      $output = $output.($output != '' ? ', ' : '').'Limited Access';
    }
    if ($this->attributes['p_limitOpt'] != "NA") {
      $output = $output.($output != '' ? ', ' : '').$this->attributes['p_limitOpt'];
    }
    return $output;
  }

  public function d_limitations(){
    if( $this->attributes['d_limit1'] == 0 &&
        $this->attributes['d_limit2'] == 0 &&
        $this->attributes['d_limitOpt'] == "NA"){
          return 'None';
    }
    $output = '';
    if ($this->attributes['d_limit1'] == 1) {
      $output = $output.'No Loading Dock';
    }
    if ($this->attributes['d_limit2'] == 1 ) {
      $output = $output.($output != '' ? ', ' : '').'Limited Access';
    }
    if ($this->attributes['d_limitOpt'] != "NA") {
      $output = $output.($output != '' ? ', ' : '').$this->attributes['d_limitOpt'];
    }
    return $output;
  }

  public function services(){
    if( $this->attributes['serv1'] == 0 &&
        $this->attributes['serv2'] == 0 &&
        $this->attributes['serv3'] == 0 &&
        $this->attributes['serv4'] == 0 &&
        $this->attributes['serv5'] == 0 &&
        $this->attributes['serv6'] == 0 ){
          return 'None';
    }
    $output = '';
    if ($this->attributes['serv1'] == 1) {
      $output = $output.'Liftgate';
    }
    if ($this->attributes['serv2'] == 1 ) {
      $output = $output.($output != '' ? ', ' : '').'Full Clearance Rear Doors';
    }
    if ($this->attributes['serv3'] == 1 ) {
      $output = $output.($output != '' ? ', ' : '').'Hand Truck / Dolly';
    }
    if ($this->attributes['serv4'] == 1 ) {
      $output = $output.($output != '' ? ', ' : '').'Flatbed';
    }
    if ($this->attributes['serv5'] == 1 ) {
      $output = $output.($output != '' ? ', ' : '').'Pallet Jack';
    }
    if ($this->attributes['serv6'] == 1 ) {
      $output = $output.($output != '' ? ', ' : '').'Stepdeck';
    }
    return $output;
  }

  public function equipment(){
    if( $this->attributes['equip1'] == 0 &&
        $this->attributes['equip2'] == 0 &&
        $this->attributes['equip3'] == 0 &&
        $this->attributes['equip4'] == 0 ){
          return 'None';
    }
    $output = '';
    if ($this->attributes['equip1'] > 0) {
      $output = $output.$this->attributes['equip1'].' Cargo Beam'.($this->attributes['equip1'] > 1  ? 's' : '');
    }
    if ($this->attributes['equip2'] > 0 ) {
      $output = $output.($output != '' ? ', ' : '').$this->attributes['equip2'].' Logistic Strap'.($this->attributes['equip2'] > 1  ? 's' : '');;
    }
    if ($this->attributes['equip3'] > 0 ) {
      $output = $output.($output != '' ? ', ' : '').$this->attributes['equip3'].' 4-Wheel Dollie'.($this->attributes['equip3'] > 1  ? 's' : '');;
    }
    if ($this->attributes['equip4'] > 0 ) {
      $output = $output.($output != '' ? ', ' : '').$this->attributes['equip4'].' Furniture Pad'.($this->attributes['equip4'] > 1  ? 's' : '');;
    }
    return $output;
  }

}

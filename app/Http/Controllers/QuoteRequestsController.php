<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuoteRequest;

class QuoteRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quoteRequests = QuoteRequest::orderBy('created_at')->get();
        return view('quoteRequests.index')->with('quoteRequests', $quoteRequests);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
     {
         return view('quoteRequests.create');
         //return $customers;
     }

     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request)
     {
       $this->validate($request,[
         'shipType' => 'required',
         'roundTrip' => 'required',
         'customerName' => 'required',
         'p_type' => 'required',
         'd_type' => 'required',
       ]);

       //create new request
        $quoteRequest = new QuoteRequest;
        $quoteRequest->shipType=$request->input('shipType');
        $quoteRequest->roundTrip=$request->input('roundTrip');
        // $quoteRequest->sHandling=$this->makeOpt(
        //   $this->checkCat(array(
        //     $request->input('hand1'),
        //     $request->input('hand2'))),"NA");
        // $quoteRequest->shuttle=$this->makeOpt(
        //   $this->checkCat(array(
        //     $request->input('shut1'),
        //     $request->input('shut2'))),"NA");
        $quoteRequest->customerName=$request->input('customerName');
        $quoteRequest->b_line1=$this->makeOpt($request->input('b_line1'),"NA");
        $quoteRequest->b_line2=$this->makeOpt($request->input('b_line2'),"NA");
        $quoteRequest->b_city=$this->makeOpt($request->input('b_city'),"NA");
        $quoteRequest->b_state=$this->makeOpt($request->input('b_state'),"NA");
        $quoteRequest->b_zip=$this->makeOpt($request->input('b_zip'),"NA");
        $quoteRequest->p_name=$this->makeOpt($request->input('p_name'),"NA");
        $quoteRequest->p_type=$request->input('p_type');
        $quoteRequest->p_line1=$this->makeOpt($request->input('p_line1'),"NA");
        $quoteRequest->p_line2=$this->makeOpt($request->input('p_line2'),"NA");
        $quoteRequest->p_city=$this->makeOpt($request->input('p_city'),"NA");
        $quoteRequest->p_state=$this->makeOpt($request->input('p_state'),"NA");
        $quoteRequest->p_zip=$this->makeOpt($request->input('p_zip'),"NA");
        $quoteRequest->p_show=$this->makeOpt($request->input('p_show'),"NA");
        $quoteRequest->p_venue=$this->makeOpt($request->input('p_venue'),"NA");
        $quoteRequest->p_booth=$this->makeOpt($request->input('p_booth'),"NA");
        $quoteRequest->p_phone=$this->makeOpt($request->input('p_phone'),"NA");
        // $quoteRequest->p_limitations=$this->makeOpt(
        //   $this->checkCat(array(
        //     $request->input('p_limit1'),
        //     $request->input('p_limit2'),
        //     $request->input('p_limitOpt'))),"NA");
        $quoteRequest->p_earlyDate=$this->makeOpt($request->input('p_earlyDate'),\Carbon\Carbon::now());
        $quoteRequest->p_lateDate=$this->makeOpt($request->input('p_lateDate'),\Carbon\Carbon::now());
        $quoteRequest->pInstructions=$this->makeOpt($request->input('pInstructions'),"NA");
        $quoteRequest->d_name=$this->makeOpt($request->input('d_name'),"NA");
        $quoteRequest->d_type=$request->input('d_type');
        $quoteRequest->d_line1=$this->makeOpt($request->input('d_line1'),"NA");
        $quoteRequest->d_line2=$this->makeOpt($request->input('d_line2'),"NA");
        $quoteRequest->d_city=$this->makeOpt($request->input('d_city'),"NA");
        $quoteRequest->d_state=$this->makeOpt($request->input('d_state'),"NA");
        $quoteRequest->d_zip=$this->makeOpt($request->input('d_zip'),"NA");
        $quoteRequest->d_show=$this->makeOpt($request->input('d_show'),"NA");
        $quoteRequest->d_venue=$this->makeOpt($request->input('d_venue'),"NA");
        $quoteRequest->d_booth=$this->makeOpt($request->input('d_booth'),"NA");
        $quoteRequest->d_phone=$this->makeOpt($request->input('d_phone'),"NA");
        // $quoteRequest->d_limitations=$this->makeOpt(
        //   $this->checkCat(array(
        //     $request->input('d_limit1'),
        //     $request->input('d_limit2'),
        //     $request->input('d_limitOpt'))),"NA");
        $quoteRequest->d_earlyDate=$this->makeOpt($request->input('d_earlyDate'),\Carbon\Carbon::now());
        $quoteRequest->d_lateDate=$this->makeOpt($request->input('d_lateDate'),\Carbon\Carbon::now());
        $quoteRequest->dInstcutions=$this->makeOpt($request->input('dInstcutions'),"NA");
        $quoteRequest->contact_first=$this->makeOpt($request->input('contact_first'),"NA");
        $quoteRequest->contact_last=$this->makeOpt($request->input('contact_last'),"NA");
        $quoteRequest->contact_title=$this->makeOpt($request->input('contact_title'),"NA");
        $quoteRequest->contact_phone=$this->makeOpt($request->input('contact_phone'),"NA");
        $quoteRequest->contact_email=$this->makeOpt($request->input('contact_email'),"NA");
        $quoteRequest->quoteBy=$this->makeOpt($request->input('quoteBy'),\Carbon\Carbon::now());
        $quoteRequest->urgent=$this->makeOpt($request->input('urgent'),false);
        // $specServ1=$this->makeOpt(
        //   $this->checkCat(array(
        //     $request->input('serv1'),
        //     $request->input('serv2'),
        //     $request->input('serv3'),
        //     $request->input('serv4'),
        //     $request->input('serv5'),
        //     $request->input('serv6'))),"NA");
        // if($request->input('equip1')!=null){
        //   $equipment1=$request->input('equip1').' Cargo Beams';
        // }else{
        //   $equipment1=null;
        // };
        // if($request->input('equip2')!=null){
        //   $equipment2=$request->input('equip2').' Logistic Straps';
        // }else{
        //   $equipment2=null;
        // };
        // if($request->input('equip3')!=null){
        //   $equipment3=$request->input('equip3').' 4-Wheel Dollies';
        // }else{
        //   $equipment3=null;
        // };
        // if($request->input('equip4')!=null){
        //   $equipment4=$request->input('equip4').' Furniture Pads';
        // }else{
        //   $equipment4=null;
        // };
        // $specServ2=$this->makeOpt($this->checkCat(array($equipment1,$equipment2,$equipment3,$equipment4)),"NA");
        // $quoteRequest->specialServices=$this->makeOpt(
        //   $this->checkCat(array($specServ1,$specServ2)),"NA");
        $quoteRequest->comments=$this->makeOpt($request->input('comments'),"NA");
        $quoteRequest->active=true;
        $quoteRequest->hand1=$this->makeOpt($request->input('hand1'),FALSE);
        $quoteRequest->hand2=$this->makeOpt($request->input('hand2'),FALSE);
        $quoteRequest->shut1=$this->makeOpt($request->input('shut1'),FALSE);
        $quoteRequest->shut2=$this->makeOpt($request->input('shut2'),FALSE);
        $quoteRequest->p_limit1=$this->makeOpt($request->input('p_limit1'),FALSE);
        $quoteRequest->p_limit2=$this->makeOpt($request->input('p_limit2'),FALSE);
        $quoteRequest->p_limitOpt=$this->makeOpt($request->input('p_limitOpt'),"NA");
        $quoteRequest->d_limit1=$this->makeOpt($request->input('d_limit1'),FALSE);
        $quoteRequest->d_limit2=$this->makeOpt($request->input('d_limit2'),FALSE);
        $quoteRequest->d_limitOpt=$this->makeOpt($request->input('d_limitOpt'),"NA");
        $quoteRequest->serv1=$this->makeOpt($request->input('serv1'),FALSE);
        $quoteRequest->serv2=$this->makeOpt($request->input('serv2'),FALSE);
        $quoteRequest->serv3=$this->makeOpt($request->input('serv3'),FALSE);
        $quoteRequest->serv4=$this->makeOpt($request->input('serv4'),FALSE);
        $quoteRequest->serv5=$this->makeOpt($request->input('serv5'),FALSE);
        $quoteRequest->serv6=$this->makeOpt($request->input('serv6'),FALSE);
        $quoteRequest->equip1=$this->makeOpt($request->input('equip1'),0);
        $quoteRequest->equip2=$this->makeOpt($request->input('equip2'),0);
        $quoteRequest->equip3=$this->makeOpt($request->input('equip3'),0);
        $quoteRequest->equip4=$this->makeOpt($request->input('equip4'),0);

        //return $quoteRequest;

       //Save Request
       $quoteRequest->save();

       //redirect
       return redirect('/')->with('success', 'Request Submitted');
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quoteRequest = QuoteRequest::find($id);
        return view('quoteRequests.show')->with('quoteRequest', $quoteRequest);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 'working';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function print($id)
    {
        $quoteRequest = QuoteRequest::find($id);
        return view('quoteRequests.print')->with('quoteRequest', $quoteRequest);
    }

    private function makeOpt($var,$blank){
      if ($var==null) {
        return $blank;
      } else {
        return $var;
      }
    }

    private function checkCat($boxes){
      $output = $boxes[0];
      for ($i=1; $i < count($boxes); $i++) {
        if($boxes[$i] != null){
          $output = $output.', '.$boxes[$i];
        }
      }
      return $output;
    }

    private function nullchk($var){
      if($var == null){
        return false;
      }
      return true;
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Customer;

class OrdersController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            //$orders = Order::all();
            $orders = Order::orderBy('dlvDate')->get();
            return view('orders.index')->with('orders', $orders);
    }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            $customers= Customer::orderBy('name')->pluck('name', 'id');
            return view('orders.create',compact('id', 'customers'));
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
            'orderNo' => 'required',
            'show' => 'required',
            'shipDate' => 'required',
            'dlvDate' => 'required',
            'boothNo' => 'nullable'
          ]);
          //save customer
          //$customer = Customer::find($request->input('customer_id'))->name;
          //return $customer->name;
          // if ($request->input('comments')==null) {
          //   $comm="None";
          // } else {
          //   $comm=$request->input('comments');
          // }
          //$comm = $this->makeopt($request->input('comments'),"None");

          //create new order
          $order = new Order;
          $order->orderNo=$request->input('orderNo');
          $order->customer=Customer::find($request->input('customer_id'))->name;
          $order->customer_id=$request->input('customer_id');
          $order->origin=$request->input('origin');
          $order->tf=$request->input('tf');
          $order->show=$request->input('show');
          $order->boothNo=$request->input('boothNo');
          $order->carrier=$request->input('carrier');
          $order->estPrice=$request->input('estPrice');
          $order->shipDate=$request->input('shipDate');
          $order->dlvDate=$request->input('dlvDate');
          $order->stopNo=$request->input('stopNo');
          $order->comments=$this->makeOpt($request->input('comments'),"None");

          //Save Order
          $order->save();

          //redirect
          return redirect('/orders')->with('success', 'Order Created');
        }

        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            $order = Order::find($id);
            return view('orders.show')->with('order', $order);
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            $order = Order::find($id);
            return view('orders.edit')->with('order', $order);
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
            $order = Order::find($id);
            $order->orderNo=$request->input('orderNo');
            $order->customer=$request->input('customer');
            $order->origin=$request->input('origin');
            $order->tf=$request->input('tf');
            $order->show=$request->input('show');
            $order->boothNo=$request->input('boothNo');
            $order->carrier=$request->input('carrier');
            $order->estPrice=$request->input('estPrice');
            $order->shipDate=$request->input('shipDate');
            $order->dlvDate=$request->input('dlvDate');
            $order->stopNo=$request->input('stopNo');
            $order->comments=$request->input('comments');

            $order->save();

            return redirect('/orders')->with('success', 'Order Updated');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
          //return $id;
            $order = Order::find($id);
            $order->delete();
            return redirect('/orders')->with('success', 'Order Deleted');
        }

        private function makeOpt($var,$blank){
          if ($var==null) {
            return $blank;
          } else {
            return $var;
          }
        }
    }

<?php
namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Meal;
use Illuminate\Http\Request;

class OrderController extends Controller{

    public function index()
    {
        $orders = Order::orderBy('id' , 'DESC')->get();
        return view('orders' , compact('orders'));
    }

    public function changeStatus(Request $request , $id)
    {
        $order = Order::find($id);
        Order::where('id' , $id)->update(['status' => $request->status]);
        return back();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Order $order)
    {
        //
    }

    public function edit(Order $order)
    {
        //
    }

    public function update(Request $request, Order $order)
    {
        //
    }

    public function destroy(Order $order)
    {
        //
    }
}

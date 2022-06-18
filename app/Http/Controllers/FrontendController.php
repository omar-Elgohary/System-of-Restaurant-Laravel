<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Meal;
use App\Models\Order;

class FrontendController extends Controller{

    public function index(Request $request)
    {
        if(!$request->category){
            $meals = Meal::latest()->get();
            return view('frontpage' , compact('meals'));
        }
            $meals = Meal::where('category' , $request->category)->get();
            return view('frontpage', compact('meals'));
    }


    public function show($id)
    {
        $meal = Meal::find($id);
        return view('show', compact('meal'));
    }

    public function store(Request $request)
    {
        Order::create([
            'user_id' => auth()->user()->id,
            'meal_id' => $request->meal_id,

            'small_meal' => $request->small_meal,
            'medium_meal' => $request->medium_meal,
            'large_meal' => $request->large_meal,

            'phone' => $request->phone,
            'body' => $request->body,
        ]);
        return back();
    }

    public function destroy($id)
    {
        //
    }
}

<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Meal;

class HomeController extends Controller{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(auth()->user()->is_admin == 1){
            return redirect()->route('orders');
        }else{
            $meals = Meal::get();
            return view('home' , compact('meals'));
        }
    }
}

@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">

<div class="col-md-4">
    <div class="card-header bg-success text-white text-center">
    <h1>Order Now</h1>
    </div> <!-- card-header -->

    <div class="card-body">
        @if (Auth::check())
            <form action="{{ route('order.store') }}" method="post">
                @csrf
                <h3>Name: {{ auth()->user()->name }}</h3>

                <div class="form-group">
                    <label>Mobile</label>
                    <input type="number" name="phone" class="form-control" required>
                </div> <!-- phone -->

                <div class="form-group">
                    <label>Small Meal</label>
                    <input type="number" value="0" name="small_meal" class="form-control">
                </div> <!-- small_meal -->

                <div class="form-group">
                    <label>Medium Meal</label>
                    <input type="number" value="0" name="medium_meal" class="form-control">
                </div> <!-- medium_meal -->

                <div class="form-group">
                    <label>Large Meal</label>
                    <input type="number" value="0" name="large_meal" class="form-control">
                </div> <!-- large_meal -->

                <div class="form-group">
                    <input type="hidden" value="{{ $meal->id }}" name="meal_id">
                </div> <!-- meal_id -->

                <div class="form-group">
                    <label>Message</label>
                    <textarea name="body" rows="4" class="form-control mb-3"></textarea>
                </div> <!-- Message -->

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary btn-lg">Make Order</button>
                </div> <!-- button -->
            </form>
        @else
            <h3 class="text-center"><a href="{{ route('login') }}" class="btn btn-link btn-danger text-white">Please LogIn To Make Order</a></h3>
        @endif

    </div> <!-- card-body -->
</div> <!-- left -->


<div class="col-md-8">
    <div class="card">
        <div class="card-header bg-success text-white text-center">
            <h1>Meal Details</h1>
        </div> <!-- card-header -->

        <div class="card-body">
            <div class="card p-3 text-center">
                <img src="{{ Storage::url($meal->image) }}" class="w-50 mb-3 mx-auto">
                <h2>{{ $meal->name }}</h2>
                <p>{{ $meal->description }}</p>

                <div class="d-flex justify-content-around">
                    <h4>Small Price: {{ $meal->small_meal_price }} LE</h4>
                    <h4>Medium Price: {{ $meal->medium_meal_price }} LE</h4>
                    <h4>Large Price: {{ $meal->large_meal_price }} LE</h4>
                </div>
            </div>
        </div> <!-- card-body -->

    </div> <!-- card -->
</div> <!-- col-8 -->
</div> <!-- row -->
</div> <!-- container -->
@endsection

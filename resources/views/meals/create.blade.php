@extends('layouts.app')
@section('content')

<div class="container">
<div class="row justify-content-center">
<div class="col-md-3">
    <div class="card-header bg-success text-white text-center">
        <h1>Menu</h1>
    </div> <!-- card-header -->

    <div class="card-body">
        <ul class="list-group">
            <a class="list-group-item" href="{{ route('meals') }}">Display All Meals</a>
            <a class="list-group-item" href="{{ route('meal.create') }}">Add New Meal</a>
            <a class="list-group-item" href="{{ route('orders') }}">User Orders</a>
        </ul>
    </div> <!-- card-body -->
</div> <!-- left -->

<div class="col-md-9">
    <div class="card">
        <div class="card-header bg-success text-white text-center">
            <h1>Add New Meal</h1>
        </div>

        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('meal.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" name="name" class="form-control mb-4" placeholder="Meal Name">
                <textarea name="description" rows="4" class="form-control mb-4" placeholder="Meal Description"></textarea>

                <div class="input-group my-4">
                <input type="number" name="small_meal_price" class="form-control" placeholder="Small Meal Price">
                <input type="number" name="medium_meal_price" class="form-control" placeholder="Medium Meal Price">
                <input type="number" name="large_meal_price" class="form-control" placeholder="Large Meal Price">
            </div> <!-- input-group -->

            <select name="category" class="form-control mb-4">
                <option value=""></option>
                <option value="pizza">Pizza</option>
                <option value="burger">Burger</option>
                <option value="shawerma">Shawerma</option>
            </select>
            <input type="file" name="image" class="form-control mb-4">
            <div class="text-center">
                <button type="submit" class="btn btn-success btn-lg">Add Meal</button>
            </div>
            </form>
        </div>

    </div> <!-- card -->
</div> <!-- right -->
</div> <!-- row -->
</div> <!-- container -->
@endsection

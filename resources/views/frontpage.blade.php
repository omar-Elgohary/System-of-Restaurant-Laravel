@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">

<div class="col-md-4">
    <div class="card-header bg-success text-white text-center">
    <h1>Menu</h1>
    </div> <!-- card-header -->

    <div class="card-body">
        <form action="{{ route('frontpage') }}" method="get">
            <a href="/" class="list-group-item list-group-item-action">All Categories</a>

            <input type="submit" value="Shawerma" name="category" href="/" class="list-group-item list-group-item-action">
            <input type="submit" value="Burger" name="category" href="/" class="list-group-item list-group-item-action">
            <input type="submit" value="Pizza" name="category" href="/" class="list-group-item list-group-item-action">
        </form>
    </div> <!-- card-body -->
</div> <!-- left -->

<div class="col-md-8">
<div class="card">
    <div class="card-header bg-success text-white text-center">
        <h1>Meals({{ count($meals) }})</h1>
    </div>

    <div class="card-body">
        <div class="row">

            @forelse ($meals as $meal)
                <div class="col-md-4 col-sm-6 text-center mb-2">
                    <div class="card p-3">
                        <img src="{{ Storage::url($meal->image) }}" class="w-100" height="130">
                        <h2>{{ $meal->name }}</h2>
                        <a href="{{ route('meal.show', ['id' => $meal->id]) }}" class="btn btn-success mb-2">Order Now</a>
                    </div> <!-- card -->
                </div> <!-- col-md-4 -->
            @empty
                <div class="alert alert-danger"><h1>No Meals</h1></div>
            @endforelse

        </div> <!-- row -->
    </div> <!-- card-body -->
</div> <!-- card -->
</div> <!-- right -->
</div> <!-- row -->
</div> <!-- container -->
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">

    <div class="card-header text-center bg-success text-white">
        <h1>All Meals</h1>
    </div> <!-- card-header -->

    <div class="card-body">
        <table class="table table-bordered table-responsive table-striped text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>S.Price</th>
                    <th>M.Price</th>
                    <th>L.Price</th>
                    <th>Make Order</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($meals as $key => $meal)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td><img src="{{ Storage::url($meal->image) }}" height="80"></td>
                    <td>{{ $meal->description }}</td>
                    <td>{{ $meal->category }}</td>
                    <td>{{ $meal->small_meal_price }}</td>
                    <td>{{ $meal->medium_meal_price }}</td>
                    <td>{{ $meal->large_meal_price }}</td>
                    <td><a href="{{ route('meal.show', ['id' => $meal->id]) }}" class="btn btn-primary">MakeOrder</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div> <!-- card-body -->
</div> <!-- card -->
</div> <!-- col-8 -->
</div> <!-- row -->
</div> <!-- container -->
@endsection

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
<h1>All Orders</h1>
</div>

<div class="card-body">
@if (session('message'))
<div class="alert alert-success" role="alert">
{{ session('message') }}
</div>
@endif

@if (count($orders) > 0)
<table class="table table-bordered table-responsive table-striped text-center">
<thead>
<tr>
    <th>User</th>
    <th>Phone</th>
    <th>Meal Name</th>

    <th>S.Meal</th>
    <th>M.Meal</th>
    <th>L.Meal</th>

    <th>Total(LE)</th>
    <th>Body</th>
    <th>Status</th>

    <th>Accepted</th>
    <th>Rejected</th>
    <th>Completed</th>
</tr>
</thead>

<tbody>
    @foreach ($orders as $order)
<tr>
    <td>{{ $order->user->name }}</td>
    <td>{{ $order->phone }}</td>
    <td>{{ $order->meal->name }}</td>

    <td>{{ $order->small_meal }}</td>
    <td>{{ $order->medium_meal }}</td>
    <td>{{ $order->large_meal }}</td>

    <td>
        {{
            ($order->small_meal * $order->meal->small_meal_price) +
            ($order->medium_meal * $order->meal->medium_meal_price) +
            ($order->large_meal * $order->meal->large_meal_price)
        }} LE
    </td>

    <td>{{ $order->body }}</td>
    <td>{{ $order->status }}</td>

    <form action="{{ route('orders.status', ['id' => $order->id]) }}" method="post">
        @csrf
        <td><input type="submit" name="status" value="Accepted" class="btn btn-primary btn-sm"></td>
        <td><input type="submit" name="status" value="Rejected" class="btn btn-danger btn-sm"></td>
        <td><input type="submit" name="status" value="Completed" class="btn btn-success btn-sm"></td>
    </form>
    @endforeach
</tr>
</tbody>
</table>

@else
<h1 class=" alert alert-danger text-center">No Orders</h1>
@endif
</div> <!-- card-body -->

</div> <!-- card -->
</div> <!-- right -->
</div> <!-- row -->
</div> <!-- container -->
@endsection

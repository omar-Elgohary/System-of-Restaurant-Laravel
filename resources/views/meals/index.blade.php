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
<h1>All Meals</h1>
</div>

<div class="card-body">
@if (session('message'))
<div class="alert alert-success" role="alert">
{{ session('message') }}
</div>
@endif

@if (count($meals) > 0)
<table class="table table-bordered table-responsive table-striped text-center">
<thead>
<tr>
    <th>#</th>
    <th>Image</th>
    <th>Description</th>
    <th>Category</th>
    <th>S.Price</th>
    <th>M.Price</th>
    <th>L.Price</th>
    <th>Edit</th>
    <th>Delete</th>
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

    <td><a href="{{ route('meal.edit', ['id' => $meal->id]) }}">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
    </svg>
    </a></td>

    <td>
    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $meal->id }}">
        Delete
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal{{ $meal->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="{{ route('meal.destroy', ['id' => $meal->id]) }}" method="post">
        @csrf
        @method('DELETE')

        <div class="modal-dialog">
        <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div> <!-- modal-header -->

        <div class="modal-body">
            <h3 class="alert alert-danger">Are You Sure U Want to Delete...?!</h3>
        </div> <!-- modal-body -->

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">Delete</button>
        </div> <!-- modal-footer -->

        </div> <!-- modal-content -->
    </div> <!-- modal-dialog -->
    </form>
    </div> <!-- model-fade -->

    </td>
</tr>
@endforeach
</tbody>
</table>
@else
<h1 class=" alert alert-danger text-center">No Meals</h1>
@endif
<div>{{ $meals->links() }}</div>
</div> <!-- card-body -->

</div> <!-- card -->
</div> <!-- right -->
</div> <!-- row -->
</div> <!-- container -->
@endsection

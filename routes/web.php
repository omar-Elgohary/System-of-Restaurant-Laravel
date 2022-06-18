<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MealController;
use App\Http\Controllers\OrderController;

Route::get('/',  [App\Http\Controllers\FrontendController::class, 'index'])->name('frontpage');
Route::get('/meal/{id}',  [App\Http\Controllers\FrontendController::class, 'show'])->name('meal.show');
Route::post('/order/store',  [App\Http\Controllers\FrontendController::class, 'store'])->name('order.store');


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth' , 'admin']
],
    function(){
    Route::get('/meals', [MealController::class, 'index'])->name('meals');
    Route::get('/meal/create', [MealController::class, 'create'])->name('meal.create');
    Route::post('/meal/store', [MealController::class, 'store'])->name('meal.store');

    Route::get('/meal/edit/{id}', [MealController::class, 'edit'])->name('meal.edit');
    Route::put('/meal/update/{id}', [MealController::class, 'update'])->name('meal.update');
    Route::delete('/meal/destroy/{id}', [MealController::class, 'destroy'])->name('meal.destroy');

    // Orders
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::post('/orders/status/{id}', [OrderController::class, 'changeStatus'])->name('orders.status');

}); // Admin





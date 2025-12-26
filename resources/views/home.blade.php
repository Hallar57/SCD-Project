@extends('Layouts.layout')
@section('title', 'Name')
@section('content')

    <div class="py-5 mb-5"
         style="background: linear-gradient(135deg, #e53935, #c62828);">
        <div class="container text-center text-light">
            <h1 class="fw-bold mb-3 "  style="color:#ffecec;">
                Order food from your favorite restaurants
            </h1>

            <p class="mb-4" style="color:#ffecec;">
                Fast • Fresh • Delivered to you
            </p>

            <form class="d-flex justify-content-center" method="GET">
                <input
                    name="search"
                    type="text"
                    class="form-control w-50 shadow-sm"
                    placeholder="Search restaurants..."
                >
            </form>
        </div>
    </div>

    <div class="container mb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold mb-0">Popular Restaurants</h3>
        </div>
        @include('restaurants.restaurants')

    </div>

@endsection

@extends('Layouts.layout')

@section('content')

<div class="container">
    <h2>Restaurants</h2>

    <div class="row">
        @foreach($restaurants as $restaurant)
            <div class="col-md-3">
                <a href="{{ route('restaurant.show', $restaurant->id) }}" class="card text-decoration-none">
                    <div class="card-body text-center">
                        <h5>{{ $restaurant->name }}</h5>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection

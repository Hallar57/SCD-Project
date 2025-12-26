@extends('Layouts.layout')
@section('title', $restaurant->name)

@section('content')

    <div class="py-5 mb-4"
         style="background: linear-gradient(135deg, #e53935, #c62828);">
        <div class="container text-light">
            <div class="d-flex justify-content-between align-items-start">

                <div>
                    <h1 class="fw-bold mb-1" style="color:#ffecec;">
                        {{ $restaurant->name }}
                    </h1>

                    <p class="mb-2" style="color:#ffecec;">
                        {{ $restaurant->address }}
                    </p>

                    <span class="badge bg-light text-danger fw-semibold">
                Open Now
            </span>
                </div>

                <a href="{{ route('home') }}" class="btn btn-outline-light btn-sm">
                    ← Back
                </a>

            </div>
        </div>

    </div>


    <div class="container mb-5">
        <h3 class="fw-bold mb-4">Menu</h3>

        <div class="row g-4">
            @forelse($restaurant->menus as $menu)
                <div class="col-md-4">
                    <div class="card restaurant-card h-100 border-0 shadow-sm">

                        <img
                            src="{{ $menu->image
                            ? asset('storage/'.$menu->image)
                            : asset('images/placeholder.jpg') }}"
                            class="card-img-top"
                            style="height:180px; object-fit:cover;"
                            alt="{{$menu->name}}"
                        >

                        <div class="card-body d-flex flex-column">
                            <h5 class="fw-semibold mb-1">
                                {{ $menu->name }}
                            </h5>

                            <p class="text-muted small mb-2">
                                {{ $menu->description }}
                            </p>

                            <div class="mt-auto d-flex justify-content-between align-items-center">
                            <span class="fw-bold text-danger">
                                Rs {{ $menu->price }}
                            </span>

                                <form action="{{route('cart.add', $menu->id)}}"
                                      method="POST">
                                    @csrf
                                    <button class="btn btn-sm btn-primary">
                                        Add to Cart
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted">No menu items available.</p>
            @endforelse
        </div>
    </div>

@endsection

@extends('Layouts.layout')

@section('title', 'Your Cart')

@section('content')
    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold mb-0">
                Your Cart
            </h3>

            <a href="{{route('home')}}" class="btn btn-outline-secondary btn-sm">
                ← Back
            </a>
        </div>

    @if(!$cart || $cart->items->isEmpty())
            <p class="text-muted">Your cart is empty.</p>
        @else
            <div class="card shadow-sm">
                <div class="card-body">

                    @foreach($cart->items as $item)
                        <div class="d-flex justify-content-between align-items-center mb-3 border-bottom pb-2">

                            <div>
                                <h6 class="mb-1">{{ $item->menu->name }}</h6>
                                <small class="text-muted">
                                    Rs {{ $item->menu->price }} × {{ $item->quantity }}
                                </small>
                            </div>

                            <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">
                                    Remove
                                </button>
                            </form>

                        </div>
                    @endforeach

                </div>
            </div>
        @endif

    </div>
@endsection

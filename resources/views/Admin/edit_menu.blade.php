@extends('Layouts.admin_layout')
@section('title','Menu')
@section('content')
    <div class="container mt-4">

        {{-- PAGE HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold mb-0">
                {{ $restaurant->name }} — Menu
            </h3>

            <a href="{{ route('admin.home') }}" class="btn btn-outline-secondary btn-sm">
                ← Back to Restaurants
            </a>
        </div>

        {{-- ADD MENU ITEM --}}
        <div class="card shadow-sm mb-4">
            <div style="background: #e53935" class="card-header text-white fw-semibold">
                Add Menu Item
            </div>

            <div class="card-body">
                <form
                    action="{{ route('admin.menu.update', $restaurant->id) }}"
                    method="POST"
                    enctype="multipart/form-data"
                    class="row g-3"
                >
                    @csrf

                    <div class="col-md-5">
                        <label class="form-label">Item Name</label>
                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            placeholder="e.g. Chicken Biryani"
                            required
                        >
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Price (Rs)</label>
                        <input
                            type="number"
                            name="price"
                            class="form-control"
                            placeholder="500"
                            required
                        >
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Image (optional)</label>
                        <input
                            type="file"
                            name="image"
                            class="form-control"
                        >
                    </div>

                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-danger px-4">
                            + Add Item
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header fw-semibold">
                Existing Menu Items
            </div>

            <div class="card-body p-0">
                @if($restaurant->menus->count())
                    <table class="table table-hover mb-0 align-middle">
                        <thead class="table-light">
                        <tr>
                            <th style=" color:white; background: #e53935; width: 5%">#</th>
                            <th style=" color:white; background: #e53935;">Name</th>
                            <th style=" color:white; background: #e53935;">Price</th>
                            <th class="text-center" style=" color:white; background: #e53935; width: 12%">Image</th>
                            <th class="text-center" style=" color:white; background: #e53935; width: 18%">Actions</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($restaurant->menus as $index =>  $menu)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="fw-semibold">
                                    {{ $menu->name }}
                                </td>

                                <td>
                                    Rs {{ number_format($menu->price) }}
                                </td>

                                <td class="text-center">
                                    @if($menu->image)
                                        <img
                                            src="{{ asset('storage/'.$menu->image) }}"
                                            class="rounded"
                                            width="60"
                                            height="45"
                                            style="object-fit: cover;"
                                            alt="{{$menu->name}}"
                                        >
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="d-inline-flex gap-2">
                                        <form
                                            action="{{ route('admin.menu.destroy', $menu->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this item?');"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                Delete
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="text-center text-muted py-4">
                        No menu items added yet.
                    </div>
                @endif
            </div>
        </div>

    </div>
@endsection

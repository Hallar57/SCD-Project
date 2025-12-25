@extends('Layouts.admin_layout')
@section('title', 'Admin | Restaurants')
@section('content')
    <div class="container mt-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="fw-bold mb-0">All Restaurants</h2>

            <a href="{{ route('admin.create') }}"
               class="btn btn-success">
                + Add Restaurant
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-0">


                <table class="table table-hover table-striped mb-0 align-middle">
                    <thead class="table-dark">
                    <tr>
                        <th style="width: 5%">#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th class="text-center" style="width: 12%">Image</th>
                        <th class="text-center" style="width: 18%">Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse ($restaurants as $index => $restaurant)
                        <tr>
                            <td>{{ $index + 1 }}</td>

                            <td class="fw-semibold">
                                {{ $restaurant->name }}
                            </td>

                            <td class="text-muted">
                                {{ Str::limit($restaurant->description, 80) }}
                            </td>

                            <td class="text-center">
                                @if ($restaurant->image)
                                    <img
                                        src="{{ asset('storage/' . $restaurant->image) }}"
                                        alt="Restaurant Image"
                                        class="rounded"
                                        width="100"
                                        height="55"
                                        style="object-fit: cover;"
                                    >
                                @else
                                    <span class="text-muted">—</span>
                                @endif
                            </td>

                            <td class="text-center">
                                <div class="d-inline-flex gap-2">
                                    <a href="{{ route('admin.edit', $restaurant->id) }}"
                                       class="btn btn-sm btn-outline-primary">
                                        Edit
                                    </a>

                                    <a href="{{ route('admin.restaurants.menu', $restaurant->id) }}"
                                       class="btn btn-sm btn-outline-primary">
                                        Menu
                                    </a>

                                    <form
                                        action="{{ route('admin.restaurants.destroy', $restaurant->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this restaurant?');"
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
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">
                                No restaurants found.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>

                </table>

            </div>
        </div>
    </div>
@endsection

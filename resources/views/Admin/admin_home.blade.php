@extends('Layouts.admin_layout')
@section('title','Home')
@section('content')

<div class="Restaurants">
    <h1>All Restaurants</h1>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Description</th>
            <th>Image</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($restaurants as $index => $restaurant)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $restaurant->name }}</td>
                <td>{{ $restaurant->description }}</td>

                <td>
                    @if ($restaurant->image)
                        <img src="{{ asset('storage/' . $restaurant->image) }}" alt="Image"
                             width="50" height="50" style="object-fit: cover;">
                    @else
                        -
                    @endif
                </td>

                <td>
                    <form action="{{ route('admin.home', $restaurant->id) }}"
                          method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this user?');">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">No Restaurants found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

</div>

@endsection

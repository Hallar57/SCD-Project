<div class="row g-4" >
    @forelse($restaurants as $restaurant)
        <div class="col-md-3">
            <a href="{{ route('restaurant.show', $restaurant->id) }}"
               class="text-decoration-none text-dark">

                <div class="restaurant-card card h-100 border-0 shadow-sm">

                    <img
                        src="{{ $restaurant->image
                            ? asset('storage/'.$restaurant->image)
                            : asset('images/placeholder.jpg') }}"
                        class="card-img-top"
                        style="height:180px; object-fit:cover;"
                        alt="{{ $restaurant->name }}"
                    >

                    <div class="card-body">
                        <h5 class="fw-semibold mb-1">
                            {{ $restaurant->name }}
                        </h5>

                        <p class="text-muted small mb-2">
                            {{ $restaurant->description}}
                        </p>
                        <p class="text-muted small mb-2">
                            {{ $restaurant->address}}
                        </p>

                        <span class="badge"
                              style="background:#ffebee; color:#c62828;">
                            Open Now
                        </span>
                    </div>
                </div>

            </a>
        </div>
    @empty
        <div class="text-center text-muted">
            No restaurants available.
        </div>
    @endforelse
</div>

<div class="card rounded border" style="height: auto">
    <div class="card-body">
        <img style="width: 100%; heigth: 200px" src="{{ $photo }}" alt="">
        <div class="mt-3">
            <p>{{ $name }}</p>
            <div>
                <span>⭐⭐⭐⭐⭐</span>
                <span class="text-secondary">5.0</span>
            </div>
            <div class="mt-2 d-flex align-items-center justify-content-between">
                <b class="fw-bold">Rp. {{ $price }}</b>
                <a href="{{ route('cart.create', ['product' => $id]) }}" class="btn btn-success btn-sm"><svg
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-plus" viewBox="0 0 16 16">
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                    </svg> Add</a>
            </div>
        </div>
    </div>
</div>

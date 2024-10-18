<div>
    <div class="card-content-types">
        <h5 class="mt-3">All Products</h5>
        <div class="row">
            @foreach ($products as $item)
                <div class="col-md-6 col-lg-4">
                    <h6 class="my-2 text-muted">{{ $item->product_name }}</h6>
                    <div class="card mb-4">
                        <img class="card-img-top" src="{{ asset('storage/products/' . $item->image) }}"
                            alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text" style="min-height: 20vh;">
                                {{ str_limit(strip_tags($item->description), 350) }}
                                @if (strlen(strip_tags($item->description)) > 350)
                                    ....
                                @endif
                            </p>
                            <p class="card-text">
                                <span class="badge badge-light-success">Available Stock - {{ $item->quantity }}</span>
                            </p>
                            <form wire:submit.prevent="addproduct" method="POST">
                                @csrf
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div>{{ $error }}</div>
                                    @endforeach
                                @endif
                                <input type="text" wire:model="product_name" value="{{ $item->id }}">
                                <button type="submit" class="btn btn-block btn-primary">Add To Cart</button>
                            </form>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

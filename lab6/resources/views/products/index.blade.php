@extends('layout')

@section('content')
<h2 class="text-center mb-4">Oferte Actuale</h2>

@if($products->isEmpty())
    <div class="alert alert-warning text-center">Nu sunt produse în baza de date.</div>
@else
    <div class="row g-4">
        @foreach($products as $product)
            <div class="col-md-4 col-lg-3">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-header bg-transparent border-0 pt-3">
                        <span class="badge bg-primary">{{ $product->category }}</span>
                    </div>

                    <div class="card-body text-center">
                        <h5 class="card-title text-dark">{{ $product->name }}</h5>
                        <p class="card-text text-muted small">{{ $product->description ?? 'Fără descriere' }}</p>
                        <h4 class="text-danger fw-bold">{{ $product->price }} MDL</h4>
                    </div>

                    <div class="card-footer bg-white border-0 pb-3">
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Sigur ștergeți?');">
                            @csrf  @method('DELETE') <button type="submit" class="btn btn-outline-danger w-100 btn-sm">
                                Șterge
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
@endsection

@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Adaugă Produs Nou</h5>
            </div>
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('products.store') }}" method="POST">
                    @csrf <div class="mb-3">
                        <label class="form-label">Denumire Produs</label>
                        <input type="text" name="name" class="form-control" placeholder="Ex: Intel Core i9" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Descriere</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Preț (MDL)</label>
                        <input type="number" name="price" class="form-control" step="0.01" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Categorie</label>
                        <select name="category" class="form-select">
                            <option value="CPU">Procesoare (CPU)</option>
                            <option value="GPU">Plăci Video (GPU)</option>
                            <option value="RAM">Memorie RAM</option>
                            <option value="Storage">SSD / HDD</option>
                            <option value="Motherboard">Plăci de bază</option>
                        </select>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success">Salvează Produsul</button>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">Înapoi</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

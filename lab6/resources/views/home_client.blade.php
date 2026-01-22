@extends('layout')

@section('content')
<div class="text-center py-5">
    <h1 class="display-4 fw-bold text-primary">Bine ați venit la PC MASTER</h1>
    <p class="lead text-muted">Cele mai performante componente IT din Moldova</p>
</div>

<h3 class="mb-4 border-bottom pb-2">Catalog Produse (Live API)</h3>

<div class="row g-4" id="products-container">
    <div class="col-12 text-center py-5">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
        <p class="mt-2 text-muted">Se încarcă produsele...</p>
    </div>
</div>

<script src="{{ asset('js/home.js') }}"></script>

@endsection

@extends('layout')

@section('content')
<div class="container py-5">
    <div class="row align-items-center mb-5">
        <div class="col-lg-6">
            <h1 class="display-4 text-primary fw-bold">Cine suntem noi?</h1>
            <p class="lead text-muted">Lideri pe piața componentelor IT din Moldova din 2020.</p>
            <p>
                Misiunea PC MASTER este să ofere entuziaștilor și profesioniștilor acces la cele mai noi tehnologii
                (NVIDIA, Intel, AMD) la prețuri corecte. Avem o echipă de experți gata să te ajute la asamblarea PC-ului de vis.
            </p>
            <p>Oferim garanție oficială, suport tehnic și livrare rapidă în toată țara.</p>
        </div>
        <div class="col-lg-6">
            <div class="bg-secondary text-white d-flex align-items-center justify-content-center rounded shadow"
                 style="height: 300px;">
                <h3>FOTO OFICIU</h3>
            </div>
        </div>
    </div>

    <h3 class="text-center mb-4">De ce noi?</h3>
    <div class="row text-center">
        <div class="col-md-4">
            <div class="card p-3 shadow-sm h-100">
                <h5>🚀 Viteză</h5>
                <p class="small">Livrare în 24h în orice colț al țării.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 shadow-sm h-100">
                <h5>🛡️ Garanție</h5>
                <p class="small">Toate produsele sunt 100% originale.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 shadow-sm h-100">
                <h5>💡 Suport</h5>
                <p class="small">Consultanță gratuită pentru asamblare.</p>
            </div>
        </div>
    </div>
</div>
@endsection

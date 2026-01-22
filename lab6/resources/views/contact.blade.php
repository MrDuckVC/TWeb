@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-info text-dark">
                <h3 class="mb-0">Contactează-ne</h3>
            </div>
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                           @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Nume</label>
                            <input type="text" name="name" class="form-control" required placeholder="Ion Popescu">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required placeholder="email@example.com">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mesaj</label>
                        <textarea name="message" class="form-control" rows="5" required minlength="10"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Trimite Mesaj</button>
                </form>
            </div>
        </div>

        <div class="text-center mt-4">
            <h5>Date de contact:</h5>
            <p>📍 Chișinău, str. Example 9/5</p>
            <p>📞 +373 12 34 45 67</p>
        </div>
    </div>
</div>
@endsection

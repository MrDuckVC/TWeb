@extends('layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>📩 Mesaje de la Clienți</h2>
    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">← Înapoi la Produse</a>
</div>

@if($messages->isEmpty())
    <div class="alert alert-info">Nu aveți mesaje noi.</div>
@else
    <div class="table-responsive">
        <table class="table table-hover bg-white shadow-sm rounded">
            <thead class="table-dark">
                <tr>
                    <th>Data</th>
                    <th>Nume</th>
                    <th>Email</th>
                    <th>Mesaj</th>
                    <th>Acțiune</th>
                </tr>
            </thead>
            <tbody>
                @foreach($messages as $msg)
                    <tr>
                        <td style="white-space: nowrap;">{{ $msg->created_at->format('d.m.Y H:i') }}</td>
                        <td class="fw-bold">{{ $msg->name }}</td>
                        <td><a href="mailto:{{ $msg->email }}">{{ $msg->email }}</a></td>
                        <td>{{ $msg->message }}</td>
                        <td>
                            <form action="{{ route('messages.destroy', $msg->id) }}" method="POST" onsubmit="return confirm('Ștergeți?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Șterge</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
@endsection

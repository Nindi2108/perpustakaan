@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            Detail Buku
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $book->title }}</h5>
            <p><strong>Penulis:</strong> {{ $book->author }}</p>
            <p><strong>Tahun:</strong> {{ $book->year }}</p>
            <p><strong>Deskripsi:</strong> {{ $book->description }}</p>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection

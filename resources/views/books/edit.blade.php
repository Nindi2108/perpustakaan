@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')
    <h1 class="mb-4">Edit Buku</h1>

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-2">
            <label class="form-label">Judul Buku</label>
            <input type="text" name="title" class="form-control form-control-sm" value="{{ $book->title }}" required>
        </div>
        <div class="mb-2">
            <label class="form-label">Penulis</label>
            <input type="text" name="author" class="form-control form-control-sm" value="{{ $book->author }}" required>
        </div>
        <div class="mb-2">
            <label class="form-label">Tahun Terbit</label>
            <input type="number" name="year" class="form-control form-control-sm" value="{{ $book->year }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control form-control-sm" rows="3" required>{{ $book->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Update</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary btn-sm">Batal</a>
    </form>
@endsection

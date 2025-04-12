@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-center text-primary"><i class="bi bi-book-half me-2"></i>Dashboard</h2>


    <div class="card border-0 shadow-sm mb-4" style="border-radius: 8px;">
        <div class="card-body text-center">
            <i class="bi bi-book-fill text-primary mb-3" style="font-size: 3rem;"></i>
            <h4 class="card-title mb-3">Manajemen Buku</h4>
            <p class="card-text text-muted mb-4">Kelola data buku perpustakaan dengan mudah.</p>
            <a href="{{ route('books.index') }}" class="btn btn-outline-primary px-4 py-2">
                <i class="bi bi-journal-text me-2"></i> Kelola Buku
            </a>
        </div>
    </div>

    <div class="text-center">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-outline-danger px-4 py-2">
                <i class="bi bi-box-arrow-right me-2"></i> Logout
            </button>
        </form>
    </div>
</div>
@endsection

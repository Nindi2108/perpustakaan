@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Tambah Buku</h1>
        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm">Dashboard</a>
    </div>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf


        <div class="row mb-2 align-items-center">
            <div class="col-md-6">
                <label class="form-label">Judul Buku</label>
                <input type="text" name="title"
                       class="form-control form-control-sm @error('title') is-invalid @enderror"
                       value="{{ old('title') }}" required>
            </div>
            <div class="col-md-6 text-danger text-sm">
                @error('title')
                    {{ $message }}
                @enderror
            </div>
        </div>


        <div class="row mb-2 align-items-center">
            <div class="col-md-6">
                <label class="form-label">Penulis</label>
                <input type="text" name="author"
                       class="form-control form-control-sm @error('author') is-invalid @enderror"
                       value="{{ old('author') }}" required>
            </div>
            <div class="col-md-6 text-danger text-sm">
                @error('author')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="row mb-2 align-items-center">
            <div class="col-md-6">
                <label class="form-label">Tahun Terbit</label>
                <input type="number" name="year" min="1000" max="2099"
                       class="form-control form-control-sm @error('year') is-invalid @enderror"
                       value="{{ old('year') }}" required>
            </div>
            <div class="col-md-6 text-danger text-sm">
                @error('year')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="row mb-3 align-items-start">
            <div class="col-md-6">
                <label class="form-label">Deskripsi</label>
                <textarea name="description" rows="3"
                          class="form-control form-control-sm @error('description') is-invalid @enderror"
                          required>{{ old('description') }}</textarea>
            </div>
            <div class="col-md-6 text-danger text-sm">
                @error('description')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-success btn-sm">Simpan</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary btn-sm">Batal</a>
    </form>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if ($errors->any())
        <script>
            Swal.fire({
                title: 'Validasi Gagal!',
                html: {!! implode('<br>', $errors->all()) !!},
                icon: 'error',
                confirmButtonText: 'Oke',
                confirmButtonColor: '#d33'
            });
        </script>
    @endif
@endsection

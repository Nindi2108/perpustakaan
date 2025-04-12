@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    <div class="container py-4">
        <h1 class="mb-4">Daftar Buku</h1>

        <?php if (session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show position-fixed top-0 end-0 m-3 shadow" role="alert" style="z-index: 1050;">
                <strong>Berhasil!</strong> <?= session('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <script>
                window.addEventListener('load', function() {
                    setTimeout(() => {
                        document.querySelector('.alert').classList.remove('show');
                        setTimeout(() => {
                            document.querySelector('.alert').remove();
                        }, 300);
                    }, 2500);
                });
            </script>
        <?php endif; ?>

        <div class="mb-3 text-end">
            <a href="<?= route('books.create') ?>" class="btn btn-success btn-sm">
                <i class="bi bi-plus-circle"></i> Tambah Buku
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Penulis</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($books as $index => $book): ?>
                        <tr>
                            <td class="text-center"><?= $index + 1 ?></td>
                            <td><?= $book->title ?></td>
                            <td><?= $book->author ?></td>
                            <td><?= $book->year ?></td>
                            <td><?= $book->description ?></td>
                            <td class="text-center">
                                <a href="<?= route('books.show', $book->id) ?>" class="btn btn-info btn-sm">Lihat</a>
                                <a href="<?= route('books.edit', $book->id) ?>" class="btn btn-primary btn-sm">Edit</a>
                                <form action="<?= route('books.destroy', $book->id) ?>" method="POST" style="display:inline-block;">
                                    <?= csrf_field() ?>
                                    <?= method_field('DELETE') ?>
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus buku ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
@endsection

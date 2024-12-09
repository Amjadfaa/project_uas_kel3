@extends('layouts.app')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        <h5 class="card-title">Tambah Mahasiswa/h5>
    </div>
    <div class="card-body">
        <form action="{{ route('consules.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="npm" class="form-label">Npm</label>
                <input type="text" class="form-control" id="npm" name="npm" required>
            </div>
            <div class="mb-3">
                <label for="semester" class="form-label">Semester</label>
                <textarea class="form-control" id="semester" name="semester"></textarea>
            </div>
            <div class="mb-3">
                <label for="cover" class="form-label">Cover</label>
                <input type="file" class="form-control" id="cover" name="cover" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

@endsection

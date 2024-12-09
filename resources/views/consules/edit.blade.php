@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Consule</h1>
        <div class="card">
            <div class="card-header">
                <h5>Edit Consule: {{ $consule->nama }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('consules.update', $consule->slug) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $consule->nama }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="npm">Npm</label>
                        <input type="text" class="form-control" id="npm" name="npm" value="{{ $consule->npm }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="semester">Semester</label>
                        <textarea class="form-control" id="semester" name="semester" rows="4">{{ $consule->semester }}</textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="cover">Cover (optional)</label>
                        <input type="file" class="form-control-file" id="cover" name="cover">
                        <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti cover.</small>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('consules.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Consules</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif  

        <!-- Card untuk menampilkan daftar consules -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title">Daftar Mahasiswa</h5>
                <a href="{{ route('consules.create') }}" class="btn btn-primary">Tambah Mahasiswa</a>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach($consules as $consules)
                        <div class="col-md-4 mb-4"> <!-- Menggunakan col-md-4 untuk 3 card dalam satu baris -->
                            <div class="card">
                                <img class="card-img-top" src="{{ asset('storage/' . $consules->cover) }}" alt="{{ $consule->nama }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $consules->nama }}</h5>
                                    <p class="card-text"><strong>Npm</strong> {{ $consules->npm }}</p>
                                    <div class="d-flex justify-content-start mt-3"> <!-- Memindahkan tombol ke kiri -->
                                        <a href="{{ route('consules.show', $consule->slug) }}" class="btn btn-info me-2">Detail</a>
                                        <a href="{{ route('consules.edit', $consule->slug) }}" class="btn btn-warning me-2">Edit</a>
                                        <form action="{{ route('consules.destroy', $consule->slug) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

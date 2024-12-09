@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Detail Mahasiswa</h1>
        <div class="row justify-content-start">
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('storage/' . $consule->cover) }}" alt="{{ $consule->nama }}">
                    <div class="card-body">
                        <h4 class="card-title">{{ $consule->nama }}</h4>
                        <p class="card-text"><strong>Npm:</strong> {{ $consule->npm }}</p>
                        <p class="card-text">{{ $consule->semester }}</p>
                        <a href="{{ route('consules.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

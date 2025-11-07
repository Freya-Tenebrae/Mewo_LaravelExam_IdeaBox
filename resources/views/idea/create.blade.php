@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2>Idée</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('ideas.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Titre de l'idée : </label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description de l'idée : </label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex w-100">
                            <a href="{{ route('ideas.index') }}" class="btn btn-secondary">Annuler</a>
                            <button type="submit" class="btn btn-primary ms-auto">Ajouter l'idée</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
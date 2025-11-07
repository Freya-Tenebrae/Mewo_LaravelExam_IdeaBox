@extends('layouts.app')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Boite à Idées</h1>
        <a href="{{ route('ideas.create') }}" class="btn btn-primary">Proposer une idée</a>
    </div>
    <hr>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Mes idées</h2>
        <form action="{{ route('ideas.index') }}" method="GET" class="d-flex" role="search">
            <input type="search" name="search" class="form-control form-control-sm me-2" placeholder="Rechercher une idée..." value="{{ $searchTerm ?? '' }}">
            <button class="btn btn-outline-primary btn-sm" type="submit">Rechercher</button>
        </form>
    </div>
    @forelse ($ideas as $idea)
        <div class="card mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5 class="card-title">
                            <a href="{{ route('ideas.show', $idea) }}">{{ $idea->title }}</a>
                            <p class="card-text"><small class="text-muted">{{ $idea->status }}</small></p>
                        </h5>
                        <p class="card-text">{{ $idea->description }}</p>
                    </div>
                    <div class="d-flex gap-2 align-items-start">
                        <a href="{{ route('ideas.edit', $idea) }}" class="btn btn-secondary btn-sm">Modifier</a>
                        <form action="{{ route('ideas.destroy', $idea) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="alert alert-secondary">Vous n'avez encore créé aucune note.</div>
    @endforelse
@endsection
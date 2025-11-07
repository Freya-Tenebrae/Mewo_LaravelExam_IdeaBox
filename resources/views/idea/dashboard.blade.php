@extends('layouts.app')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Boite à Idées</h1>
        <a href="{{ route('ideas.create') }}" class="btn btn-primary">Proposer une idée</a>
    </div>
    <hr>
    <h2 class="mb-3">Mes idées</h2>
    @forelse ($ideas as $idea)
        <div class="card mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5 class="card-title">
                            <a href="{{ route('ideas.show', $idea) }}">{{ $idea->title }}</a>
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
@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2>Idée</h2>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Titre de l'idée : </label>
                        <br>
                        <label class="form-label">{{ $idea->title }}</label>
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description de l'idée : </label>
                        <br>
                        <p class="form-label">{!! nl2br(e($idea->description)) !!}</p>
                    </div>
                    <div class="d-flex w-100">
                        <a href="{{ route('ideas.index') }}" class="btn btn-secondary">Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
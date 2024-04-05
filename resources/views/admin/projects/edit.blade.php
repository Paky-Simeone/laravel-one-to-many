@extends('layouts.app')

@section('title', 'Modifica Progetto')

@section('content')
    <div class="container">
        <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-primary mt-4 mb-3">Torna al progetto</a>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-primary mt-4 mb-3">Torna alla lista</a>

        <h1 class="mb-3">Modifica {{ $project->title }}</h1>

        <form action="{{ route('admin.projects.update', $project) }}" method="POST">
            @csrf

            @method('PATCH')

            <div class="row g-3">
                <div class="col-6">
                    <label for="title" class="form-label">Titolo</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        name="title" value="{{ $errors->any() ? old('title') : $project->title }}">

                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-6">
                    <label for="author" class="form-label">Autore</label>
                    <input type="text" class="form-control @error('author') is-invalid @enderror" id="author"
                        name="author" value="{{ $errors->any() ? old('author') : $project->author }}">

                    @error('author')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-6">
                    <label for="project_link" class="form-label">Link al progetto</label>
                    <input type="url" class="form-control @error('project_link') is-invalid @enderror" id="project_link"
                        name="project_link" value="{{ $errors->any() ? old('project_link') : $project->project_link }}">

                    @error('project_link')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-6">
                    <label for="type_id" class="form-label">Tipologia di progetto</label>
                    <select name="type_id" id="type_id" class='form-select @error('type_id') is-invalid @enderror'>
                        <option value="" class="d-none">Seleziona una tipologia</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}"
                                {{ $type->id == old('type_id', $project->type_id) ? 'selected' : '' }}>
                                {{ $type->type }}
                            </option>
                        @endforeach
                    </select>
                    @error('type_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                        rows="3">{{ $errors->any() ? old('description') : $project->description }}</textarea>

                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-2">
                    <button class="btn btn-success">Salva</button>
                </div>
            </div>
        </form>
    </div>
@endsection
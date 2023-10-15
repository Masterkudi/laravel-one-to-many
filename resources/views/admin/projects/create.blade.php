@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Nuovo Progetto</h1>

        {{-- Variabile $errors che va a ciclare su ogni errore e poi li stampa --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf()

            <div class="mb-3">
                <label class="form-label">Titolo</label>
                <input type="text" class="form-control" name="title">
            </div>

            <div class="mb-3">
                <label class="form-label">Categoria</label>
                <select class="form-select" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>


           {{-- <div class="mb-3">
                <label class="form-label">Tags</label>
                <div>
                    @foreach ($tags as $tag)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="tags[]" id="{{ $tag->slug }}"
                                value="{{ $tag->id }}">
                            <label class="form-check-label" for="{{ $tag->slug }}">{{ $tag->name }}</label>
                        </div>
                    @endforeach
                </div>
            </div> --}}

            <div class="mb-3">
                <label class="form-label">Immagine</label>
                <input type="file" accept="image/*" class="form-control" name="image">
            </div>

            <div class="mb-3">
                <label class="form-label">Contenuto</label>
                <textarea class="form-control" name="body"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Repository</label>
                <input type="text" class="form-control" name="repository">
            </div>

            <div class="mb-3">
                <label class="form-label">Data Pubblicazione</label>
                <input type="date" class="form-control" name="published_at">
            </div>

            <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">Salva</a>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-danger">Annulla</a>
        </form>
    </div>

@endsection

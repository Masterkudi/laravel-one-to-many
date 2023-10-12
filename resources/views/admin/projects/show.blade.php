@extends('layouts.app')

@section('content')
    <div class="container border border-dark p-3">
        <h1>{{ $project->title }}</h1>
        {{-- la funzione asset crea un link alla cartella public 
        che prende le immagini uploadate e le mette nella cartella storage --}}
        <div class="">
            <img src="{{ asset('/storage/' . $project->image) }}" alt="" class="img-fluid">
        </div>
        <small>Data pubblicazione: {{ $project->published_at?->format('d/m/Y H:i') }}</small>
        <p>{{ $project->body }}</p>

        <div class="p-0">
            <a href="{{ route('admin.projects.index', $project->slug) }}" class="btn btn-danger">Torna indietro</a>
        </div>
    </div>
@endsection

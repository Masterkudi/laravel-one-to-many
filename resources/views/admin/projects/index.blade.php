@extends('layouts.app')

@section('content')
    <div class="container">

        <h3 class="mt-3">Lista dei miei Progetti</h3>

        <div class="projectsGallery">
            <div class="row row-cols-5 g-4 justify-content-center flex-wrap-wrap">
                @foreach ($projects as $project)
                    <div class="col p-4">
                        <div class="card p-1">
                            <div>
                                <img src={{ asset('/storage/' . $project->image) }}
                                class="img-thumbnail" style="width: 200px">
                            </div>
                            <div class="card-body bg-white text-center">
                                <div>{{ $project->title }}</div>
                                <div><span class="badge" style="background-color: rgb({{ $project->type->color}})">{{ $project->type->name }}</span></div>
                                <div>{{ $project->published_at?->format('d/m/Y H:i') }}</div>
                                <div><a href="{{ $project->repository }}">
                                        <i class="fa-brands fa-github fa-2xl" style="padding: 2rem"></i></a>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <div class="p-2">
                                    <a href="{{ route('admin.projects.show', $project->slug) }}" class="btn btn-info">
                                        <i class="fa-solid fa-circle-info"></i></a>
                                </div>
                                <div class="p-2">
                                    <a href="{{ route('admin.projects.edit', $project->slug) }}" class="btn btn-warning">
                                        <i class="fa-solid fa-pen-to-square"></i></a>
                                </div>
                                <div class="p-2">
                                    <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST">
                                        @csrf()
                                        @method('DELETE')
                                        <a class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

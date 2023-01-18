@extends('layouts.admin')

@section('content')
    <h1>Edit</h1>
    <h1>Modifica Progetto:{{ $type->workflow }}</h1>
    <div class="row bg-white">
        <div class="col-12">
            <form action="{{ route('admin.types.update', $type->slug) }}" method="POST" enctype="multipart/form-data"
                class="p-4">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="workflow" class="form-label">nome di workflow</label>
                    <input type="text" class="form-control @error('workflow') is-invalid @enderror" id="workflow"
                        name="workflow" value="{{ old('workflow', $type->workflow) }}">
                    @error('name_proj')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                {{-- <div class="d-flex">
                    <div class="media me-4">
                        <img class="shadow" width="150" src="{{ asset('storage/' . $project->cover_image) }}"
                            alt="{{ $project->name_proj }}">
                    </div>
                    <div class="mb-3">
                        <label for="cover_image" class="form-label">cambia img anteprima </label>
                        <input type="file" name="cover_image" id="cover_image"
                            class="form-control  @error('cover_image') is-invalid @enderror">
                        @error('cover_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description">{{ old('description', $project->description) }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="dev_lang" class="form-label">Linguaggi</label>
                    <input type="text" class="form-control @error('dev_lang') is-invalid @enderror" id="dev_lang"
                        name="dev_lang" value="{{ old('dev_lang', $project->dev_lang) }}">
                    @error('dev_lang')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="dev_framework" class="form-label">dev_framework</label>
                    <input type="text" class="form-control @error('dev_framework') is-invalid @enderror"
                        id="dev_framework" name="dev_framework"
                        value="{{ old('dev_framework', $project->dev_framework) }}">
                    @error('dev_framework')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="team" class="form-label">Team</label>
                    <input type="text" class="form-control @error('team') is-invalid @enderror" id="team"
                        name="team" value="{{ old('team"', $project->team) }}">
                    @error('team')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="link_git" class="form-label">Link Git</label>
                    <input type="text" class="form-control @error('link_git') is-invalid @enderror" id="link_git"
                        name="link_git" value="{{ old('link_git', $project->link_git) }}">
                    @error('link_git')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="lvl_dif" class="form-label">Difficolta</label>
                    <input type="number" class="form-control @error('lvl_dif') is-invalid @enderror" id="lvl_dif"
                        name="lvl_dif" value="{{ old('lvl_dif', $project->lvl_dif) }}">
                    @error('lvl_dif')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror --}}
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        <button type="reset" class="btn btn-primary">Reset</button>
        <button class="btn btn-primary"><a
                href="{{ route('admin.projects.index') }}"style="color:white">Indietro</a></button>
        </form>
    </div>
    </div>
@endsection
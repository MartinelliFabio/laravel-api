@extends('layouts.admin')
@section('content')
    <h1>Create Project</h1>
    <div class="row bg-white">
        <div class="col-12">
            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="p-4">
                @csrf
                <div class="mb-3">
                    {{-- name_proj --}}
                    <label for="title" class="form-label">Titolo</label>
                    <input type="text" class="form-control @error('name_proj') is-invalid @enderror" id="name_proj"
                        name="name_proj">
                    @error('name_proj')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                {{-- img_cover --}}
                <div class="mb-3">
                    <label for="cover_image" class="form-label">Immagine</label>
                    <input type="file" name="cover_image" id="cover_image"
                        class="form-control  @error('cover_image') is-invalid @enderror">
                    @error('cover_image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                {{-- description --}}
                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                </div>
                {{-- dev_framework --}}
                <div>
                    <label for="languages">Linguaggi</label> <br>
                    @foreach ($languages as $language)
                        @if (old("languages"))
                            <input type="checkbox" name="languages[]" value="{{ $language->id }}" {{in_array( $language->id, old("languages", []) ) ? 'checked' : ''}}>
                            <span class="text-capitalize">{{ $language->name }}</span>
                            @else
                            <input type="checkbox" name="languages[]" value="{{ $language->id }} " {{ old('languages', $project->languages) ? (old('languages', $project->languages)->contains($language->id) ? 'checked' : '') : '' }}>
                            <span class="text-capitalize">{{ $language->name }}</span>
                        @endif
                    @endforeach
                </div>
                <div class="mb-3">
                    <label for="dev_framework" class="form-label">Framework usati </label>
                    <input class="form-control" id="dev_framework" name="dev_framework">
                </div>
                {{-- team --}}
                <div class="mb-3">
                    <label for="team" class="form-label">Team</label>
                    <input class="form-control" id="team" name="team">
                </div>

                {{-- lvl_diff --}}
                <label for="lvl_dif" class="form-label">Livello di difficoltà</label>
                <input type="number" class="form-control @error('lvl_dif') is-invalid @enderror" id="lvl_dif" name="lvl_dif">
                @error('lvl_dif')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
        </div>
        {{-- linkgit --}}
        <div class="mb-3">
            <label for="link_git" class="form-label">GhitHub</label>
            <input class="form-control" id="link_git" name="link_git">
        </div>
        {{-- workflow type --}}
        <div class="mb-3">
            <label for="type_id" class="form-label">Seleziona workflow</label>
            <select name="type_id" id="type_id" class="form-control @error('type_id') is-invalid @enderror">
                <option value="">Seleziona workflow</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ $type->id == old('type_id') ? 'selected' : '' }}>
                        {{ $type->workflow }}</option>
                @endforeach
            </select>
            @error('type_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        <button type="reset" class="btn btn-primary">Reset</button>
        </form>
    </div>
    </div>
@endsection
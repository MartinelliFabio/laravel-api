@extends('layouts.admin')
@section('content')
    <h1>Projects</h1>
    <button class="btn btn-primary mb-5 mt-3"><a href="{{ route('admin.projects.create') }}" class="text-white text-decoration-none">Aggiungi un progetto</a></button>
    @if (session()->has('message'))
        <div class="alert alert-success mb-3 mt-3">
            {{ session()->get('message') }}
        </div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th class="text-center" scope="col">Edit</th>
                <th class="text-center" scope="col">Delete</th>
                <th class="text-center" scope="col">Workflow</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr class="">
                    <th scope="row">{{ $project->id }}</th>
                    <td><a href="{{ route('admin.projects.show', $project->slug) }}" title="View project">{{ $project->name_proj }}</a></td>
                    <td>{{ Str::limit($project->description, 50) }}</td>
                    <td class="text-center"><a class="link-secondary" href="{{ route('admin.projects.edit', $project->slug) }}" title="Edit project"><i class="fa-solid fa-pen"></i></a></td>
                    <td class="text-center">
                        <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button btn btn-danger" data-item-title="{{ $project->name_proj }}"> <i class="fa-solid fa-trash-can"></i></button>
                            @if ($project->type)
                                <td class="text-center">{{ $project->type->workflow }}</td>
                            @else
                                <td>/</td>
                            @endif
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('partials.admin.modal')
@endsection
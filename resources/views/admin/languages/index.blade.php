@extends('layouts.admin')
@section('content')
    <div class="projects-list">
        <div class="table-container">
            @if (session()->has('message'))
                <div class="alert alert-success mb-3 mt-3 w-75 m-auto">
                    {{ session()->get('message') }}
                </div>
            @endif
            <form action="{{ route('admin.languages.store') }}" method="POST" class="d-flex align-items-center mb-5">
                @csrf
                <h1 class="text-center fs-2 m-0">Aggiungi un Linguaggio</h1>
                <div class="mx-5 px-5">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" required maxlength="45">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary" id="btn-submit">Invia</button>
                    <button type="reset" class="btn btn-danger" id="btn-reset">Resetta</button>
                </div>
            </form>

            <table>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th class="text-center" scope="col">Name</th>
                        <th class="text-center" scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($languages as $language)
                        <tr>
                            <th class="pt-4" scope="row">{{ $language->id }}</th>
                            <td class="pt-4">
                                <form class="m-0" action="{{ route('admin.languages.update', $language->slug) }}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <input class="border-0 bg-transparent text-center" type="text" name="name" value="{{ $language->name }}">
                                </form>
                            </td>
                            <td class="pt-4">
                                <form class="m-0 text-center" action="{{ route('admin.languages.destroy', $language->slug) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-button btn btn-danger" data-item-title="{{ $language->name }}"><i class="fa-solid fa-trash-can"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
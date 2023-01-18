@extends('layouts.admin')
@section('content')
    <h1>Show Post</h1>
    <div>Nome: {{ $project->name_proj }}</div>

    @if ($project->type)
        <td>{{ $project->type->workflow }}</td>
    @else
        <td>/</td>
    @endif
    @if (count($project->languages))
        @foreach ($project->languages as $language)
            <div>{{ $language->name }}</div>
        @endforeach
    @endif
    <div>Difficoltà: {{ $project->lvl_dif }}</div>
    <div>Framework: {{ $project->dev_framework }}</div>
    <div>Team: {{ $project->team }}</div>
@endsection
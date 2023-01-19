@extends('layouts.admin')
@section('content')
    <h1>Show Post</h1>
    <div><strong>Nome:</strong> {{ $project->name_proj }}</div>

    @if ($project->type)
        <div><strong>Workflow:</strong> {{ $project->type->workflow }}</div>
    @else
        <div>/</div>
    @endif
    @if (count($project->languages))
        <strong>Linguaggi:</strong>
        @foreach ($project->languages as $language)
            <div>{{ $language->name }}</div>
        @endforeach
    @endif
    <div><strong>Difficoltà:</strong> {{ $project->lvl_dif }}</div>
    <div><strong>Framework:</strong> {{ $project->dev_framework }}</div>
    <div><strong>Team:</strong> {{ $project->team }}</div>
@endsection
@extends('admin.layouts.app_admin')

@section('content')
@section('title')
Dashboard
@endsection
<div class="p-3 mb-4 bg-light rounded-5">
    <div class="container-fluid py-3">
        <h2 class="fw-bold">New project</h2>
        <a href="{{route('project.create')}}" class="btn btn-primary btn-md " type="button">Create</a>
    </div>
</div>
@endsection
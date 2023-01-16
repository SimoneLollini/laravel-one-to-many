@extends('admin.layouts.app_admin')

@section('content')
@section('title')
Tools
@endsection
@if(session('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <strong>
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
        </svg>
        <span class="info_message">
            {{session('message')}}
        </span>
    </strong>
</div>
@endif
<div class="container">
    <a class="btn btn-primary btn-sm m-3" href="{{route('project.create')}}">Add</a>
    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">image</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Type</th>
                    <th scope="col">Tools</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                <tr class="">
                    <td scope="row">{{$project->title}}</td>
                    <td> <img width="100" class="img-fluid" src="{{asset('storage/' . $project->image)}}" alt="no img"></td>
                    <td> {{$project->slug}}</td>
                    <td> {{$project->type ? $project->type->name : 'Null'}}</td>
                    <td class="">
                        <a class="btn btn-primary btn-sm m-1 w-75" href="{{route('project.show', $project->slug)}}">Details</a>
                        <a class="btn btn-primary btn-sm m-1 w-75" href="{{route('project.edit', $project->slug)}}">Edit</a>
                        <form action="{{route('project.destroy', $project->slug)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-primary btn-sm m-1 w-75" type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
                @empty
                <p>Ancora nessun progetto!</p>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
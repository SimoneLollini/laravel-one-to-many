@extends ('layouts.app')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form method="POST" action="{{ route('project.update',$project->slug )}}" enctype="multipart/form-data">

    @csrf

    @method('PUT')

    <div class="container mt-5">

        <div class="wrapper py-3">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{old('title', $project->title)}}">
        </div>

        <div class="mb-3 d-flex gap-4">
            <img width="140" src="{{ asset('storage/' . $project->image)}}" alt="">
            <div>
                <label for="image" class="form-label">Replace Image</label>
                <input type="file" name="image" id="image" class="form-control  @error('image') is-invalid @enderror" aria-describedby="ImageHelper">
                <small id="ImageHelper" class="text-muted">Replace the project image</small>
            </div>
        </div>

        <div class=" wrapper py-3">
            <label for="description">Description</label>
            <textarea type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror" aria-describedby="descriptionHlper" value="{{ old('description',$project->description) }}"></textarea>
        </div>

        <input type="submit" value="Submit">

    </div>

</form>

@endsection
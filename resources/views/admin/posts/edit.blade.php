@extends("layouts.dashboard")

@section("content")

<div class="container create-form-wrapper">
     <div class="row my-2">
        <div class="col">
            <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Back">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12 card">
            <div class="card-body">
                <h1 class="card-title">Modifica il post</h1>
                <form action="{{ route('admin.posts.update', $post->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <label for="title">Titolo</label>
                        @if ($errors->has('title'))
                        <input type="text" class="form-control is-invalid" id="title" name="title" placeholder="Titolo" value=" {{ old('title', $post->title ) }} ">
                        <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                        @else
                        <input type="text" class="form-control" id="title" name="title" placeholder="Titolo" value=" {{ old('title', $post->title) }} ">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" disabled value="{{ $post->slug }}">
                    </div>
                    <div class="form-group">
                        <label for="content">Contenuto</label>
                        @if ($errors->has('content'))
                        <textarea class="form-control is-invalid" id="content" name="content" rows="3">{{ old('content', $post->content) }}</textarea>
                        <div class="invalid-feedback">{{ $errors->first('content') }}</div>
                        @else
                        <textarea class="form-control" id="content" name="content" rows="3">{{ old('content', $post->content) }}</textarea>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

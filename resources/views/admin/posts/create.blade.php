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
        <div class="col card">
            <div class="card-body">
                <h1 class="card-title">Crea nuovo post</h1>
                <form action="{{ route('admin.posts.store') }}" method="POST">
                    @csrf
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
                        <input type="text" class="form-control  @error('title') is-invalid @enderror" id="title" name="title" placeholder="Titolo" value=" {{ old('title') }} ">
                        <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                    </div>
                    <label for="category_id"> Category </label>
                    <select class="form-select @error('category_id') is-invalid @enderror" name="category_id">
                          <option selected>Open this select menu</option>
                          @foreach ($categories as $category)
                          <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}
                                >{{ $category->name }}</option>
                          @endforeach
                        </select>
                          @error('category_id')
                          <div class="invalid-feedback">{{ $message }}</div>
                          @enderror

                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" disabled>
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control  @error('content') is-invalid @enderror" id="content" name="content" placeholder="Contenuto" rows="10"> {{ old('content') }} </textarea>
                        <div class="invalid-feedback">{{ $errors->first('content') }}</div>
                    </div>
                    <button type="submit" class="btn btn-primary" id="saveBtn">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

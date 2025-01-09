@extends('_partials.content')
@section('content')

<div class="card">
    <div class="card-header">
        <h5 class="card-title">Multiple Upload</h5>
    </div>
    <form action="{{route('multiple.upload')}}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-1">
                    <label for="title">title</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-1">
                    <label for="cat_id">Category</label>
                    <select  name="cat_id" id="cat_id" class="form-control">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-1">
                    <label for="type" id="wallpaper_file_label_id">Upload</label>
                    <input class="form-control"  name="type[]" id="type" type="file" multiple>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-gradient-primary float-end">Save</button>
            </div>
        </div>
    </div>
</form>
</div>
@endsection

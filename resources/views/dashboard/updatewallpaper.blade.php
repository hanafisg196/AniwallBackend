@extends('_partials.content')
@section('content')

<div class="card">
    <div class="card-header border-bottom p-1">
        <div class="head-label"></div>
        <div class="dt-action-buttons text-end">
            <div class="dt-buttons d-inline-flex">
                
            </div>
        </div>
    </div>
    
         <form class="auth-login-form mt-2" method="post" action="/wallpaper/edit/{{ $data->id }}"
         enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-1" id="title" style="display: block">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                        value="{{old('title', $data->title) }}"
                                            placeholder="title">
                                    </div>

                                    <div class="mb-1">
                                        <label for="cat_id">Category</label>
                                        <select name="cat_id" id="cat_id" class="form-control">
                                            @foreach ($category as $catItem)
                                            @if (old('cat_id', $data['cat_id']) == $catItem->id )
                                            <option value="{{ $catItem->id }}" selected>
                                                {{ $catItem->name}}</option>
                                            @endif
                                            <option value="{{ $catItem->id }}">
                                                {{ $catItem->name}}</option>
                                            @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-1" id="resolution" style="display: block">
                                        <label for="resolution">Resolution</label>
                                        <input type="text" class="form-control" id="resolution" name="resolution"
                                        value="{{old('resolution', $data->resolution) }}"
                                        placeholder="Resolution">
                                    </div>

                                    <div class="mb-1" id="size" style="display: block">
                                        <label for="size">Size</label>
                                        <input type="text" class="form-control" id="size" name="size"
                                        value="{{old('size', $data->size) }}" disabled
                                        placeholder="Resolution">
                                    </div>

                                </div>
                                    
                            </div>

                            <div class="col-md-3">
                                <div class="mb-1" id="type">
                                    <label for="type" id="wallpaper_file_label_id">Wallpaper</label>
                                    @if ($data['type'])
                                        @if (pathinfo($data->type, PATHINFO_EXTENSION) == 'mp4')
                                        <div>
                                            <video class="video-preview" width="200"
                                            height="300" controls>
                                           <source src="{{ asset('storage/' . $data['type']) }}"
                                            type="video/mp4">
                                               Your browser does not support the video tag.
                                               <track kind="subtitles"
                                               src="path/to/subtitles.vtt"
                                               srclang="en" label="English">
                                           </video>
                                        </div>
                                            
                                        @else
                                        <div style="max-width: 200px; max-height: 300px;
                                        overflow: hidden;">
                                            <img src="{{ asset('storage/' . $data['type']) }}"
                                            class="image-preview img-fluid" alt="">
                                        </div>
                                            
                                        @endif
                                    @endif
                                
                                    <input class="form-control" name="type"
                                     value="{{ old('type', $data->type) }}" id="type" type="file" multiple>
                                </div>

                                <div class="mb-1" id="thumbnail">
                                    <label for="thumbnail" id="wallpaper_thumbnail">Thumbnail</label>
                                    @if ($data->thumbnail)
                                    <div style="max-width: 100px; max-height: 200px;
                                    overflow: hidden;">
                                    <img src="{{asset('storage/'. $data->thumbnail)}}"
                                    class="thumb-preview img-fluid" alt="">
                                    </div>
                                    @else
                                    <img class="thumb-preview img-fluid" alt="">
                                    @endif
                                    <input class="form-control" name="thumbnail"
                                    onchange="previewThumbnail()"
                                    value="{{old('thumbnail',$data->thumbnail)}}"
                                    id="thumbnail" type="file" multiple>
                                </div>

                                <div class="mb-3" id="tags" style="display: block">
                                    <label for="tags">Tags</label>
                                    <br>
                                    <input type="text" class="form-control"
                                     data-role="tagsinput" id="tags"
                                     name="tags" value="{{$data->tags->pluck('name')->implode(',') }}">
                                </div>

                                <div class="mb-1">
                                    <button class="btn btn-gradient-primary float-end" type="submit">Update</button>
                                </div>
                            </div>


                           


                           
                    </div>
                   
                </div>
                        
            </form>
</div>

@endsection

@section('script')
<script>

$(document).ready(function() {
    $('.tags-selector').select2();
});


</script>
@endsection

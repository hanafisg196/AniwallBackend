@extends('_partials.content')
@section('content')


<div class="card">
    <div class="card-header border-bottom p-1">
        <div class="head-label"></div>
        <div class="dt-action-buttons text-end">
            <div class="dt-buttons d-inline-flex">
                <button type="button" class="btn btn-gradient-primary pull-right" data-bs-toggle="modal"
                    data-bs-target="#addModal"><span><i data-feather='plus'></i> Add Wallpaper</span></button>
            </div>
        </div>
    </div>
    <div class="card-body mt-2">
        <div class="row">
            @foreach ($data as $item)
            <div class="col-md-2">
                <div class="card border-0 text-white">
                    
                        
                    <img class="card-img"
                        src="{{asset('storage/'. $item->thumbnail)}}"
                    alt="Card image" height="300">

                    <div class="card-img-overlay bg-overlay">
                        <div class="btn-group">
                            <a type="button" class="btn btn-icon btn-warning waves-effect waves-float waves-light"
                                data-bs-toggle="modal" data-bs-target="#editModal">
                                <span><i data-feather='edit-2'></i></span>
                            </a>
                           
                            <a type="button" class="btn btn-icon btn-danger waves-effect waves-float waves-light"
                                data-bs-toggle="modal" data-bs-target="#deleteModal"
                                data-href="">
                                <span><i data-feather='trash-2'></i></span>
                            </a>
                          
                            <a type="button" href=""
                                class="btn btn-icon btn-primary waves-effect waves-float waves-light">
                                <span><i data-feather='bell'></i></span>
                            </a>
                            @if (pathinfo($item->type, PATHINFO_EXTENSION) == 'mp4')
                            <a type="button" class="btn btn-icon btn-success waves-effect waves-float waves-light">
                                <span><i data-feather='video'></i></span>
                            </a>
                             @endif
                          
                        </div>
                    </div>
                    
                </div>
              
            </div>
            @endforeach
        </div>
    </div>

   
</div>


<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Add Wallpaper</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="auth-login-form mt-2" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">

                        <div class="mb-1" id="wallpaperUrl2" style="display: block">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                placeholder="title">
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="mb-1">
                                        <label for="cat_id">Category</label>
                                        <select name="cat_id" id="cat_id" class="form-control">
                                            @foreach ($category as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                 
                                </div>
                            </div>
                           
                            <div class="mb-1" id="type">
                                <label for="type" id="wallpaper_file_label_id">Wallpaper</label>
                                <input class="form-control" name="type" id="type" type="file" multiple>
                            </div>
                          
                        
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    
                    <button class="btn btn-gradient-primary float-end" type="submit">Submit</button>
                    
                </div>
            </form>
        </div>
    </div>
</div>


{{-- editModal --}}

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Add Wallpaper</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="auth-login-form mt-2" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">

                        <div class="mb-1" id="wallpaperUrl2" style="display: block">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                placeholder="title">
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="mb-1">
                                        <label for="cat_id">Category</label>
                                        <select name="cat_id" id="cat_id" class="form-control">
                                            @foreach ($category as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                 
                                </div>
                            </div>
                           
                            <div class="mb-1" id="type">
                                <label for="type" id="wallpaper_file_label_id">Wallpaper</label>
                                <input class="form-control" name="type" id="type" type="file" multiple>
                            </div>
                          
                        
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    
                    <button class="btn btn-gradient-primary float-end" type="submit">Submit</button>
                    
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


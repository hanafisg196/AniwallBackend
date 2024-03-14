@extends('_partials.content')
@section('content')




<div class="row">
    <div class="col-xl-2 col-md-4 col-sm-6">
        <div class="card text-center">
            <div class="card-body">
                <div class="avatar bg-light-info p-50 mb-1">
                    <div class="avatar-content">
                        <i data-feather="tag"></i>
                    </div>
                </div>
                <h2 class="fw-bolder">{{ $category }}</h2>
                <p class="card-text">Categories</p>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
        <div class="card text-center">
            <div class="card-body">
                <div class="avatar bg-light-warning p-50 mb-1">
                    <div class="avatar-content"><i data-feather="image"></i></div>
                </div>
                <h2 class="fw-bolder">{{ $wallpaper }}</h2>
                <p class="card-text">Wallpaper</p>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
        <div class="card text-center">
            <div class="card-body">
                <div class="avatar bg-light-danger p-50 mb-1">
                    <div class="avatar-content"><i data-feather="sliders"></i></div>
                </div>
                <h2 class="fw-bolder">{{ $slide }}</h2>
                <p class="card-text">Slide</p>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
        <div class="card text-center">
            <div class="card-body">
                <div class="avatar bg-light-primary p-50 mb-1">
                    <div class="avatar-content"><i data-feather="hash"></i></div>
                </div>
                <h2 class="fw-bolder">{{ $tags }}</h2>
                <p class="card-text">Tags</p>
            </div>
        </div>
    </div>
</div>



@endsection

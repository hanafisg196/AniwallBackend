@extends('_partials.content')
@section('content')


<div class="card">
    <div class="card-header border-bottom p-">
        <div class="head-label"></div>
        <div class="dt-action-buttons text-end">
            <div class="dt-buttons d-inline-flex">
                <input type="text" class="form-control" id="search" name="search" placeholder="Search">
                &nbsp;
                <a type="button" class="btn btn-icon btn-primary waves-effect waves-float waves-light">
                    <span><i data-feather='search'></i></span>
                </a>
            </div>
        </div>
    </div>
    <div class="card-body mt-2">
        <div class="row">
            @include('_partials.alert')
            @foreach ($data as $item)
            <div class="col-md-2">
                <div class="card border-0 text-white">
 
                    <img class="card-img"
                    src="{{asset('storage/'. $item->thumbnail)}}"
                    alt="Card" height="300">

                    <div class="card-img-overlay bg-overlay">
                        <div class="btn-group">
                     <form action="/review/accept/{{ $item->id }}" method="post">
                                @csrf
                        <button type="submit" class="btn btn-icon
                            btn-warning
                            waves-effect waves-float waves-light"
                            data-bs-toggle="tooltip"
                             data-bs-placement="top">
                            <span>
                            <i data-feather='check-circle'></i>
                            </span>
                        </button>
                      </form>
                      <form action="/review/delete/{{ $item->id }}" method="post">
                            @csrf
                        <button type="submit" class="btn btn-icon btn-danger
                                waves-effect waves-float waves-light"
                                data-bs-toggle="tooltip"
                                 data-bs-placement="top">
                            <span><i data-feather='trash-2'></i></span>
                        </button>
                           </form>
                          
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
    <div class="card-footer">
        {{ $data->links() }}
    </div>
</div>
@endsection
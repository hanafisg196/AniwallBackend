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
</div>
@endsection


@extends('_partials.content')
@section('content')

<div class="card">
    <div class="card-header border-bottom p-1">
        <div class="head-label"></div>
        <div class="dt-action-buttons text-end">
            <div class="dt-buttons d-inline-flex">
                <button type="button"
                class="btn btn-gradient-primary pull-right"
                data-bs-toggle="modal"
                data-bs-target="#addModal"><span><i
                data-feather='plus'></i> Add Tag</span></button>
            </div>
        </div>
    </div>

    <div class="card-body mt-2">
        <div class="row">
           
                <div class="col-md-2">
                    <div class="card border-0 text-white">
                        <div class="tags_card"></div>
                        <div class="card-img-overlay">
                            <h4 class="card-title text-white"></h4>
                            <div class="btn-group">
                            
                                    <a type="button" class="btn btn-icon btn-danger
                                     waves-effect waves-float waves-light"
                                       data-bs-toggle="tooltip"
                                       data-bs-placement="top"
                                       title="Disable On Demo"
                                       href="#">
                                        <span><i data-feather='trash-2'></i></span>
                                    </a>
                             
                            </div>
                        </div>
                    </div>
                </div>
           
        </div>
    </div>

    <div class="card-footer">
       
    </div>
</div>

<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Add Tags</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="auth-login-form mt-2" action="/tags/insert" method="post"
                  enctype="multipart/form-data">
               @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-1">
                                <label for="tags">Tags</label>
                                <input class="form-control" name="tags" type="text" id="tags">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                   
                        <button type="button"
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="Disable On Demo"
                                class="btn btn-gradient-primary float-end">Submit</button>
                   
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@extends('_partials.content')
@section('content')
    <div class="card">
        <div class="card-header border-bottom p-1">
            <div class="head-label"></div>
            <div class="dt-action-buttons text-end">
            </div>
        </div>

        <div class="card-body mt-2">
            <div class="row">

                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Tags</th>
                                <th scope="col">Item</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        @foreach ($tags as $item)
                            <tbody>
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>0</td>
                                    <td>
                                        <a href="" class="btn btn-danger btn-sm">
                                            <span><i data-feather='trash-2'></i></span>
                                        </a>
                                    </td>
                                </tr>

                            </tbody>
                        @endforeach
                    </table>

                </div>

            </div>
        </div>

        <div class="card-footer">
            {{ $tags->links() }}
        </div>
    </div>

    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalTitle">Add Tags</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="auth-login-form mt-2" action="/tags/insert" method="post" enctype="multipart/form-data">
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

                        <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Disable On Demo"
                            class="btn btn-gradient-primary float-end">
                            Submit
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

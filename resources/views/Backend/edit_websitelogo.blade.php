@extends('Backend.master')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Edit Website Logo</h4>
            <div class="col-xl-12">
                <!-- File input -->
                <form action="/admin/websitelogo-edit/submit" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <h5 class="card-header">Thumbnail</h5>
                        <div class="card-body">
                            <img src="../../uploads/{{$websitelogo->thumbnail}}" width="150px">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Recommend image size x pixels.</label>
                                <input type="hidden" name="id" value="{{$websitelogo->id}}">
                                <input class="form-control" type="file" name="thumbnail" />
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="btn btn-primary" name="btn_add" value="Add Post">
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

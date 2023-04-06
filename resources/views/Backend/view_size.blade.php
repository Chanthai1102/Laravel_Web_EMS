@extends('Backend.master')
@section('content')

    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-10">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Size</h4>
            </div>
            <div class="col-2">
                <a href="/admin/size-add" class="btn btn-primary" style="margin-bottom: -20px">Add Size</a>
            </div>
        </div>
        <!-- Striped Rows -->
        <div class="card">
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Create At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <tbody class="table-border-bottom-0">
                    @foreach ($size as $item)
                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                <p>{{$item->name}}</p>
                            </td>
                            <td>
                                {{$item->created_at}}
                            </td>
                            <td>
                                <a href="/admin/size-edit/{{$item->id}}" class="btn btn-success">Edit</a>
                                <a href="/admin/category-remove/{{$item->id}}" class="btn btn-danger">Remove</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Striped Rows -->
        <hr class="my-5" />
    </div>

@endsection

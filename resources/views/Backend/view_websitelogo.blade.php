@extends('Backend.master')
@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4>

        <!-- Striped Rows -->
        <div class="card">
            <h5 class="card-header">Striped rows</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Thumbnail</th>
                        <th>Create At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <tbody class="table-border-bottom-0">
                        @foreach ($website_logo as $item)
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <img src="../uploads/{{$item->thumbnail}}" width="170px">
                                </td>
                                <td>
                                    {{$item->created_at}}
                                </td>
                                <td>
                                    <a href="/admin/websitelogo-edit/{{$item->id}}" class="btn btn-success">Edit</a>
                                    <a href="/admin/websitelogo-remove/{{$item->id}}" class="btn btn-danger">Remove</a>
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
    <!-- / Content -->
@endsection

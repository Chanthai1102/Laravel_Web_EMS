@extends('Backend.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Products List</h4>

            <!-- Striped Rows -->
            <div class="card">
                {{-- <h5 class="card-header">Striped rows</h5> --}}
                <div class="table-responsive text-nowrap">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Regular Price</th>
                            <th>Sale Price</th>
                            <th>Category</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Viewer</th>
                            <th>Thumbnail</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @foreach ($products as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->regular_price}}$</td>
                                <td>{{$item->sale_price}}$</td>
                                <td>{{$item->cate_name}}</td>
                                <td>
                                    @foreach($item->colors as $color)
                                        <span class="badge" style="background-color: {{$color->color}}">
                                        {{$color->name}}
                                        </span>
                                    @endforeach
                                </td>
                                <td></td>
                                <td>{{$item->viewer}}</td>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <img src="../uploads/{{$item->thumbnail}}" width="80px">
                                </td>
                                <td>
                                    {{$item->created_at}}
                                </td>
                                <td>
                                    <a href="/admin/websitelogo-edit/{{$item->id}}" class="btn btn-success">Edit</a>
                                    <a href="" class="btn btn-danger">Remove</a>
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
    </div>
    </div>
@endsection

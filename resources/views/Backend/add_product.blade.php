@extends('Backend.master')
@section('content')

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Add Products</h4>
            <div class="col-xl-12">
                <!-- File input -->
                <form action="/admin/product/submit" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <h5 class="card-header">Products</h5>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Name</label>
                                <input class="form-control" type="text" name="name" />
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Regular Price</label>
                                <input class="form-control" type="number" name="regular_price" />
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Sale Price</label>
                                <input class="form-control" type="number" name="sale_price" />
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Category</label>
                                <select name="category" class="form-control">
                                    @foreach ($category as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Color Available</label>
                                <select name="color[]" class="color form-control" multiple>
                                    @foreach ($color as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Size Available</label>
                                <select name="size[]" class="color form-control" multiple>
                                    @foreach ($size as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Description</label>
                                <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Recommend image size x pixels.</label>
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

@extends('Layout.app')
    @section('content')
        <div class="container mt-5">
            <br>
            <br>
            <div class="row justify-content-center">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            update men shoe
                            <span><a href="{{route('adminDashboard')}}" class="btn btn-primary btn-sm float-end">DASHBOARD</a></span>
                            <span><a href="{{route('showWomenShoes')}}" class="btn btn-primary btn-sm float-end mr-3">VIEW</a></span>
                        </div>
                        <div class="card-body">
                            <form action="{{route('updateWomenShoes', $women_shoes->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="categoryName">Category Name</label>
                                            <select name="categoryName" id="category_name" class="form-select">
                                                <option value="women officials">men shoes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="productName">Product Name</label>
                                            <input type="text" name="productName" id="product_name" class="form-control" value="{{$women_shoes->productName}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="productImage">Product Image</label>
                                            <input type="file" name="productImage" id="product_image" class="form-control-file" value="{{$women_shoes->productImage}}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="productPrice">Product Price</label>
                                            <input type="text" name="productPrice" id="product_price" class="form-control" value="{{$women_shoes->productPrice}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="productSize">Product Size</label>
                                    <select name="productSize" id="product_size" class="form-control form-select">
                                        <option value="{{$women_shoes->productSize}}">{{$women_shoes->productSize}}</option>
                                        <option value="large">large</option>
                                        <option value="medium">medium</option>
                                        <option value="small">small</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="productDescription">Product Description</label>
                                    <textarea name="productDescription" id="product_description" cols="30" rows="5" class="form-control">{{$women_shoes->productDescription}}</textarea>
                                </div>

                                <div class="form-group text-center">
                                    <input type="submit" name="submit" value="Update" class="btn btn-primary btn-sm mr-5">
                                    <span><input type="reset" name="reset" value="reset" class="btn btn-secondary btn-sm"></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
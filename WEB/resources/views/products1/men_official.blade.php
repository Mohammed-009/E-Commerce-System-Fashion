@extends('Layout.app')
    @section('content')
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-sm-12">
                    <div class="card mt-5">
                        <div class="card-header">
                            create product
                            <span><a href="{{route('adminDashboard')}}" class="btn btn-primary btn-sm float-end">DASHBOARD</a></span>
                            <span><a href="{{route('showMenOfficial')}}" class="btn btn-primary btn-sm float-end mr-3">VIEW</a></span>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('storeMenOfficial')}}"  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="categoryName">Category Name</label>
                                            <select name="categoryName" id="category_name" class="form-control form-select">
                                                <option value="men_officials">men officials</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="productName">ProductName</label>
                                            <input type="text" name="productName" id="product_name" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="productImage" class="pt-2">Product Image</label>
                                            <input type="file" name="productImage" id="product_image" class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="productPrice" class="pt-2">Product Price</label>
                                            <input type="text" name="productPrice" id="product_price" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="productSize" class="pt-2">Product Size</label>
                                    <select name="productSize" id="product_size" class="form-control form-select">
                                        <option value="">---select---</option>
                                        <option value="large">large</option>
                                        <option value="medium">medium</option>
                                        <option value="small">small</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="productDescription" class="pt-2">Product Description</label>
                                    <textarea name="productDescription" id="product_description" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                                
                                <div class="form-group text-center mt-3">
                                    <input type="submit" name="submit" value="Add" class="btn btn-primary btn-sm mr-5">
                                    <span><input type="reset" name="reset" value="reset" class="btn btn-secondary btn-sm"></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
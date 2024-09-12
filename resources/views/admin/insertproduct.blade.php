@extends('layouts.admin_main')


@section('main-section')
@if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif
<div class="container">
    <a href="/admin/products" class="btn btn-primary">Product List</a>
    <h4 class="text-center">New Product</h4>
    <form action="/admin/insertproduct" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type="text" name="pr_name" id="" placeholder="Product Name" class="form-control">
        </div>
        <div class="form-group my-3">
            <input type="text" name="pr_desc" id="" placeholder="Product Description" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" name="pr_price" id="" placeholder="Product Price" class="form-control">
        </div>
        <div class="form-group my-3">
            <input type="file" name="image" id="" placeholder="Product Image" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Insert</button>
        </div>
    </form>
</div>
@endsection

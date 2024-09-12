@extends('layouts.admin_main')

@section('main-section')
    <a href="/admin/insertproduct" class="btn btn-primary">New Product</a>
    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Desc</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Product Image</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $p)
                <tr>
                    <td>{{$p->id}}</td>
                    <td>{{$p->product_name}}</td>
                    <td>{{$p->product_desc}}</td>
                    <td>{{$p->product_price}}</td>
                    <td><img src="{{asset('uploads/product/'.$p->product_image)}}" height="100" alt=""></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

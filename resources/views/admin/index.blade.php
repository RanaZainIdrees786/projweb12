@extends('admin.master')
@section('content')
    <div class="container-fluid ">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex w-100 ">
                            <h5 class="card-title">View by page title and screen class</h5>
                            <a href="{{route('admin-product-create-form')}}" class="btn btn-dark ms-auto">Add Product</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table text-nowrap align-middle mb-0">
                                <thead>
                                    <tr class="border-2 border-bottom border-primary border-0">
                                        <th scope="col" class="ps-0">Id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Image</th>
                                        <th scope="col" class="text-center">Price</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @foreach ($products as $product)
                                        <tr>
                                            <th scope="row" class="ps-0 fw-medium">
                                                <span class="table-link1 text-truncate d-block">{{ $product->id }}</span>
                                            </th>
                                            <td>
                                                <a href="javascript:void(0)"
                                                    class="link-primary text-dark fw-medium d-block">{{ $product->name }}</a>
                                            </td>
                                            <td><img style='width: 70px;' src="{{asset('products/'.$product->image)}}" alt=""></td>
                                            <td class="text-center fw-medium">{{ $product->price }}</td>
                                            <td class="text-center fw-medium">
                                                <a href="" class='btn btn-success'>Edit</a>
                                                <a href="{{ route('admin-product-delete', $product->id) }}"
                                                    class='btn btn-danger'>Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

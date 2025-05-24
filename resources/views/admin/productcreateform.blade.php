@extends('admin.master')

@section('content')
    <div class="container-fluid ">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="mb-4">Add New Product</h2>
                <form method="POST" action="{{route("admin-create-product")}}" enctype="multipart/form-data">
                    <!-- CSRF Token (Laravel specific) -->
                    @csrf

                    <!-- Product Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <!-- Price -->
                    <div class="mb-3">
                        <label for="price" class="form-label">Price ($)</label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" required>
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>

                    <!-- Image Upload -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Product Image</label>
                        <input class="form-control" type="file" id="image" name="image" accept="image/*" >
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Save Product</button>
                </form>
            </div>
        </div>
    </div>
@endsection

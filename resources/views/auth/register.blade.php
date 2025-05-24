<!-- resources/views/auth/register.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <!-- Bootstrap CSS (Optional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5" style="max-width: 500px;">
    <h2 class="mb-4">Register</h2>

    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Registration Form -->
    <form method="POST" action="{{route("register")}}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input
                type="text"
                class="form-control"
                id="name"
                name="name"
                value="{{ old('name') }}"
                required
            >
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input
                type="email"
                class="form-control"
                id="email"
                name="email"
                value="{{ old('email') }}"
                required
            >
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input
                type="password"
                class="form-control"
                id="password"
                name="password"
                required
            >
        </div>
            <div class="mb-3">
            <label for="password" class="form-label">Contact</label>
            <input
                type="text"
                class="form-control"
                id="contact_number"
                name="contact_number"
                required
            >
        </div>


        <button type="submit" class="btn btn-success w-100">Register</button>
    </form>
</div>
</body>
</html>

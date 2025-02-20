<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Menu</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('welcome') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('createMenu') }}">Create</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Register</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                        </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="p-5">
        <h1 class="text-center">Edit Menu</h1>
        <form action="{{ route('updateMenu', $menu->id) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('patch')

            <div class="mb-3">
                <label for="" class="form-label">Menu Name</label>
                <input value="{{ $menu->menuName }}" type="text" class="form-control" id="" name="menuname">
            </div>

            @error('menuname')
            <div class="alert alert-danger" role="alert"> {{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="" class="form-label">Menu Description</label>
                <input value="{{ $menu->menuDesc }}" type="text" class="form-control" id="" name="menudesc">
            </div>

            @error('menudesc')
            <div class="alert alert-danger" role="alert"> {{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="" class="form-label">Menu Date Added</label>
                <input value="{{ $menu->menuDateAdded }}"type="date" class="form-control" id="" name="menudate">
            </div>

            @error('menudate')
            <div class="alert alert-danger" role="alert"> {{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="" class="form-label">Price</label>
                <input value="{{ $menu->menuPrice }}" type="number" class="form-control" id="" name="menuprice">
            </div>

            @error('menuprice')
            <div class="alert alert-danger" role="alert"> {{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="" class="form-label">Image</label>
                @if ($menu->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/images/' . $menu->image) }}" alt="Menu image" style="max-width: 150px; height: auto; border: 1px solid #ccc; padding: 5px;">
                </div>
                @else
                    <p>No image uploaded yet.</p>
                @endif

                <!-- Input file -->
                <input type="file" class="form-control" id="" name="image">
            </div>
            {{-- <div class="mb-3">
                <label for="" class="form-label">Menu Category</label>
                <select class="form-select" aria-label="Default select example" name="categoryname">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div> --}}

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

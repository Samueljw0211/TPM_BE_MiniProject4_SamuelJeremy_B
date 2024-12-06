<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>View Menus data</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
    <a class="navbar-brand" href="#">Menus Data</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="/create">Create</a>
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


    <h1 class="text-center">View Menu</h1>

    <div class="d-flex justify-content-center align-items-center" style="height: 20vh;">
    <a href="{{ route('createMenu') }}">
        <button class="btn btn-success">Create</button>
    </a>
    </div>

    <div class="container">  <div class="row row-cols-md-4">  @foreach ($menus as $menu)
        <div class="col mb-3">  <div class="card" style="width: 18rem;">
            <img src="{{ asset('/storage/images/'.$menu->image) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Menu Name: {{$menu->menuName}}</h5>
                <p class="card-text">Menu Description: {{$menu->menuDesc}}</p>
                <p class="card-text">Menu Date Added: {{$menu->menuDateAdded}}</p>
                <p class="card-text">Menu Price: ${{$menu->menuPrice}}</p>
                <p class="card-text">Menu Category: {{$menu->category->category_name}}</p>
                <a href="{{ route('editMenu', $menu->id) }}" class="btn btn-success">Edit</a>
                <form action="{{ route('deleteMenu', $menu->id )}}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>

            </div>
        </div>
        </div>
    @endforeach
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.utility.min.js" integrity="sha384-TCYTfyu1iUZGCVnROojhHhnvd3y3HsC8JA99mznrXn4csJ8hIMsDQiEOwNbhON2Q" crossorigin="anonymous"></script>
</body>
</html>

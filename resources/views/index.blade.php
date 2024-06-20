<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Website</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom styles for dark theme */
        body {
            background-color: #222;
            color: #fff;
        }
        /* Add more custom styles as needed */
    </style>
</head>
<body>

    @extends('layouts.header')

    @section('content')
    <div class="container">
        <h1>Resume Website</h1>
        <div class="row">
            @foreach($resumes as $resume)
            <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-body" style="color: #222;">
                <h5 class="card-title">{{ $resume->resume_title }}</h5>
                <p class="card-text">User: <a href="{{ route('resume.site', $resume->id) }}">{{ $resume->name }}</a></p>
                </div>
            </div>
            </div>
            @endforeach

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
</body>
</html>

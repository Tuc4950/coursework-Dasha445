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
    <div class="row justify-content-center d-flex flex-column">
        @foreach($resume as $resume)
        <h1>Resume by {{ $resume->name }}</h1>
        <div class="card mb-3">
            <div class="card-body" style="color: #222;">
                <h5 class="card-title">{{ $resume->resume_title }}</h5>
                <p class="card-text">Name: {{ $resume->name }}</p>
                <p class="card-text">Surname: {{ $resume->surname }}</p>
                <p class="card-text">Patronymic: {{ $resume->patronymic }}</p>
                <p class="card-text">Email: {{ $resume->email }}</p>
                <p class="card-text">Phone: {{ $resume->phone }}</p>
                <p class="card-text">Summary: {{ $resume->summary }}</p>
                <p class="card-text">Experience: {{ $resume->experience }}</p>
                <p class="card-text">Education: {{ $resume->education }}</p>
                <p class="card-text">Skills: {{ $resume->skills }}</p>

                @auth
                <form action="{{ route('resume.like', $resume->id) }}" method="POST" style="display: flex;">
                    @csrf
                    <button type="submit" style="background: none; border: none; padding: 0; color: #337ab7; text-decoration: underline; cursor: pointer; display:flex; align-items:center; gap:10px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                            <h5 style="color: #222;">{{ $resume->likes()->count() }}</h5>
                        </svg>
                    </button>
                </form>
                @else
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                    <h5 style="color: #222;">{{ $resume->likes()->count() }}</h5>
                </svg>
                @endauth
            </div>
            @auth
                <div class="card mt-3">
                    <div class="card-body">
                        <form action="{{ route('resume.comment', $resume->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="comment">Add Comment</label>
                                <textarea class="form-control" id="comment" name="body" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Comment</button>
                        </form>
                    </div>
                </div>
            @endauth

            @foreach($resume->comments as $comment)
                <div class="card mt-3">
                    <div class="card-body">
                        <p class="card-text" style="color: #222;">User: <a href="{{ route('resume.site', $comment->user->id) }}">{{ $comment->user->name }}</a></p>
                        <p style="color: #222;">{{ $comment->body }}</p>
                    </div>
                </div>
            @endforeach
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

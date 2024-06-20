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
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark text-white">
                <div class="card-header">{{ __('Create Resume') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('resume.create') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="resume[name]" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control" name="resume[surname]" value="{{ old('surname') }}" required autocomplete="surname">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="patronymic" class="col-md-4 col-form-label text-md-right">{{ __('Patronymic') }}</label>

                            <div class="col-md-6">
                                <input id="patronymic" type="text" class="form-control" name="resume[patronymic]" value="{{ old('patronymic') }}" autocomplete="patronymic">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="resume_title" class="col-md-4 col-form-label text-md-right">{{ __('Resume Title') }}</label>

                            <div class="col-md-6">
                                <input id="resume_title" type="text" class="form-control" name="resume[resume_title]" value="{{ old('resume_title') }}" required autocomplete="resume_title">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="resume[email]" value="{{ old('email') }}" required autocomplete="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="resume[phone]" value="{{ old('phone') }}" autocomplete="phone">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="summary" class="col-md-4 col-form-label text-md-right">{{ __('Summary') }}</label>

                            <div class="col-md-6">
                                <textarea id="summary" class="form-control" name="resume[summary]">{{ old('summary') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="experience" class="col-md-4 col-form-label text-md-right">{{ __('Experience') }}</label>

                            <div class="col-md-6">
                                <textarea id="experience" class="form-control" name="resume[experience]">{{ old('experience') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="education" class="col-md-4 col-form-label text-md-right">{{ __('Education') }}</label>

                            <div class="col-md-6">
                                <textarea id="education" class="form-control" name="resume[education]">{{ old('education') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="skills" class="col-md-4 col-form-label text-md-right">{{ __('Skills') }}</label>

                            <div class="col-md-6">
                                <textarea id="skills" class="form-control" name="resume[skills]">{{ old('skills') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

@if($errors->any())
    <h3>Errors occurred while creating the resume:</h3>
    <ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
@endif

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection

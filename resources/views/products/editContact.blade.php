@extends('layout')

@section('pagecontent')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>

        body {
            background-color: #b0c4de; /* Light Steel Blue */
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
        }

        .navbar {
            background-color: #6f42c1;
        }

        .form-section {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 2rem;
        }

        .form-card {
            background-color: #2d2d2d;
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 0 25px rgba(111, 66, 193, 0.6);
            width: 100%;
            max-width: 550px;
        }

        .form-label {
            color: #d4c0f9;
            font-weight: 500;
        }

        .form-control {
            background-color: #1f1f1f;
            color: #ffffff;
            border: 1px solid #444;
        }

        .form-control:focus {
            background-color: #1f1f1f;
            color: #ffffff;
            border-color: #6f42c1;
            box-shadow: 0 0 0 0.2rem rgba(111, 66, 193, 0.25);
        }

        .btn-primary {
            background-color: #6f42c1;
            border-color: #6f42c1;
        }

        .btn-primary:hover {
            background-color: #5a35a0;
            border-color: #5a35a0;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <form method="POST" action="{{ route('contact.edit', ['Contact' => $contact->id]) }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" class="form-control" value="{{ $contact->email }}" required>
        </div>

        <div class="mb-3">
            <label for="subject" class="form-label">Subject</label>
            <textarea name="subject" class="form-control" rows="3" required>{{ $contact->subject }}</textarea>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <input type="text" name="message" class="form-control" value="{{ $contact->message }}" required>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary px-4 py-2">Submit Changes</button>
        </div>
    </form>

@extends('layout')
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Contacts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #ffdde1, #b5aad7, #cbaacb);
            background-size: 400% 400%;
            animation: bgShift 15s ease infinite;
            font-family: 'Segoe UI', sans-serif;
        }

        @keyframes bgShift {
            0% { background-position: 0 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0 50%; }
        }

        .card {
            background: white;
            border: none;
            border-left: 5px solid #9b59b6;
            border-radius: 16px;
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }

        .card-title {
            color: #6a0572;
            font-weight: bold;
        }

        .card-subtitle {
            color: #7f8c8d;
        }

        .card-text strong {
            color: #a93279;
        }

        h1 {
            color: #8e44ad;
        }
    </style>
</head>
<body>
@yield("pagecontent")
<div class="container py-5">
    <h1 class="mb-4 text-center">📇 Contact List</h1>

    @if($AllContact->isEmpty())
        <div class="alert alert-warning text-center">
            No contacts found.
        </div>
    @else
        <div class="row">
            @foreach($AllContact as $Contact)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Contact #{{ $Contact->id }}</h5>
                            <h6 class="card-subtitle mb-3">📧 {{ $Contact->email }}</h6>

                            {{-- Uncomment and add more fields if needed --}}
                            {{-- <p class="card-text"><strong>Name:</strong> {{ $Contact->name }}</p> --}}
                            {{-- <p class="card-text"><strong>Message:</strong> {{ $Contact->message }}</p> --}}

                            <div class="d-flex justify-content-between mt-auto pt-3">
                                <a href="{{ route('contact.delete', ['Contact' => $Contact->id]) }}" class="btn btn-danger btn-sm">Obriši</a>
                                <a href="{{ route('contact.edit', ['Contact' => $Contact->id]) }}" class="btn btn-primary btn-sm">Edituj</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

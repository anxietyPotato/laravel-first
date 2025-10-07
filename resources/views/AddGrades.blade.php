@extends('layout')



@section('pagecontent')
    <div class="container py-5">

        {{-- Form Container --}}
        <div class="form-container mx-auto mt-4">
            <h2 class="form-title">Add New Grade</h2>

            @if(session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger text-center">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="/admin/Add-Grades" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="Class" class="form-label">Class Name</label>
                    <input type="text" class="form-control" id="Class" name="Class" required>
                </div>

                <div class="mb-3">
                    <label for="Profesor" class="form-label">Professor's Name</label>
                    <input type="text" class="form-control" id="Profesor" name="Profesor" required>
                </div>

                <div class="mb-3">
                    <label for="Grade" class="form-label">Grade</label>
                    <input type="number" class="form-control" id="Grade" name="Grade" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-submit px-5">Add Grade</button>
                </div>
            </form>
        </div>
    </div>

    <style>
        body {
            background: #111; /* dark black background */
            color: #eee;
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-container {
            background: linear-gradient(145deg, #1c1c1c, #222);
            padding: 35px;
            border-radius: 25px;
            max-width: 550px;
            width: 100%;
            box-shadow: 0 10px 30px rgba(0,0,0,0.8), inset 0 0 10px rgba(231, 76, 60, 0.2);
            border-left: 6px solid #e74c3c; /* red accent */
            transition: transform 0.2s ease;
        }

        .form-container:hover {
            transform: translateY(-5px);
        }

        .form-title {
            font-weight: bold;
            color: #e74c3c; /* red */
            text-align: center;
            margin-bottom: 30px;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.6);
        }

        label {
            font-weight: 500;
            color: #1abc9c; /* turquoise */
        }

        .form-control {
            background: #222;
            color: #eee;
            border: 1px solid #e74c3c;
            border-radius: 8px;
        }

        .form-control:focus {
            border-color: #1abc9c; /* turquoise focus */
            box-shadow: 0 0 0 0.2rem rgba(26, 188, 156, 0.3);
            background: #222;
            color: #fff;
        }

        .btn-submit {
            background-color: #e74c3c; /* red */
            color: #111;
            font-weight: bold;
            box-shadow: 0 4px 10px rgba(231, 76, 60, 0.5);
            border: none;
            border-radius: 10px;
        }

        .btn-submit:hover {
            background-color: #c0392b;
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(231, 76, 60, 0.6);
        }
    </style>
@endsection

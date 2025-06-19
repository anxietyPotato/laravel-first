<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #2980b9, #8e44ad, #27ae60);
            background-size: 200% 200%;
            animation: gradientMove 15s ease infinite;
            font-family: 'Segoe UI', sans-serif;
        }

        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .form-container {
            background: #ffffffdd;
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 20px;
            max-width: 550px;
            width: 100%;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .form-title {
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 25px;
            text-align: center;
        }

        label {
            font-weight: 500;
            color: #34495e;
        }

        .form-control:focus {
            border-color: #2ecc71;
            box-shadow: 0 0 0 0.2rem rgba(46, 204, 113, 0.25);
        }

        .btn-primary {
            background-color: #2ecc71;
            border: none;
        }

        .btn-primary:hover {
            background-color: #27ae60;
        }
    </style>
</head>
<body>

<div class="form-container">


    <h2 class="form-title">Add New Grade</h2>

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif


    <form action="/admin/Add-Grades" method="POST">
        @csrf

        @if($errors->any())
            <p class="text-danger">Mistake: {{ $errors->first() }}</p>
        @endif

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
            <button type="submit" class="btn btn-primary px-5">Add Grade</button>
        </div>
    </form>


 </div>

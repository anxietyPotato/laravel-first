<!DOCTYPE html>
<html lang="en">
<head>
    @extends('layout')
    <meta charset="UTF-8">
    <title>Grades</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #ffdde1, #ee9ca7, #cbaacb, #b5aad7);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
        }

        @keyframes gradientShift {
            0% {background-position: 0% 50%;}
            50% {background-position: 100% 50%;}
            100% {background-position: 0% 50%;}
        }

        .container {
            max-width: 700px;
            margin: 50px auto;
            padding: 20px;
        }

        .grade-card {
            background: white;
            border-left: 6px solid #a83279;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            color: #333;
        }

        .grade-card h3 {
            margin: 0;
            font-size: 1.3rem;
            color: #6a0572;
        }

        .grade-card p {
            margin: 5px 0;
            font-weight: 500;
        }

        .grade-value {
            font-size: 1.2rem;
            font-weight: bold;
            color: #c0392b;
        }
    </style>
</head>
<body>

<div class="container">
    @foreach($grades as $grade)
        <div class="grade-card">
            <h3>{{ $grade->Class }}</h3>
            <p>Professor: {{ $grade->Profesor }}</p>
            <p class="grade-value">Grade: {{ $grade->Grade }}</p>
        </div>
    @endforeach
</div>

</body>
</html>





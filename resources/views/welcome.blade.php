@extends('layout')



@section('pagecontent')
    <h2 class="text-center mb-4">📚 Student Grades</h2>

    @foreach($grades as $grade)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="text-primary">{{ $grade->Class }}</h5>
                <p>Professor: {{ $grade->Profesor }}</p>
                <p class="fw-bold text-danger">Grade: {{ $grade->Grade }}</p>
            </div>
        </div>
    @endforeach
@endsection




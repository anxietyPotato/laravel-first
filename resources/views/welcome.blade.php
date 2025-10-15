@extends('layout')

@section('pagecontent')
    @if(session('success'))
        <div class="alert alert-success text-center fw-bold">
            {{ session('success') }}
        </div>
    @endif

    <div class="container-fluid py-5 bg-black text-light min-vh-100">

        <!-- Header -->
        <div class="text-center mb-5">
            <h2 class="fw-bold display-6 text-danger">
                🎓  Grades
            </h2>
            <p class="text-secondary">Track and celebrate student performance across all classes.</p>
        </div>

        <!-- Grade Cards -->
        <div class="container">
            <div class="row g-4 justify-content-center">
                @foreach($grades as $grade)
                    <div class="col-md-6 col-lg-4">
                        <!-- Card with vibrant red-green contrast -->
                        <div class="card h-100 bg-success bg-opacity-25 border-danger border-3 text-light shadow-lg">
                            <div class="card-body text-center p-4">
                                <h5 class="card-title text-uppercase fw-bold text-success mb-3">
                                    {{ $grade->Class }}
                                </h5>

                                <p class="text-light mb-2">
                                    <i class="bi bi-person-fill text-danger"></i>
                                    <strong>Professor:</strong> {{ $grade->Profesor }}
                                </p>

                                <p class="fs-4 fw-bold text-danger mb-0">
                                    Grade: {{ $grade->Grade }}
                                </p>
                            </div>


                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection

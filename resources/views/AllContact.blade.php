@extends('layout')



@section('pagecontent')
    <h2 class="text-center mb-4">📇 Contact List</h2>

    @if($AllContact->isEmpty())
        <div class="alert alert-warning text-center">No contacts found.</div>
    @else
        <div class="row">
            @foreach($AllContact as $Contact)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5>Contact #{{ $Contact->id }}</h5>
                            <p>📧 {{ $Contact->email }}</p>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('contact.delete', ['Contact' => $Contact->id]) }}" class="btn btn-danger btn-sm">Delete</a>
                                <a href="{{ route('contact.edit', ['Contact' => $Contact->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection

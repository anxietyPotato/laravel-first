
@foreach($grades as $grade)
    <p>{{$grade->Class}}
    {{$grade->Profesor}}: {{$grade->Grade}}</p>

@endforeach

@extends('layouts.main')
@section('content2')

<div class="container bg-light d-flex justify-content-center gap-5 my-5 w-75">
    <h1 class="text-center">Students list:</h1>
    <a href="/" class="my-auto"><button class="btn btn-outline-dark">Home Page</button></a>
</div>
<div class="container w-75 bg-light p-4 text-center">

    @foreach($data as $student)
    <div class="row bg-white border rounded p-4 my-3">
        <div class="col-4">
            <div class="bg-light text-secondary d-flex align-items-center justify-content-center">{{$student['picture']}}</div>
        </div>
        <div class="col-4 text-start">
            <h5>Student: {{$student['name']}} {{$student['surname']}}</h5>
            <p>Age: {{$student['age']}}</p>
        </div>
        <div class="col-4 text-start">
            <h5>{{$student['phone']}}</h5>
            <p class="text-warning">{{$student['email']}}</p>
        </div>
    </div>
    @endforeach
</div>
@stop
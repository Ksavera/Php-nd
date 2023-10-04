@extends('layouts.main')
@section('content')
<div class="container bg-light d-flex justify-content-center gap-5 my-5 w-75">
    <h2 class="text-secondary-emphasis text-center m-0">Home page</h2>
    <a href="/students" class="my-auto"><button class="btn btn-outline-dark">Students</button></a>
</div>
<div class="container w-75 bg-light p-4 text-center">
    <div>
        <h2 class="text-secondary-emphasis text-center m-0">Explore The Schedule</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam sequi obcaecati at officiis perspiciatis cupiditate voluptate est in ullam fuga.</p>
    </div>

    @for ($i=0; $i<3; $i++) <section class="bg-white border rounded row p-4 my-3">
        <div class="col-2">
            <h5 class="rounded-circle h-100 w-100 bg-light  text-secondary d-flex align-items-center justify-content-center">{{$logo}}</h5>
        </div>
        <div class="col-5 text-start">
            <h5>{{$title}}</h5>
            <p>{{$description}}</p>
        </div>
        <div class="col-5 text-start">
            <h5>{{$time}}</h5>
            <p class="text-warning">{{$author}}</p>
        </div>
        </section>
        @endfor

</div>
@stop
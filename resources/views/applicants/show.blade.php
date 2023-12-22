@extends('layout.admin.main')

@section 
<div class="container mt-5">
<div class="row">
    <div class="col-md-8 mt-5">
<h2>{{listing->title}}</h2>
        </div>
        @foreach($listing->users as $user)
        <div class="card mt-5">
<div class="row g-0">

    <div class="col-aut">
        @if($user->profile_pic)
        <img src="{{Storage::url($user->profile_pic)}}" class="round-circle" alt="profile picture"
        style="width: 150px;">
        @else 
        <img src="https://placeholder.co/400" class="round-circle" alt="profile picture"
        style="width: 150px;">
        @endif
    </div>
     <div class="col-auto">
        <div class="carrd-body">
            <p class="fw-bold">{{$user->name}}</p>
            <p class="card-text">{{$user->email}}</p>
            <p class="card-text">{{$user->pivot->created_at}}</p>
        </div>
    </div>
     <div class="col-auto align-self-center">
        <a href="" class="btn btn-primary">Download Resume</a>
        
    </div>
</div>

        </div>
        Name: {{$user->name}}
        E-mail: {$user->email}
        <p></p>
        <a href="{{Storage::url($user->resume)}}" target="_blank">Download Resume</a>

        @endforreach
        
        </div>
</div>

@endsection
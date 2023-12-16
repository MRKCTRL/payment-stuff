@extends('layout.app')

@section('content') 

<div class="container" mt-5> 
<div class="row">
<div class="col-md-6">
    <h2>looking for a job</h2>
    <h4>Please Create an account</h4>
    {{-- alternative is  --}}
    {{-- "{{asset(images/'register.png')}}"" --}}
    <img src="images/register.png" alt="register picture">
</div>


<div class="col-md-6">
    <div class="card">
        <div class-header>register</div>
        <form action="{{route('store.seeker')}}" method="post"@csrf
        <div class="card-body">
            <div class="form-group">
                <label for="">Full name</label>
                <input type="text" name="name" class="form-control">
                @if($errors->has('name'))
                <span class="text-danger">{{$error->first('name')}}</span>

                @endif
            </div>
            <div class="form-group">
                <label for="">E-mail</label>
                <input type="text" name="email" class="form-control">
                @if($errors->has('email'))
                <span class="text-danger">{{$error->first('email')}}</span>

                @endif
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="text" name="password" class="form-control">
                @if($errors->has('password'))
                <span class="text-danger">{{$error->first('password')}}</span>

                @endif
            </div>
            <hr>
            <div class="form-group">
                <button class="btn tbn-primary" type="submit">register</button>
            </div>
        </div>
    </div>
</div>
</div>
</div>
{{-- <h1>heading</h1>
<button class="btn btn-y">submit</button> --}}

@endsection
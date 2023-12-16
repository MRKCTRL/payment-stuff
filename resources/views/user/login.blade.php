@extends('layout.app')

@section('content') 

<div class="container" mt-5> 
<div class="row justify-content-center">
<div class="col-md-8">
    <div class="card shadow-lg">
        <div class-header>login</div>
        <form action="{{route('login.post')}}" method="post"@csrf
        <div class="card-body">
            <div class="form-group">
                <label for="">Full name</label>
                <input type="text" name="name" class="form-control">
                @if($errors->has('name'))
                <span class="text-danger">{{$error->first('name')}}</span>

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
            <div class="form-group text-centre">
                <button class="btn tbn-primary" type="submit">login</button>
            </div>
        </div>
    </div>
</div>
</div>
</div>
{{-- <h1>heading</h1>
<button class="btn btn-y">submit</button> --}}

@endsection
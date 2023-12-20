@extends('layout.admin.main')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        @if(Session::has('success'))

    <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif

        <form action="{{route('user.update.profile')}}" method="POST" enctype="multipart/form-data">@csrf
<div class="col-md-8">
    <div class="form-group">
        <label for="logo">Logo</label>
        <input type="file" id="logo" name="profile_pic" class="form-control">
        @if(auth()->user()->profile_pic)
        <img src="{{storage::url(auth()->user()->profile_pic)}}" alt="">
        @endif

    </div>
    <div class="form-group">
        <label for="logo">Company Name</label>
        <input type="file" class="form-control" name="name" value="{{auth()->user()->name}}">

    </div>
    <div class=" form-group mt-4">
        
<button class="btn btn-success" type="submit">Update</button>
    </div>


</div>
</form>
    </div>

</div>


@endsection
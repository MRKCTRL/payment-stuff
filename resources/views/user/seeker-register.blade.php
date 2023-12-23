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
    <div class="card" id="card">
        <div class-header>register</div>
        <form action="#" id="registionForm" method="post"></form>
        <div class="card-body">
            <div class="form-group">
                <label for="">Full name</label>
                <input type="text" name="name" class="form-control" required>
                @if($errors->has('name'))
                <span class="text-danger">{{$error->first('name')}}</span>

                @endif
            </div>
            <div class="form-group">
                <label for="">E-mail</label>
                <input type="text" name="email" class="form-control" required>
                @if($errors->has('email'))
                <span class="text-danger">{{$error->first('email')}}</span>

                @endif
            </div>
            <div class="form-group">
                <label for="">Password</label >
                <input type="text" name="password" class="form-control" required>
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
    <div id="message"></div>
</div>
</div>
</div>
{{-- <h1>heading</h1>
<button class="btn btn-y">submit</button> --}}
<script>

    var url = "{{route('store.seeker')}}";
    document.getElementById("btnRegister").addEventListner("click", function(event){
        // alert('register')
        var form = document.getElementById("registerationForm");
        var card = document.getElementById('card');
        var messageDiv = document.getElementById('message')
        messageDiv.innerHTML= ''
        var formData = new FormData(form)

        var btn = event.target
        btn .disabled = true;
        btn.innerHTML = 'Sending Email...'

        fetch(url, {
            method: "POST",
            header: {
                'X-CSRF-TOKEN': '{{csrf_token}}'
            },
            body: formData

        }).then(response => {
            if(response.ok){
                return response.json();   
            }else{
                throw new Error('Error')
            }
        }).then(data=>{
            btn.innerHTML = 'Register'
            btn.disabled = false
            messageDiv.innerHTML = '<div class"alert alert-success">Regiseration completed, Please Check your Email Inbox</div>'
            card.style.display = 'none'
        }).catch(error =>{
            btn.innerHTML = 'Register'
            btn.disabled = false
            messageDiv.innerHTML = '<div class"alert alert-danger">Sorry, Something went wrong, Try again</div>'
        })
    })
</script>

@endsection
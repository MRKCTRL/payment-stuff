
<h1>List of users</h1>

{{-- <?php 
foreach ($contact as $user) {
    # code...
    echo $user->name.'<br>';
}

?> --}}

{{-- best syntact --}}

@foreach ($contact as $user)

<p>{{$user->name}}</p>

@endforeach


 {{-- if statement
@if($a>$b)
{{}}

@endif --}}

{{-- @if()
<true></true>
@else
<false></false>

@endif --}}



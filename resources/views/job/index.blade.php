@extends('layout.admin.main')

@section 
<div class="container mt-5">
<h2>All jobs</h2>
<div class="row justify-content-center">

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Your Jobs
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Created ON</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Title</th>
                        <th>Created on</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($jobs as $job)
                    <tr>
                        <td>{{$job->title}}</td>
                        <td>{{$job->created_at->format('Y-m-d')}}</td>
                        <td>edit{{$job->title}}</td>
                        <td>delete{{$job->title}}</td>
                        @endforreach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
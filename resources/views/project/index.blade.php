@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ route('home') }}" class="btn btn-outline-primary">BACK</a>
                     || LIST OF PROJECTS</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                    <form action="{{ route('project.create') }}" method="GET">
                        <button type="submit" class="btn btn-outline-primary float-right mb-2 mr-2">Add PROJECT</button>
                    </form>
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                    	        <th>No.</th>
                        		<th>Name</th>
                        		<th>Description</th>
                        		<th>Start Date</th>
                        		<th>Due Date</th>
                                <th>Action</th>
                    	    </tr>
                        </thead>

                        @foreach($projects as $project)
                	    <tbody>
                            <tr>
                		        <td>{{ $project->id }}.</td>
                                <td><a href="{{ route('project.show', ['id' => $project->id]) }}">{{ $project->title }}</a></td>
                    			<td>{{ $project->intro }}</td>
                    			<td>{{ $project->startdate }}</td>
                        		<td>{{ $project->duedate }}</td>
                                <td><a href="{{ route('project.edit', ['id' => $project->id]) }}">Edit</a>

                                <form action="{{ route('project.destroy', ['id' => $project->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                       <button class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                                </form>
                                <form action="{{ route('req.req_index',['pid'=>$project->id]) }}" method="GET">
                                    <button type="submit" class="btn btn-outline-primary float-right mb-2 mr-2">View REQ</button>
                                </form>
                                </td>
                            </tr>
                        </tbody>
                	    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

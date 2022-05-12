@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ route('project.index') }}" class="btn btn-outline-primary">BACK</a>
                     || LIST OF REQUIREMENTS of {{ $project->title }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                    <form action="{{ route('req.req_create', ['pid' => $project->id]) }}" method="GET">
                        <button type="submit" class="btn btn-outline-primary float-right mb-2 mr-2">ADD REQUIREMENT</button>
                    </form>
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                    	        <th>No.</th>
                        		<th>Name</th>
                        		<th>Status</th>
                        		<th>Label</th>
                                <th>Action</th>
                    	    </tr>
                        </thead>

                        @foreach($reqs as $req)
                	    <tbody>
                            <tr>
                		        <td>{{ $req->id }}.</td>
                                <td>{{ $req->name }}</td>
                    			<td>{{ $req->status->progress }}</td>
                    			<td>{{ implode(", ", $req->labels->pluck('type')->all()) }}</td>
                                <td><a href="{{ route('req.req_edit', ['id' => $req->id]) }}">Edit</a>
                                    <form action="{{ route('req.destroy', ['pid' => $req->project->id, 'id' => $req->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                           <button class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
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

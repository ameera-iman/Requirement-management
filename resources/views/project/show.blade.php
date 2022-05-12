@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">SHOW PROJECT</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="ml-5 mb-3">
                    <a href="{{ route('project.index') }}" class="btn btn-outline-primary">BACK</a>
                </div>
                <div class="ml-5">
					<h3>{{ $project->title }}</h3>
					<h5>{{ $project->intro }}</h5>
					<span>Start Date : </span><span>{{ $project->startdate }}</span>
					<br>
					<span>Due Date : </span><span>{{ $project->duedate }}</span>
                    </div>
                    <div class="mt-3">
                        <h5>List Of Requirements</h5>
                        <ol>
                            @forelse($project->requirements as $requirement)
                                <li>{{ $requirement->name." - ".$requirement->status->progress }}</li>
                            @empty
                                <span>NO REQUIREMENTS</span>
                            @endforelse
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

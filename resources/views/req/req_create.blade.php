@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ADD REQUIREMENT</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="add-form">
                    	<form action="{{ route('req.store') }}" method="POST">
                            @csrf
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label class="form-label">Project id : </label>
                                </div>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" name="project_id" value="{{ $project->id }}">
                                </div>
                            </div>
                            <div class="row form-group">
                    			<div class="col-md-3">
                    				<label class="form-label">NAME : </label>
                    			</div>
                    			<div class="col-md-9">
	                    			<input class="form-control" type="text" name="name" placeholder="Type req's name">
	                    		</div>
                    		</div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label class="form-label">PROGRESS : </label>
                                </div>
                                <div class="col-md-9">
                                    <select class="form-control" name="status_id">
                                        <option value="">--- Select Status ---</option>
                                    @foreach($statuses as $status)
                                        <option value="{{ $status->id }}" >{{ $status->progress }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label class="form-label">TYPE : </label>
                                </div>
                                <div class="col-md-9">
                                @foreach($labels as $label)
                                    <input class="mr-2" type="checkbox" name=labels[] value="{{ $label->id }}">{{ $label->type." - ".$label->name }}<br>
                                @endforeach
                                </div>
                            </div>
                    		<div class="row form-group">
                    			<div class="col-md-12 d-flex justify-content-center">
                    				<button type="submit" class="btn btn-outline-primary mr-2">Submit</button>
                    				<button type="reset" class="btn btn-outline-danger">Reset</button>
                    			</div>
                    		</div>
                    	</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

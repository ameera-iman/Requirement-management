@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ADD PROJECT</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="add-form">
                    	<form action="{{ route('project.store') }}" method="POST">
                                @csrf
                    		<div class="row form-group">
                    			<div class="col-md-3">
                    				<label class="form-label">TITLE : </label>
                    			</div>
                    			<div class="col-md-9">
	                    			<input class="form-control" type="text" name="title" placeholder="Type project's title">
	                    		</div>
                    		</div>
                    		<div class="row form-group">
                    			<div class="col-md-3">
	                    			<label class="form-label">DESCRIPTION : </label>
    							</div>
    							<div class="col-md-9">
	                    			<input class="form-control" type="text" name="intro" placeholder="Type project's description">
	                    		</div>
                    		</div>
                    		<div class="row form-group">
                    			<div class="col-md-3">
	                    			<label class="form-label">START DATE : </label>
	                    		</div>
	                    		<div class="col-md-9">
	                    		    <input class="form-control" type="date" name="startdate" placeholder="Type project's start date">
	                    		</div>
                    		</div>
                    		<div class="row form-group">
                    			<div class="col-md-3">
	                    		    <label class="form-label">DUE DATE : </label>
	                    		</div>
	                    		<div class="col-md-9">
	                    		    <input class="form-control" type="date" name="duedate" placeholder="Type project's due date">
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

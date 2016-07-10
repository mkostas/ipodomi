@extends('layouts.master')

@section('content')
<h1>Επεξεργασία Email</h1>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form role="form" method="post">
{!! method_field('patch') !!}
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3">
		        <div class="form-group">
				  	<label for="sel1">Σχολείο <span class="red">*</span></label>				  	
				  	<select class="form-control select2" name="school_id">
					    @foreach ($schools as $key=>$school)
					    	@if($email->school_id == $school->id) 
					    		<option value="{{ $school->id }}" selected='selected'>{{ $school->name }}</option>
					    	@else
			                	<option value="{{ $school->id }}"  >{{ $school->name }}</option>
			                @endif
			            @endforeach
				  	</select>
				</div>
		        <div class="form-group">
		            <label>Email από <span class="red">*</span></label>
		            <input class="form-control" name="email_from" value="{{ $email->email_from }}">
		        </div>
		        <div class="form-group">
		            <label>Email προς <span class="red">*</span></label>
		            <input class="form-control" name="email_to" value="{{ $email->email_to }}">
		        </div>
		        <div class="form-group">
		            <label>Θέμα <span class="red">*</span></label>
		            <input class="form-control" name="subject" value="{{ $email->subject }}">
		        </div>			
				<div class="form-group">
		            <label>Περιεχόμενο <span class="red">*</span></label>
		            <textarea class="form-control" rows="7" name="content">{{ $email->content }}</textarea>
		        </div>	               
		        <div class="form-group">
		            <label>Σχόλια</label>
		            <textarea class="form-control" rows="7" name="comments">{{ $email->comments }}</textarea>
		        </div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
		       		<span class="red">*</span> Υποχρεωτικά πεδία  
		       	</div>
				<input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
				<button type="submit" class="btn btn-primary">Αποθήκευση</button>
			</div>
		</div>
	</div>			
</form>

@endsection
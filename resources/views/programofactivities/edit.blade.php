@extends('layouts.master')

@section('content')

<h1>Επεξεργασία Προγράμματος</h1>

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
					    	@if($program_of_activities->school_id == $school->id) 
					    		<option value="{{ $school->id }}" selected='selected'>{{ $school->name }}</option>
					    	@else
			                	<option value="{{ $school->id }}"  >{{ $school->name }}</option>
			                @endif
			            @endforeach
				  	</select>
				</div>	
		        <div class="form-group">
		            <label>Περιεχόμενο <span class="red">*</span></label>
		            <textarea class="form-control" rows="15" name="content">{{ $program_of_activities->content }}</textarea>         
		        </div>
		        <div class="form-group">
				  	<label>Γλώσσα <span class="red">*</span></label>
				  	<select class="form-control select2" name="lang">
					    @foreach ($languages as $key=>$language)
					    	@if($language->id == $program_of_activities->lang) 
					    		<option value="{{ $language->id }}" selected='selected'>{{ $language->name }}</option>
					    	@else
			                	<option value="{{ $language->id }}"  >{{ $language->name }}</option>
			                @endif
			            @endforeach
				  	</select>
				</div>
		        <div class="form-group">
		            <label>Σχόλια </label>
		            <textarea class="form-control" rows="15" name="comments">{{ $program_of_activities->comments }}</textarea>		            
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
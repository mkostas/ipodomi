@extends('layouts.master')

@section('content')

<h1>Εισαγωγή Προγράμματος</h1>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form role="form" method="post" action="store">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3">
		        <div class="form-group">
				  	<label for="sel1">Σχολείο <span class="red">*</span></label>				  	
				  	<select class="form-control select2" name="school_id">
				  		<option value="">Επιλέξτε</option>
					    @foreach ($schools as $key=>$school)
					    	@if (old('school_id') == $school->id)
			                	<option value="{{ $school->id }}" selected>{{ $school->name }}</option>
			                @else
			                	<option value="{{ $school->id }}">{{ $school->name }}</option>
			                @endif
			            @endforeach
				  	</select>
				</div>	

				<div class="form-group">
				  	<label>Γλώσσα <span class="red">*</span></label>				  	
				  	<select class="form-control select2" name="lang">
				  		<option value="">Επιλέξτε</option>
					    @foreach ($languages as $language)
					    	@if (old('lang') == $language->id)
			                	<option value="{{ $language->id }}" selected>{{ $language->name }}</option>
			                @else
			                	<option value="{{ $language->id }}">{{ $language->name }}</option>
			                @endif
			            @endforeach
				  	</select>
				</div>
				
		        <div class="form-group">
		            <label>Περιεχόμενο <span class="red">*</span></label>
		            <textarea class="form-control" rows="15" name="content">{{ old('content') }}</textarea>         
		        </div>
		        
		        <div class="form-group">
		            <label>Σχόλια </label>
		            <textarea class="form-control" rows="15" name="comments">{{ old('comments') }}</textarea>		            
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
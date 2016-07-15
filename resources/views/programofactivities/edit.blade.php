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
				  	<select class="form-control select2" name="school">
					    @foreach ($schools as $key=>$school)
					    	@if($program_of_activities->school == $school->id) 
					    		<option value="{{ $school->id }}" selected='selected'>{{ $school->name }}</option>
					    	@else
			                	<option value="{{ $school->id }}"  >{{ $school->name }}</option>
			                @endif
			            @endforeach
				  	</select>
				</div>

				<div class="form-group">
				  	<label for="sel1">Ειδικότητα <span class="red">*</span></label>				  	
				  	<select class="form-control select2" name="company_category">
					    @foreach ($company_categories as $key=>$company_category)
					    	@if($program_of_activities->company_category == $company_category->id) 
					    		<option value="{{ $company_category->id }}" selected='selected'>{{ $company_category->type }}</option>
					    	@else
			                	<option value="{{ $company_category->id }}"  >{{ $company_category->type }}</option>
			                @endif
			            @endforeach
				  	</select>
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
					
				<input type="hidden" class="form-control" name="filepath" value="{{ $program_of_activities->filepath }}">	       
		        	        
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
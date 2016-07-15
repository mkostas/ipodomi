@extends('layouts.master')

@section('content')
<h1>Εισαγωγή Υποβληθείσας Αίτησης</h1>

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
			        <label>Αρχείο <span class="red">*</span></label>
					<div class="input-group">					
						<span class="input-group-btn">						
							<a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
								<i class="fa fa-file"></i> Επιλογή
							</a>
						</span>
						<input id="thumbnail" class="form-control" type="text" name="filepath" value="{{ old('filepath') }}">
					</div>
				</div>
				
				<div class="form-group">
				  	<label for="sel1">Σχολείο <span class="red">*</span></label>				  	
				  	<select class="form-control select2" name="school">
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
				  	<label for="sel1">Ειδικότητα <span class="red">*</span></label>				  	
				  	<select class="form-control select2" name="company_category">
				  			<option value="">Επιλέξτε</option>
					    @foreach ($company_categories as $key=>$company_category)
					    	@if (old('company_category') == $company_category->id)
			                	<option value="{{ $company_category->id }}" selected>{{ $company_category->type }}</option>
			                @else
			                	<option value="{{ $company_category->id }}">{{ $company_category->type }}</option>
			                @endif
			                
			            @endforeach
				  	</select>
				</div>

		        <div class="form-group">
		            <label>Γλώσσα <span class="red">*</span></label>				  	
				  	<select class="form-control" name="lang">
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
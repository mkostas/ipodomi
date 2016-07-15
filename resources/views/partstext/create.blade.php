@extends('layouts.master')

@section('content')
<h1>Εισαγωγή Κειμένου</h1>

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
					<input type="hidden" name="part_category" value="{{ $part_category->id }}">
		        </div>
		        <div class="form-group">
		            <label>Περιεχόμενο <span class="red">*</span></label>
		            <textarea class="form-control" rows="15" name="content" >{{ old('content') }}</textarea>		            
		        </div>

		        <div class="form-group">
				  	<label for="sel1">Κατηγορία Εταιρίας <span class="red">*</span></label>				  	
				  	<select class="form-control select2" name="company_category">
				  		<option value="" selected>{{ 'Επιλέξτε' }}</option>
					    @foreach ($company_categories as $company_category)
					    	@if (old('category_id') == $company_category->id)
			                	<option value="{{ $company_category->id }}" selected>{{ $company_category->type }}</option>
			                @else
			                	<option value="{{ $company_category->id }}">{{ $company_category->type }}</option>
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
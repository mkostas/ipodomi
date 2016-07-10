@extends('layouts.master')

@section('content')
<h1>Εισαγωγή Εταιρίας για Πρακτική</h1>

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
				  	<label for="sel1">Κατηγορία Εταιρίας <span class="red">*</span></label>				  	
				  	<select class="form-control select2" name="category_id">
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
		            <label>Ονομασία <span class="red">*</span></label>
		            <input class="form-control" name="name" value="{{ old('name') }}">
		        </div>
		        <div class="form-group">
		            <label>Τοποθεσία </label>
		            <input class="form-control" name="place" value="{{ old('place') }}">
		        </div>
		        <div class="form-group">
		            <label>Υπεύθυνος </label>
		            <input class="form-control" name="contact_person" value="{{ old('contact_person') }}">
		        </div>
		        <div class="form-group">
		            <label>E-mail </label>
		            <input class="form-control" name="email" value="{{ old('email') }}">
		        </div>
		        <div class="form-group">
		            <label>Τηλέφωνα </label>
		            <input class="form-control" name="phones" value="{{ old('phones') }}">
		        </div>
		        <div class="form-group">
		            <label>Fax </label>
		            <input class="form-control" name="fax" value="{{ old('fax') }}">
		        </div>	               
		        <div class="form-group">
		            <label>Σχόλια</label>
		            <textarea class="form-control" rows="7" name="comments">{{ old('comments') }}</textarea>
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
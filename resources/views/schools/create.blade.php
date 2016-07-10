@extends('layouts.master')

@section('content')
<h1>Εισαγωγή σχολείου</h1>

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
				  	<label for="sel1">Χώρα <span class="red">*</span></label>				  	
				  	<select class="form-control" name="country_id">
				  		<option value="">Επιλέξτε</option>
					    @foreach ($countries as $country)
					    	@if (old('country_id') == $country->id)
			                	<option value="{{ $country->id }}" selected>{{ $country->name }}</option>
			                @else
			                	<option value="{{ $country->id }}">{{ $country->name }}</option>
			                @endif
			            @endforeach
				  	</select>
				</div>
		        <div class="form-group">
		            <label>Πόλη <span class="red">*</span></label>
		            <input class="form-control" name="city" value="{{ old('city') }}">
		        </div>
		        <div class="form-group">
		            <label>Ονομασία <span class="red">*</span></label>
		            <input class="form-control" name="name" value="{{ old('name') }}">
		        </div>
		        <div class="form-group">
		            <label>Υπεύθυνος</label>
		            <input class="form-control" name="contact_person" value="{{ old('contact_person') }}">
		        </div>
		        <div class="form-group">
		            <label>Email</label>
		            <input class="form-control" name="email" value="{{ old('email') }}">
		        </div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
		            <label>Τηλέφωνα</label>
		            <input class="form-control" name="phones" value="{{ old('phones') }}">
		        </div>	               
		        <div class="form-group">
		            <label>Fax</label>
		            <input class="form-control" name="fax" value="{{ old('fax') }}">
		        </div>
		        <div class="form-group">
		            <label>Του στείλαμε</label>
		            <input class="form-control" name="sent_section" value="{{ old('sent_section') }}">
		        </div>
		        <div class="checkbox">
		        	<input type="hidden" name="cancelled" value="0"></input>
		        	@if (old('cancelled') == 1)
						<label><input type="checkbox" name="cancelled" value="1" checked>Ακύρωσε</label>
					@else
						<label><input type="checkbox" name="cancelled" value="1">Ακύρωσε</label>
					@endif
				</div>
				<div class="checkbox">
					<input type="hidden" name="not_submitted" value="0"></input>
					@if (old('not_submitted') == 1)
						<label><input type="checkbox" name="not_submitted" value="1" checked>Δέν υπέβαλε</label>
					@else
						<label><input type="checkbox" name="not_submitted" value="1">Δέν υπέβαλε</label>
					@endif
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
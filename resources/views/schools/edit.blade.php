@extends('layouts.master')

@section('content')
<h1>Επεξεργασία σχολείου - {{ $school->name }}</h1>

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
				  	<label for="sel1">Χώρα <span class="red">*</span></label>				  	
				  	<select class="form-control" name="country_id">
					    @foreach ($countries as $key=>$country)
					    	@if($school->country_id == $country->id) 
					    		<option value="{{ $country->id }}" selected='selected'>{{ $country->name }}</option>
					    	@else
			                	<option value="{{ $country->id }}"  >{{ $country->name }}</option>
			                @endif
			            @endforeach
				  	</select>
				</div>
		        <div class="form-group">
		            <label>Πόλη</label>
		            <input class="form-control" name="city" value="{{ $school->city }}">
		        </div>
		        <div class="form-group">
		            <label>Ονομασία</label>
		            <input class="form-control" name="name" value="{{ $school->name }}">
		        </div>
		        <div class="form-group">
		            <label>Υπεύθυνος</label>
		            <input class="form-control" name="contact_person" value="{{ $school->contact_person }}">
		        </div>
		        <div class="form-group">
		            <label>Email</label>
		            <input class="form-control" name="email" value="{{ $school->email }}">
		        </div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
		            <label>Τηλέφωνα</label>
		            <input class="form-control" name="phones" value="{{ $school->phones }}">
		        </div>	               
		        <div class="form-group">
		            <label>Fax</label>
		            <input class="form-control" name="fax" value="{{ $school->fax }}">
		        </div>
		        <div class="form-group">
		            <label>Του στείλαμε</label>
		            <input class="form-control" name="sent_section" value="{{ $school->sent_section }}">
		        </div>
		        <div class="checkbox">		        	
	        		<input type="hidden" name="cancelled" value="0"></input>
	    			<label><input type="checkbox" name="cancelled" value="1" 
	    				@if($school->cancelled == 1) {{ 'checked' }}  @endif
	    			>Ακύρωσε</label>
				</div>
				<div class="checkbox">
					<input type="hidden" name="not_submitted" value="0"></input>
					<label><input type="checkbox" name="not_submitted" value="1" 
						@if($school->not_submitted == 1) {{ 'checked' }}  @endif
					>Δεν υπέβαλε</label>		
				</div> 
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
				<button type="submit" class="btn btn-primary">Αποθήκευση</button>
			</div>
		</div>
	</div>			
		
       
	
		
	
</form>

@endsection
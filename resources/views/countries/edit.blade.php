@extends('layouts.master')

@section('content')
<h1>Επεξεργασία Χώρας</h1>

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
		            <label>Χώρα <span class="red">*</span></label>
		            <input class="form-control" name="name" value="{{ $country->name }}">
		        </div>
		        <div class="checkbox">     	
	        		<input type="hidden" name="is_valid" value="0"></input>
	    			<label><input type="checkbox" name="is_valid" value="1" 
	    				@if($country->is_valid == 1) {{ 'checked' }}  @endif
	    			>Ενεργή</label>
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
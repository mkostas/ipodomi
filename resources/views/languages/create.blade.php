@extends('layouts.master')

@section('content')
<h1>Εισαγωγή Γλώσσας</h1>

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
		            <label>Ονομασία <span class="red">*</span></label>
		            <input class="form-control" name="name" value="{{ old('name') }}">
		        </div>		        
		        <div class="form-group">
		            <label>Εικονίδιο </label>
		            <input class="form-control" name="icon" value="{{ old('icon') }}">
		        </div>
		        <div class="form-group">
		            <label>Slug <span class="red">*</span></label>
		            <input class="form-control" name="slag" value="{{ old('slag') }}">
		        </div>
		        <div class="checkbox">
		        	<input type="hidden" name="is_valid" value="0"></input>
		        	@if (old('is_valid') == 1)
						<label><input type="checkbox" name="is_valid" value="1" checked>Ενεργή</label>
					@else
						<label><input type="checkbox" name="is_valid" value="1">Ενεργή</label>
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
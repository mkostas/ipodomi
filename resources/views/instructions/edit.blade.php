@extends('layouts.master')

@section('content')

<h1>Επεξεργασία Οδηγίας</h1>

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
		            <label>Ονομασία <span class="red">*</span></label>
		            <input class="form-control" name="name" value="{{ $instructions->name }}">		            
		        </div>	
		        <div class="form-group">
		            <label>Περιεχόμενο <span class="red">*</span></label>
		            <textarea class="form-control" rows="15" name="content">{{ $instructions->content }}</textarea>         
		        </div>
		        <div class="form-group">
				  	<label>Γλώσσα <span class="red">*</span></label>
				  	<select class="form-control select2" name="lang">
					    @foreach ($languages as $key=>$language)
					    	@if($language->id == $instructions->lang) 
					    		<option value="{{ $language->id }}" selected='selected'>{{ $language->name }}</option>
					    	@else
			                	<option value="{{ $language->id }}"  >{{ $language->name }}</option>
			                @endif
			            @endforeach
				  	</select>
				</div>
		        <div class="form-group">
		            <label>Σχόλια </label>
		            <textarea class="form-control" rows="15" name="comments">{{ $instructions->comments }}</textarea>		            
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
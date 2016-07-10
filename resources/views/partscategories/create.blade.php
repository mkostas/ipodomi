@extends('layouts.master')

@section('content')
<h1>Προσθήκη Κατηγορίας</h1>

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
				  	<label>Γονική Κατηγορία <span class="red">*</span></label>				  	
				  	<select class="form-control select2" name="parent">
				  		<option value="0">Αρχική κατηγορία</option>

				  		@foreach ($parts_categories as $parent)
				  			<option value="{{ $parent->id }}">{{ $parent->name }}</option>                         
						        @if ($parent->children->count())						            					                
				                    @foreach ($parent->children as $child)
				                    	<option value="{{ $child->id }}">&nbsp;&nbsp;&nbsp;{{ $child->name }}</option>                                            
					                        @if ($child->children->count())				                                
			                                    @foreach ($child->children as $child)
			                                       <option value="{{ $child->id }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $child->name }}</option>                                   
			                                    @endforeach
					                        @endif                                            
				                    @endforeach				                
						        @endif	                          
					    @endforeach



				  	</select>
				</div>
		        <div class="form-group">
		            <label>Ονομασία</label>
		            <input class="form-control" name="name" value="">
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
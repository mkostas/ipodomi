@extends('layouts.master')

@section('content')
<h1>Επεξεργασία Τμήματος Αίτησης - {{ $part_category->name }}
<form class="delete form-inline" method="POST" role="form"
      action="{{ url('', ['parts_categories', $part_category->id]) }}" style="display:inline">
    
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <button type="button" class="btn btn-md btn-danger" title="Διαγραφή"
            data-toggle="modal" 
            data-target="#confirmDelete" 
            data-title="Διαργαφή Kατηγορίας" 
            data-message="Είσαι σίγουρος(η) για την διαγραφή της κατηγορίας - {{ $part_category->name }}. Επίσης θα διαγραφούν και οι υποκατήγοριες που ανήκουν σε αυτήν!">
            <i class="fa fa-md fa-trash"> </i>
    </button>
</form>
</h1> 
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
		            <label>Γονική Κατηγορία <span class="red">*</span></label>				  	
				  	<select class="form-control select2" name="parent">
				  		<option value="0">Αρχική κατηγορία</option>
				  		@foreach ($parts_categories as $parent)
				  			<option value="{{ $parent->id }}" @if ($part_category->parent == $parent->id) {{ "selected" }} @endif>{{ $parent->name }}</option>                         
						        @if ($parent->children->count())	

				                    @foreach ($parent->children as $child)
				                    	<option value="{{ $child->id }}" @if ($part_category->parent == $child->id) {{ "selected" }} @endif>&nbsp;&nbsp;&nbsp;{{ $child->name }}</option>                                            
					                        @if ($child->children->count())				                                
			                                    @foreach ($child->children as $child)
			                                       <option value="{{ $child->id }}" @if ($part_category->parent == $child->id) {{ "selected" }} @endif>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $child->name }}</option>                                   
			                                    @endforeach
					                        @endif                                            
				                    @endforeach				                
						        @endif	                          
					    @endforeach
				  	</select>
		        </div>
		        <div class="form-group">
		            <label>Ονομασία</label>
		            <input class="form-control" name="name" value="{{ $part_category->name }}">
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



<!-- Modal Dialog -->
<div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        		<h4 class="modal-title"></h4>
     		</div>
      <div class="modal-body">
        <p></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Άκυρο</button>
        <button type="button" class="btn btn-danger" id="confirm">Διαγραφή</button>
      </div>
    </div>
  </div>
</div>

@endsection
@extends('layouts.master')

@section('content')
	
<h1>Κατηγορίες Εταιριών <a href="{!! url('/company_category/create') !!}" class="btn btn-sm btn-success">Προσθήκη</a></h1>


@if (Session::has('message'))
    <div id="message_tab" class="alert alert-success">{{ Session::get('message') }}</div>
@endif

<table id="table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width:90%">Τύπος</th>
            <th style="width:10%">Επεξεργασία/Διαγραφή</th>             
        </tr>
    </thead>
    <tbody>
    	@foreach ($company_categories as $company_category)            
    		<tr>    			
	            <td>{{ $company_category->type }}</td>	                    	
	            
	            <td style="text-align:center">
	            	<a href="{{ url('', ['company_category', $company_category->id]) }}" class="btn btn-sm btn-info" style="margin-right:10px;" title="Επεξεργασία"><i class="fa fa-lg fa-edit"></i></a>
	            	<form class="delete form-inline" method="POST" role="form"
                          action="{{ url('', ['company_category', $company_category->id]) }}" style="display:inline">
                        
                        <input type="hidden" name="_method" value="DELETE">
        				<input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <button type="button" class="btn btn-sm btn-danger" title="Διαγραφή"
                        		data-toggle="modal" 
                        		data-target="#confirmDelete" 
                        		data-title="Διαργαφή Κατηγορίας" 
                        		data-message="Είσαι σίγουρος(η) για την διαγραφή της κατηγορίας - {{ $company_category->type }}. Επίσης θα διαγραφούν και οι εταιρίες που ανήκουν στην κατηγορία αυτή!">
        						<i class="fa fa-lg fa-trash"></i>
        				</button>
                    </form>
	           	</td>

	        </tr>

		@endforeach
        
    </tbody>
</table>


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

@extends('layouts.master')

@section('content')
	
<h1>Εταιρίες για Πρακτική <a href="{!! url('/company/create') !!}" class="btn btn-sm btn-success">Προσθήκη</a></h1>


@if (Session::has('message'))
    <div id="message_tab" class="alert alert-success">{{ Session::get('message') }}</div>
@endif

<table id="table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Κατηγορία Εταιρίας</th>
            <th>Ονομασία</th>
            <th>Τοποθεσία</th>
            <th>Υπεύθυνος</th>
            <th>Email</th>
            <th>Τηλέφωνα</th>
            <th>Fax</th>
            <th>Σχόλια</th>
            <th>Επεξεργασία/Διαγραφή</th>
        </tr>
    </thead>
    <tbody>
    	@foreach ($companies as $company)         
    		<tr>    				
	            <td>
                    @foreach ($company->companyCategory as $companyCategory)
                        {{ $companyCategory->type }}
                    @endforeach
                </td>
	            <td>{{ $company->name }}</td>
	            <td>{{ $company->place }}</td>
	            <td>{{ $company->contact_person }}</td>
	            <td>{{ $company->email }}</td>	            
                <td>{{ $company->phones }}</td>                 
                <td>{{ $company->fax }}</td>                 
                <td>{{ $company->comments }}</td>            	
	            
	            <td style="text-align:center">
	            	<a href="{{ url('', ['company', $company->id]) }}" class="btn btn-sm btn-info" style="margin-right:10px;" title="Επεξεργασία"><i class="fa fa-lg fa-edit"></i></a>
	            	<form class="delete form-inline" method="POST" role="form"
                          action="{{ url('', ['company', $company->id]) }}" style="display:inline">
                        
                        <input type="hidden" name="_method" value="DELETE">
        				<input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <button type="button" class="btn btn-sm btn-danger" title="Διαγραφή"
                        		data-toggle="modal" 
                        		data-target="#confirmDelete" 
                        		data-title="Διαργαφή Εταιρίας" 
                        		data-message="Είσαι σίγουρος(η) για την διαγραφή της Εταιρίας - {{ $company->name }}">
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

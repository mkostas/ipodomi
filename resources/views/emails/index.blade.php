@extends('layouts.master')

@section('content')
	
<h1>Emails <a href="{!! url('/email/create') !!}" class="btn btn-sm btn-success">Προσθήκη</a></h1>


@if (Session::has('message'))
    <div id="message_tab" class="alert alert-success">{{ Session::get('message') }}</div>
@endif

<table id="table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Σχολείο</th>
            <th>Από</th>
            <th>Προς</th>
            <th>Θέμα</th>
            <th>Περιεχόμενο</th>
            <th>Σχόλια</th>
            <th>Επεξεργασία/Διαγραφή</th>
        </tr>
    </thead>
    <tbody>
    	@foreach ($emails as $key=>$email)            
    		<tr>    				
	            <td>{{ $email->school->name }}</td>
	            <td>{{ $email->email_from }}</td>
	            <td>{{ $email->email_to }}</td>
	            <td>{{ $email->subject }}</td>
	            <td>
                    <a href="#content" 
                        data-toggle="modal" 
                        data-title="Περιεχόμενο" 
                        data-message="{{ $email->content }}">
                            {{ getFirstWords($email->content, 30) }}
                    </a>
                </td>	            
	            <td>{{ $email->comments }}</td>	            	
	            
	            <td style="text-align:center">
	            	<a href="{{ url('', ['email', $email->id]) }}" class="btn btn-sm btn-info" style="margin-right:10px;" title="Επεξεργασία"><i class="fa fa-lg fa-edit"></i></a>
	            	<!-- <a href="{{ url('', ['delete', $email->id]) }}" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></a> -->
	            	<form class="delete form-inline" method="POST" role="form"
                          action="{{ url('', ['email', $email->id]) }}" style="display:inline">
                        
                        <input type="hidden" name="_method" value="DELETE">
        				<input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <button type="button" class="btn btn-sm btn-danger" title="Διαγραφή"
                        		data-toggle="modal" 
                        		data-target="#confirmDelete" 
                        		data-title="Διαργαφή Email" 
                        		data-message="Είσαι σίγουρος(η) για την διαγραφή του Email με θέμα - {{ $email->subject }}">
        						<i class="fa fa-lg fa-trash"></i>
        				</button>
                    </form>
	            	<!-- <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete_school" title="Διαγραφή"><i class="fa fa-remove"></i></button> -->
	           	</td>

	        </tr>

		@endforeach
        
    </tbody>
</table>


<!-- Modal Dialog for Delete -->
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
</div><!-- .Modal Dialog for Delete -->


<!-- Modal Dialog for content-->
<div class="modal fade" id="content" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Επιστροφή</button>
            </div>
        </div>
    </div>
</div><!-- .Modal Dialog for content-->

@endsection

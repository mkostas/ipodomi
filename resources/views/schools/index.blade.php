@extends('layouts.master')

@section('content')
	
<h1>Σχολεία <a href="{!! url('/create') !!}" class="btn btn-sm btn-success">Προσθήκη</a></h1>


@if (Session::has('message'))
    <div id="message_tab" class="alert alert-success">{{ Session::get('message') }}</div>
@endif
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<table id="table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Χώρα</th>
            <th>Πόλη</th>
            <th>Ονομασία</th>
            <th>Υπεύθυνος</th>
            <th>Email</th>
            <th>Τηλέφωνα</th>
            <th>Fax</th>
            <th>Ακύρωσε</th>
            <th>Δεν Υπέβαλε</th>
            <th>Του στείλαμε</th>
            <th>Επεξεργασία/Διαγραφή</th>
        </tr>
    </thead>
    <tbody>
    	@foreach ($schools as $key=>$school)
    		<tr>    				
	            <td>
                    @if (!isset($school->country->name))
                        {{ $school->country_id }} {{ 'error - country removed' }}
                    @else
                        {{ $school->country->name }}
                    @endif
                </td>
	            <td>{{ $school->city }}</td>
	            <td>{{ $school->name }}</td>
	            <td>{{ $school->contact_person }}</td>
	            <td>{{ $school->email }}</td>
	            <td>{{ $school->phones }}</td>	            
	            <td>{{ $school->fax }}</td>	            	
	            <td>
	            	@if ($school->cancelled == 1)
		    			<img src="{{ URL::asset('assets/images/cancel.png') }}" class="center-block" width="18" height="18">
		    		@else
		    			<img src="{{ URL::asset('assets/images/check.png') }}" class="center-block" width="18" height="18">
		    		@endif
	            </td>
	            <td>
	            	@if ($school->not_submitted == 1)
		    			<img src="{{ URL::asset('assets/images/cancel.png') }}" class="center-block" width="18" height="18">
		    		@else
		    			<img src="{{ URL::asset('assets/images/check.png') }}" class="center-block" width="18" height="18">
		    		@endif
	            </td>
	            <td>{{ $school->sent_section }}</td>
	            <td style="text-align:center">
	            	<a href="{{ url('', ['edit', $school->id]) }}" class="btn btn-sm btn-info" style="margin-right:10px;" title="Επεξεργασία"><i class="fa fa-lg fa-edit"></i></a>
	            	<!-- <a href="{{ url('', ['delete', $school->id]) }}" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></a> -->
	            	<form class="delete form-inline" method="POST" role="form"
                          action="{{ url('', ['delete', $school->id]) }}" style="display:inline">
                        
                        <input type="hidden" name="_method" value="DELETE">
        				<input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <button type="button" class="btn btn-sm btn-danger" title="Διαγραφή"
                        		data-toggle="modal" 
                        		data-target="#confirmDelete" 
                        		data-title="Διαργαφή Σχολείου" 
                        		data-message="Είσαι σίγουρος(η) για την διαγραφή του Σχολείου - {{ $school->name }}. Επίσης θα διαγραφούν τα 'emails', τα 'letter of intents' και τα 'programs of activities' που αφορούν το συγκεκριμένο Σχολείο.">
        						<i class="fa fa-lg fa-trash"></i>
        				</button>
                    </form>
	            	<!-- <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete_school" title="Διαγραφή"><i class="fa fa-remove"></i></button> -->
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


<script>
	setTimeout(function() {
	    $('#message_tab').fadeOut('fast');
	}, 4000);
</script>


@endsection

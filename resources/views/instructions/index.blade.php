@extends('layouts.master')

@section('content')
	
<h1>Οδηγίες <a href="{!! url('/instructions/create') !!}" class="btn btn-sm btn-success">Προσθήκη</a>
    <div style="float:right;">
        <a class="btn btn-warning" href="{{ url('instructions') }}" style="padding:8px;"> Όλα</a>
        @foreach ($languages as $language)
                <a class="btn btn-warning" href="{{ url('instructions/show', [$language->slag]) }}"><img src="{{ $language->icon }}"> {{ $language->name }}</a>
        @endforeach        
    </div>
</h1>


@if (Session::has('message'))
    <div id="message_tab" class="alert alert-success">{{ Session::get('message') }}</div>
@endif

<table id="table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width:80%">Όνομα αρχείου</th>
            <th style="width:10%">Γλώσσα</th>
            <th style="width:10%">Επεξεργασία/Διαγραφή</th>             
        </tr>
    </thead>
    <tbody>
    	@foreach ($instructions as $instruction)            
    		<tr>                
                <td>
                  <a href="{{ $instruction->filepath }}" download>{{ $instruction->name }}</a>                  
              </td>
              <td>
                  @foreach ($instruction->languages as $language)
                      <img src="{{ $language->icon }}" class="center-block" width="24" height="24" title="{{ $language->name }}" alt="{{ $language->name }}">                        
                  @endforeach 
              </td>                         
                
                <td style="text-align:center">
                    <a href="{{ url('', ['instructions', $instruction->id]) }}" class="btn btn-sm btn-info" style="margin-right:10px;" title="Επεξεργασία"><i class="fa fa-lg fa-edit"></i></a>
                    <form class="delete form-inline" method="POST" role="form"
                          action="{{ url('', ['instructions', $instruction->id]) }}" style="display:inline">
                        
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <button type="button" class="btn btn-sm btn-danger" title="Διαγραφή"
                                data-toggle="modal" 
                                data-target="#confirmDelete" 
                                data-title="Διαργαφή Αρχείου" 
                                data-message="Είσαι σίγουρος(η) για την διαγραφή του αρχείου - {{ $instruction->name }}.">
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

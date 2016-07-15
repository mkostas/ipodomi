@extends('layouts.master')

@section('content')
	
<h1>Πρόγραμμα <a href="{!! url('/program_of_activities/create') !!}" class="btn btn-sm btn-success">Προσθήκη</a>
    <div style="float:right;">
        <a class="btn btn-warning" href="{{ url('program_of_activities') }}" style="padding:8px;"> Όλα</a>
        @foreach ($languages as $language)
                <a class="btn btn-warning" href="{{ url('program_of_activities/show', [$language->slag]) }}"><img src="{{ $language->icon }}"> {{ $language->name }}</a>
        @endforeach        
    </div>
</h1>


@if (Session::has('message'))
    <div id="message_tab" class="alert alert-success">{{ Session::get('message') }}</div>
@endif

<table id="table4" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width:60%">Όνομα αρχείου</th>
            <th style="width:10%">Σχολείο</th>
            <th style="width:10%">Ειδικότητα</th>
            <th style="width:10%">Γλώσσα</th>
            <th style="width:10%">Επεξεργασία/Διαγραφή</th>             
        </tr>
    </thead>
    <tbody>
        @foreach ($program_of_activities as $program_of_activity)            
            <tr>                
                <td>
                  <a href="{{ $program_of_activity->filepath }}" download>{{ $program_of_activity->name }}</a>                  
              </td>

              <td>{{ $program_of_activity->schools->name }}</td>

              <td>{{ $program_of_activity->company_categories->type }}</td>
              
              <td>
                  @foreach ($program_of_activity->languages as $language)
                      <img src="{{ $language->icon }}" class="center-block" width="24" height="24" title="{{ $language->name }}" alt="{{ $language->name }}">                        
                  @endforeach 
              </td>                         
                
                <td style="text-align:center">
                    <a href="{{ url('', ['program_of_activities', $program_of_activity->id]) }}" class="btn btn-sm btn-info" style="margin-right:10px;" title="Επεξεργασία"><i class="fa fa-lg fa-edit"></i></a>
                    <form class="delete form-inline" method="POST" role="form"
                          action="{{ url('', ['program_of_activities', $program_of_activity->id]) }}" style="display:inline">
                        
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <button type="button" class="btn btn-sm btn-danger" title="Διαγραφή"
                                data-toggle="modal" 
                                data-target="#confirmDelete" 
                                data-title="Διαργαφή Αρχείου" 
                                data-message="Είσαι σίγουρος(η) για την διαγραφή του αρχείου - {{ $program_of_activity->name }}.">
                                <i class="fa fa-lg fa-trash"></i>
                        </button>
                    </form>
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

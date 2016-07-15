@extends('layouts.master')

@section('content')

<h1>{{ $part_parent_category->name }} - {{ $part_category->name  }} <a href="{{ url('parts_text/create', [$part_category->id]) }}" class="btn btn-sm btn-success">Προσθήκη</a>
    <div style="float:right;">
        <a class="btn btn-warning" href="{{ url('parts_text', [$part_category->id]) }}" style="padding:8px;"> Όλα</a>
        @foreach ($languages as $language)
                <a class="btn btn-warning" href="{{ url('parts_text/show', [$part_category->id, $language->slag]) }}"><img src="{{ $language->icon }}"> {{ $language->name }}</a>
        @endforeach        
    </div>
</h1>

@if (Session::has('message'))
    <div id="message_tab" class="alert alert-success">{{ Session::get('message') }}</div>
@endif

<!-- Filters -->
<div style="float:right;">
    
</div>

<!-- .Filters -->

<table id="table3" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Περιεχόμενο</th>
            <th>Ειδικότητα</th>
            <th>Γλώσσα</th>
            <th>Επεξεργασία/Διαγραφή</th>             
        </tr>
    </thead>
    <tbody>

    	@foreach ($parts_text as $part_text) 
                   
    		<tr>
                <td>
                    <a href="#content" 
                        data-toggle="modal" 
                        data-title="Περιεχόμενο" 
                        data-message="{{ $part_text->content }}">
                            {{ getFirstWords($part_text->content, 30) }}
                    </a>                    
                </td>
                <td>
                    @foreach ($part_text->companyCategory as $companyCategory)
                        {{ $companyCategory->type }}
                    @endforeach
                </td>
	            <td>
                    @foreach ($part_text->languages as $language)
                        <img src="{{ $language->icon }}" class="center-block" width="24" height="24" title="{{ $language->id }}" alt="{{ $language->id }}">                        
                    @endforeach
                </td>	            
	            <td style="text-align:center">
	            	<a href="{{ url('', ['parts_text','edit', $part_text->id]) }}" class="btn btn-sm btn-info" style="margin-right:10px;" title="Επεξεργασία"><i class="fa fa-lg fa-edit"></i></a>
	            	<form class="delete form-inline" method="POST" role="form"
                          action="{{ url('', ['parts_text', $part_text->id]) }}" style="display:inline">
                        
                        <input type="hidden" name="_method" value="DELETE">
        				<input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <button type="button" class="btn btn-sm btn-danger" title="Διαγραφή"
                        		data-toggle="modal" 
                        		data-target="#confirmDelete" 
                        		data-title="Διαργαφή Κειμένου" 
                        		data-message="Είσαι σίγουρος(η) για την διαγραφή του κειμένου?">
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

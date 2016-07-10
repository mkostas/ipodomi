@extends('layouts.master')

@section('content')
	
<h1>Τμήματα αίτησης <a href="{!! url('/parts_categories/create') !!}" class="btn btn-sm btn-success">Προσθήκη</a></h1>


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

<ul style="list-style:none;">
    @foreach ($parts_categories as $parent)                            
        @if ($parent->children->count())
            <li style="list-style:none;">
                <a href="{{ url('', ['parts_categories', $parent->id]) }}" class="btn btn-xs btn-info" style="margin-right:10px;" title="Επεξεργασία">{{ $parent->name }}</a>                
                <ul style="list-style:none;">
                    @foreach ($parent->children as $child)                                            
                        @if ($child->children->count())
                            <li style="list-style:none; margin-top:10px;">
                                <a href="{{ url('', ['parts_categories', $child->id]) }}" class="btn btn-xs btn-warning" style="margin-right:10px;" title="Επεξεργασία">{{ $child->name }}</a>                                
                                <ul style="list-style:none;">
                                    @foreach ($child->children as $child)
                                        <li style="list-style:none; margin-top:10px;">
                                            <a href="{{ url('', ['parts_categories', $child->id]) }}" class="btn btn-xs btn-success" style="margin-right:10px;" title="Επεξεργασία">{{ $child->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li style="list-style:none; margin-top:10px;">
                                <a href="{{ url('', ['parts_categories', $child->id]) }}" class="btn btn-xs btn-warning" style="margin-right:10px;" title="Επεξεργασία">{{ $child->name }}</a>
                            </li>
                        @endif                                            
                    @endforeach
                </ul>
            </li>
            <hr>
        @else
            <li style="list-style:none; margin-top:10px;">
                <a href="{{ url('', ['parts_categories', $parent->id]) }}" class="btn btn-xs btn-info" style="margin-right:10px;" title="Επεξεργασία">{{ $parent->name }}</a>
            </li>
            <hr>
        @endif                            
    @endforeach
</ul>

@endsection

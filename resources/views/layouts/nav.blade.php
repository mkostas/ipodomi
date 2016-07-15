<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{!! url('/') !!}">
            <img src="{{ URL::asset('assets/images/logo2.png') }}">
            </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="">
                    <a href="{!! url('/') !!}">
                        <i class="fa fa-graduation-cap"></i>&nbsp; Σχολεία
                    </a>                    
                </li>
                <li class="">
                    <a href="{!! url('/email') !!}">
                        <i class="fa fa-envelope"></i>&nbsp; Emails
                    </a>                                    
                </li>
                <li class="menu-item dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-clipboard"></i>&nbsp; Τμήματα Αίτησης <span class="caret"></span></a>
                    <ul class="dropdown-menu">

                        @foreach ($parts_categories as $parent)                            
                            @if ($parent->children->count())
                                <li class="menu-item dropdown dropdown-submenu"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">{{ $parent->name }}</a>
                                    <ul class="dropdown-menu">
                                        @foreach ($parent->children as $child)                                            
                                            @if ($child->children->count())
                                                <li class="menu-item dropdown dropdown-submenu"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">{{ $child->name }}</a>
                                                    <ul class="dropdown-menu">
                                                        @foreach ($child->children as $child)
                                                           <li><a href="{{ url('/parts_text', $child->id) }}">{{ $child->name }}</a></li>
                                                            
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @else
                                                <li class="menu-item"><a href="{{ url('/parts_text', $child->id) }}">{{ $child->name }}</a></li>
                                            @endif                                            
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                <li class="menu-item"><a href="{{ url('/parts_text', $parent->id) }}">{{ $parent->name }}</a></li>
                            @endif                            
                        @endforeach

                    </ul>                  
                </li>
                <li class="menu-item dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-sitemap"></i>&nbsp; Οργανωτικό τμήμα <span class="caret"></span>
                    </a> 
                    <ul class="dropdown-menu">
                        <li><a href="{!! url('/letters_of_intent') !!}">Letter of Intent</a></li>                                               
                        <li><a href="{!! url('/company') !!}">Εταιρείες για Πρακτική</a></li>
                    </ul>                  
                </li>
                <li class="menu-item dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-files-o"></i>&nbsp; Αρχεία <span class="caret"></span>
                    </a> 
                    <ul class="dropdown-menu">
                        <li><a href="{!! url('/completed_applications') !!}">Ολοκληρωμένες Αιτήσεις</a></li>
                        <li><a href="{!! url('/submitted_applications') !!}">Υποβληθείσες Αιτήσεις</a></li>
                        <li><a href="{!! url('/instructions') !!}">Οδηγίες</a></li>
                        <li><a href="{!! url('/program_of_activities') !!}">Program of activities</a></li> 
                    </ul>                  
                </li>              
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="menu-item dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-cog"></i>&nbsp; Ρυθμίσεις <span class="caret"></span>
                    </a> 
                    <ul class="dropdown-menu">
                        <li><a href="{!! url('/language') !!}">Γλώσσες</a></li>
                        <li><a href="{!! url('/country') !!}">Χώρες</a></li>
                        <li><a href="{{ url('/parts_categories') }}">Τμήματα αιτήσεων</a></li>
                        <li><a href="{{ url('/company_category') }}">Κατηγορίες εταιριών</a></li>
                    </ul>                  
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
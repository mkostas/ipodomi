<!DOCTYPE html>
<html>
<head>
    <title>Υποδομή | Erasmus</title>
    <!-- Font-Awesome -->
    <!-- <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/font-awesome.min.css') }}" >

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/bootstrap.css') }}">    

    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/dataTables.bootstrap.min.css') }}"/>

    <!-- Select 2 -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/select2.min.css') }}">
    
    <!-- Theme -->
    <link rel="stylesheet" type="text/css" href=" {{ URL::asset('assets/css/style.css') }} "/>

    

</head>
<body>

@include('layouts.nav')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @yield('content')
        </div>
        
            
        </div>
    </div>
</div>
    
    <!-- jQuery -->
    <script src="{{ URL::asset('assets/js/jquery-2.2.4.min.js') }}" crossorigin="anonymous"></script>

    <!-- Bootstrap -->
    <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>

    <!-- Select 2 -->
    <!-- <script src="{{ URL::asset('assets/js/select2.min.js') }}"></script> -->

    <!-- DataTables -->
    <script src="{{ URL::asset('assets/js/jquery.dataTables.js') }}"></script>
    <!-- FileManager -->
    <script src="{{ URL::asset('/vendor/laravel-filemanager/js/lfm.js') }} "></script>

    <script type="text/javascript">
        // Dropdown menu
        $('.dropdown-toggle').dropdown();
        //Confirm delete modal
        $('#confirmDelete').on('show.bs.modal', function (e) {
            $message = $(e.relatedTarget).attr('data-message');
            $(this).find('.modal-body p').text($message);
            $title = $(e.relatedTarget).attr('data-title');
            $(this).find('.modal-title').text($title);

            // Pass form reference to modal for submission on yes/ok
            var form = $(e.relatedTarget).closest('form');
            $(this).find('.modal-footer #confirm').data('form', form);
        });
        $('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
            $(this).data('form').submit();
        });

        // Content modal
        $('#content').on('show.bs.modal', function (e) {
            $message = $(e.relatedTarget).attr('data-message');
            $(this).find('.modal-body p').text($message);
            $title = $(e.relatedTarget).attr('data-title');
            $(this).find('.modal-title').text($title);

            // Pass form reference to modal for submission on yes/ok
            var form = $(e.relatedTarget).closest('form');
            $(this).find('.modal-footer #confirm').data('form', form);
        });
        $('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
            $(this).data('form').submit();
        });

    
        

        // DataTables        
        $(document).ready( function () {            
            // Datatables sort image
            $.extend( $.fn.dataTableExt.oSort, {
                "image-pre": function ( a ) {
                    return a.match(/title="([^"]*)"/)
                },
                "image-asc": function ( a, b ) {
                    return ((a < b) ? -1 : ((a > b) ? 1 : 0));
                },
                "image-desc": function ( a, b ) {
                    return ((a > b) ? -1 : ((a < b) ? 1 : 0));
                }
            });

            $('#table').DataTable({
                // "iDisplayLength": 25
            });
            $('#table2').DataTable({
                // "iDisplayLength": 25
                // Sort image
                "aoColumnDefs": [
                    {"aTargets": [ 1 ], "sType": "image" }
                ],
                "aaSorting": [[ 1, "desc" ]] // Column to sort by default
            });

            $('#table3').DataTable({
                // "iDisplayLength": 25
                // Sort image
                "aoColumnDefs": [
                    {"aTargets": [ 2 ], "sType": "image" }
                ],
                // "aaSorting": [[ 1, "asc" ]] Column to sort by default
            });
            $('#table4').DataTable({
                // "iDisplayLength": 25
                // Sort image
                "aoColumnDefs": [
                    {"aTargets": [ 3 ], "sType": "image" }
                ],
                // "aaSorting": [[ 1, "asc" ]] Column to sort by default
            });
            $('#table89').DataTable({
                // "iDisplayLength": 25
                // Sort image
                "aoColumnDefs": [
                    {"aTargets": [ 7,8 ], "sType": "image" }
                ],
                // "aaSorting": [[ 1, "asc" ]] Column to sort by default
            });        
        });

        // FileManager
        $('#lfm').filemanager('file');

        // Error messages timeout
        setTimeout(function() {
            $('#message_tab').fadeOut('fast');
        }, 4000);
    </script>

    <script type="text/javascript">
        // Select with search
        // $(document).ready(function() {
        //     $(".select2").select2();
        // });
    </script>
</body>
</html>





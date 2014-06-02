<div id="page-heading">
    <ol class="breadcrumb">
        <li class='active'><a href="#">Product Overview</a></li>
    </ol>
    <h1>Overview</h1>
</div>


<div class="container overview">
    <div class="row">
        <div class="col-md-12">
            <div class="loading-data"><img src="assets/img/loader.gif" style="margin-right: 3px;" alt="Loading" />Loading</div>
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="example">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        
    </div>
</div> <!-- container -->
<script type='text/javascript' src='assets/plugins/datatables/jquery.dataTables.min.js'></script> 
<script type='text/javascript' src='assets/plugins/datatables/dataTables.bootstrap.js'></script> 
<script>
    $('head').append( $('<link rel="stylesheet" type="text/css" />').attr('href', 'assets/plugins/datatables/dataTables.css') );
    $.get('<?php echo Config::get('service.host'); ?>items', function(data){
        if (data.length > 0) {
            $('.loading-data').remove();
            var count = 1;
            $('.datatable tbody tr').remove();
            $.each(data, function(key, val){
                var tr = $('<tr>');
                var number = $('<td>').html(count);
                var name = $('<td>').html($('<a>').addClass('item-details').attr({'href':'<?php echo url('details/'); ?>/'+val.id}).html(val.name));
                var price = $('<td>').html(val.price);
                $(tr).append(number).append(name).append(price);
                $('.datatables tbody').append(tr);
                count += 1;
            });
            $('.item-details').on('click', function(){
                $('#loading').modal('show');
                $.get($(this).attr('href'), function(html){
                    $('.container.overview').prepend(html);
                    $('#loading').modal('hide');
                    if (typeof init === 'function') {
                        init();
                    }
                })
                return false;
            })
            applyDatatable();
        }
        else{
            $('.datatable tbody tr td').html('No Data');
        }
    },'jsonp');
    
    var applyDatatable = function(){
        $('.datatables').dataTable({
            "sDom": "<'row'<'col-xs-6'l><'col-xs-6'f>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
            "sPaginationType": "bootstrap",
            "oLanguage": {
                "sLengthMenu": "_MENU_ records per page",
                "sSearch": ""
            }
        });
        $('.dataTables_filter input').addClass('form-control').attr('placeholder','Search...');
        $('.dataTables_length select').addClass('form-control');
    }
</script>
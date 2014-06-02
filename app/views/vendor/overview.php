<div id="page-heading">
    <ol class="breadcrumb">
        <li class='active'><a href="#">Vendor Overview</a></li>
    </ol>
    <h1>Overview</h1>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="" class="form-horizontal row-border" id="create_vendor">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Create Vendor</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                          <input type="text" class="form-control" name="name" value="" placeholder="Vendor Name">
                          <div class="input-group-btn">
                            <button type="submit" class="btn btn-info">Create</button>
                          </div>
                        </div>
                    </div>
                </div>
            </form>
            <table class="table table-hover vendor-list">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>API Key</th>
                        <th>Enable</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="loading">
                        <td colspan="5" style="text-align:center;"><img src="assets/img/loader.gif" style="margin-right: 3px;" alt="Loading" />Loading</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        
    </div>
</div> <!-- container -->
<script>
    $('#create_vendor').submit(function(){
        var param = {
            name: $('#create_vendor input[name=name]').val()
        }
        $.post('<?php echo Config::get('service.host'); ?>vendor/create', {'param':JSON.stringify(param)}, function(data){
            if (data.status == 'ok') {
                $(':input','#create_vendor').val('');
                refresh_vendor();
            }
        }, 'jsonp')
        return false;
    })
    
    
    // Get the vendors
    var refresh_vendor = function(){
        $('.vendor-list tbody tr:not(.loading)').remove();
        $('.vendor-list .loading').show();
        $.get('<?php echo Config::get('service.host'); ?>vendor/list', function(data){
            $('.vendor-list .loading').hide();
            if (data.length > 0) {
                var count = 1;
                $.each(data, function(key, val){
                    var tr = $('<tr>');
                    var number = $('<td>').html(count);
                    var name = $('<td>').html(val.name);
                    var api = $('<td>').html(val.api);
                    var enable = $('<td>').html(val.enable);
                    var actions = $('<td>').addClass('actions');
                    var delete_btn = $('<a>').attr({'href':'<?php echo Config::get('service.host'); ?>vendor/delete/'+val.id}).addClass('btn btn-danger').html('Delete');
                    if (val.enable == '1') {
                        var disable_btn = $('<a>').attr({'href':'<?php echo Config::get('service.host'); ?>vendor/disable/'+val.id}).addClass('btn btn-warning').html('Disable');
                    }
                    else
                    {
                        var disable_btn = $('<a>').attr({'href':'<?php echo Config::get('service.host'); ?>vendor/enable/'+val.id}).addClass('btn btn-primary').html('Enable');
                    }
                    $(actions).append(delete_btn).append(disable_btn)
                    $(tr).append(number).append(name).append(api).append(enable).append(actions);
                    $('.vendor-list tbody').append(tr);
                    
                    count += 1;
                })
                $('.actions a').on('click', function(){
                    $.get($(this).attr('href'), function(data){
                        refresh_vendor();
                    },'jsonp')
                    return false;
                })
            }
            else
            {
                $('.vendor-list tbody').append($('<tr>').html($('<td>').attr('colspan', '5').html('No data')))
            }
        },'jsonp')
    }
    refresh_vendor();
</script>
<div id="page-heading">
    <ol class="breadcrumb">
        <li class='active'><a href="#">Category Overview</a></li>
    </ol>
    <h1>Overview</h1>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="" class="form-horizontal row-border" id="create_category">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Create Category</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                          <input type="text" class="form-control" name="name" value="" placeholder="Category Name">
                          <div class="input-group-btn">
                            <button type="submit" class="btn btn-info">Create</button>
                          </div>
                        </div>
                    </div>
                </div>
            </form>
            <table class="table table-hover category-list">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Enable</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="loading">
                        <td colspan="4" style="text-align:center;"><img src="assets/img/loader.gif" style="margin-right: 3px;" alt="Loading" />Loading</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        
    </div>
</div> <!-- container -->
<script>
    var refreshCat = function(){
        var table_name = 'category-list';
        $('.'+table_name+' tbody tr:not(.loading)').remove();
        $('.'+table_name+' .loading').show();
        $.get('<?php echo Config::get('service.host'); ?>categories', function(data){
            $('.'+table_name+' .loading').hide();
            if (data.length > 0) {
                var count = 1;
                $.each(data, function(key, val){
                    var tr = $('<tr>');
                    var number = $('<td>').html(count);
                    var name = $('<td>').html(val.name);
                    var enable = $('<td>').html(val.enable);
                    var actions = $('<td>').addClass('actions');
                    var delete_btn = $('<a>').attr({'href':'<?php echo Config::get('service.host'); ?>category/delete/'+val.id}).addClass('btn btn-danger').html('Delete');
                    if (val.enable == '1') {
                        var disable_btn = $('<a>').attr({'href':'<?php echo Config::get('service.host'); ?>category/disable/'+val.id}).addClass('btn btn-warning').html('Disable');
                    }
                    else
                    {
                        var disable_btn = $('<a>').attr({'href':'<?php echo Config::get('service.host'); ?>category/enable/'+val.id}).addClass('btn btn-primary').html('Enable');
                    }
                    $(actions).append(delete_btn).append(disable_btn)
                    $(tr).append(number).append(name).append(enable).append(actions);
                    $('.'+table_name+' tbody').append(tr);
                    
                    count += 1;
                })
                $('.actions a').on('click', function(){
                    $.get($(this).attr('href'), function(data){
                        refreshCat();
                    },'jsonp')
                    return false;
                })
            }
            else
            {
                $('.'+table_name+' tbody').append($('<tr>').html($('<td>').attr('colspan', '5').html('No data')))
            }
        },'jsonp')
    }
    refreshCat();
</script>
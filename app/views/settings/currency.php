<div id="page-heading">
    <ol class="breadcrumb">
        <li class='active'><a href="#">Setting Currency</a></li>
    </ol>
    <h1>Currency</h1>
</div>


<div class="container">
    <div class="row status">
        <div class="alert alert-dismissable alert-success">
            <strong>Saved!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="" class="form-horizontal row-border" id="save_settings">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Currency</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <select name="currency" id="currency" class="form-control">
                                <option value="">- Select Currency -</option>
                                <option value="MYR">MYR - Malaysian Ringgit</option>
                            </select>
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-info">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        
    </div>
</div> <!-- container -->
<script>
    $('.status').hide();
    $('#save_settings .btn').on('click', function(){
        if($('#currency').val() === '')
        {
            return false;
        }
        $.post('<?php echo Config::get('service.host'); ?>settings', { name:'currency', value:$('#currency').val()}, function(data){
            $('.status').show();
        },'json')
        return false;
    })
</script>
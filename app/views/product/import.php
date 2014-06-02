<div id="page-heading">
    <ol class="breadcrumb">
        <li class='active'><a href="#">Product Import</a></li>
    </ol>
    <h1>Import</h1>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Form Layout</h4>
                </div>
                <div class="panel-body" style="border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-right-radius: 0px; border-bottom-left-radius: 0px;">
                    <h3>Basic Form Elements</h3>
                    <p>Try resizing the window to see how the form adapts at smaller screen sizes!</p>
                    <div class="alert alert-dismissable alert-info log">
                        <strong>Import Log</strong>
                        <div class="status"></div>
                    </div>
                    <br>
                    <form class="form-horizontal">
                        <div class="form-group">
						  	<label for="selector1" class="col-sm-3 control-label">Select Vendor</label>
						  	<div class="col-sm-6">
                                <select name="vendor" id="vendor" class="form-control">
                                    <option value="">General</option>
                                </select>
                            </div>
						</div>
                        <div class="form-group">
                            <label for="json_url" class="col-sm-3 control-label">Import URL</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="json_url" name="json_url" placeholder="URL to import">
                            </div>
                        </div>
                        
                    </form>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="btn-toolbar">
                                <button class="btn-primary btn" id="import_btn">Import</button>
                                <button class="btn-default btn">Back</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        
    </div>
</div> <!-- container -->
<script>
    itemPost = new service.Post({
        url: "<?php echo Config::get('service.host'); ?>item/create",
    })
    
    var set_data;
    var items;
    $('#import_btn').on('click', function(){
        $(this).attr('disabled', 'disabled');
        $('.status .content').html('Downloading JSON');
        $.get($('#json_url').val(), function(data){
            $('.log .status').html('List Retrieved');
            $('.log .status').append($('<br/>')).append(data.name);
            set_data = data;
            items = data.cards;
            postItem(0);
        },'json');
    })
    
    $.get('<?php echo Config::get('service.host'); ?>vendor/list', function(data){
        if (data.length > 0) {
            $.each(data, function(key, val){
                var html = '<option value="'+val.id+'">'+val.name+'</option>'
                $('select#vendor').append(html);
            })
        }
    },'jsonp')
    
    var postItem = function(itemno){
        $('.log .status').html('Saving ' + items[itemno]['name']);
        // Category details
        var category = {}
        category['name'] = set_data['name'];
        category['code'] = set_data['code'];
        category['releaseDate'] = set_data['releaseDate'];
        category['border'] = set_data['border'];
        category['type'] = set_data['type'];
        category['block'] = set_data['block'];
        category_details = 'category_details['+set_data['name']+']';
        var form = {
                        name:items[itemno]['name'],
                        description:'',
                        sku:items[itemno]['multiverseid'],
                        weight: 0,
                        details:JSON.stringify(items[itemno]),
                        price: 0.00,
                        qty: 1,
                        'category[]': new Array('standard', set_data['name']),
                        category_details:JSON.stringify(category),
                        vendor: $('select#vendor').val()
                   }
        if ((itemno+1) === items.length) {
            $('#import_btn').removeAttr('disabled');
            return false;
        }
        itemPost.save(form, function(){ postItem(itemno+1); })
        //itemPost.save(form)
    }
</script>
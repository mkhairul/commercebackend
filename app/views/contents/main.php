<div class="row">
    <div class="menu col-md-4">
        <ul>
            <li class="product">
                <a href="#">Product</a>
                <ul>
                    <li><a href="#">Import</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="main col-md-8">
        <div class="alert alert-info status"><span class="content">Status</span></div>
        <form role="form" id="json_import" method="post" action="<?php echo Config::get('service.host'); ?>item/create" >
          <div class="form-group">
            <label for="json_url">Import Url</label>
            <input type="text" class="form-control" id="json_url" name="json_url" placeholder="">
          </div>
          <button type="button" id="import_btn" class="btn btn-default">Submit</button>
        </form>
        
        <form role="form" id="itemform" method="post" action="<?php echo Config::get('service.host'); ?>item/create" >
          <div class="form-group">
            <label for="item_name">Name</label>
            <input type="text" class="form-control" id="item_name" name="name" placeholder="Enter name">
          </div>
          <div class="form-group">
            <label for="item_desc">Description</label>
            <textarea class="form-control" rows="3" id="item_desc" name="description"></textarea>
          </div>
          <div class="form-group">
            <label for="item_sku">SKU</label>
            <input type="text" class="form-control" id="item_sku" name="sku" placeholder="Enter SKU">
          </div>
          <div class="form-group">
            <label for="item_weight">Weight(kg)</label>
            <input type="text" class="form-control" id="item_weight" name="weight" placeholder="" value="0.1">
          </div>
          <div class="form-group">
            <label for="item_price">Price</label>
            <input type="text" class="form-control" id="item_sku" name="price" placeholder="Enter price" value="0.0">
          </div>
          <input type="hidden" id="item_details" name="details" value="" />
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</div>
<script>
var itemPost;
window.onload = function()
{
    itemPost = new service.Post({
        url: "<?php echo Config::get('service.host'); ?>item/create",
        form: "#itemform"
    })
    
    $.get('<?php echo Config::get('service.host'); ?>category', function(data){
        console.log(data[0])
        $.each(data, function(key, val){
            var html = '<li><a href="<?php echo url('item/categories/'); ?>/'+val.id+'">'+val.name+'</a></li>';
            $('.product ul').append(html);
        })
    },'jsonp')
    
    var set_data;
    var items;
    $('#import_btn').on('click', function(){
        $(this).attr('disabled', 'disabled');
        $('.status .content').html('Downloading JSON');
        $.get($('#json_url').val(), function(data){
            $('.status .content').html('File Retrieved');
            $('.status .content').append($('<br/>')).append(data.name);
            set_data = data;
            items = data.cards;
            postItem(0);
        },'json');
    })
    
    var postItem = function(itemno){
        $('.status .content').html('Saving ' + items[itemno]['name']);
        $('#item_name').val(items[itemno]['name']);
        $('#item_desc').html('-');
        $('#item_sku').val(items[itemno]['multiverseid']);
        $('#item_details').val(JSON.stringify(items[itemno]));
        $('#itemform .categories').remove();
        $('#itemform').append($('<input>').attr({'type':'hidden', 'name':'category[]'}).addClass('categories').val(set_data['name']));
        // Category details
        var category = {}
        category['name'] = set_data['name'];
        category['code'] = set_data['code'];
        category['releaseDate'] = set_data['releaseDate'];
        category['border'] = set_data['border'];
        category['type'] = set_data['type'];
        category['block'] = set_data['block'];
        $('#itemform').append($('<input>').attr({'type':'hidden', 'name':'category_details['+set_data['name']+']'}).addClass('categories').val(JSON.stringify(category)));
        $('#itemform').append($('<input>').attr({'type':'hidden', 'name':'category[]'}).addClass('categories').val('standard'))
        if ((item_no+1) === items.length) {
            return false;
        }
        itemPost.submit(function(){ postItem(itemno+1); })
        //itemPost.submit();
    }
}
</script>
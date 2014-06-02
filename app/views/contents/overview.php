<div class="row">
    <div class="menu col-md-4">
        <ul>
            <li>
                <a href="#">Product</a>
                <ul>
                    <li><a href="<?php echo url('/'); ?>">Back</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="main col-md-8">
        <table class="table item-list">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Name</td>
                    <td>Price</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
</div>
<script>
var itemList;
var id = '<?php echo $id; ?>'
var cat_details;
var set_name = '';
window.onload = function()
{
    /*
    itemList = new service.Items({
        url: "",
        form: ""
    })
    */
    
    $.get('<?php echo Config::get('service.host'); ?>category/'+id, function(data){
        cat_details = data;
        if (data.other) {
            var tmp = JSON.parse(data.other);
            set_name = tmp.code
        }
        
        $.get('<?php echo Config::get('service.host'); ?>item/categories/'+id, function(data){
            var current_no = 1;
            $.each(data, function(key, val){
                var html = $('<tr>')
                            .append($('<td>').addClass('number').html(current_no))
                            .append($('<td>').html($('<a>').attr({'href':'#','style':'opacity:1','title':'<img src="http://mtgimage.com/card/'+val.name+'.jpg" alt="" />'}).addClass('tooltip').html(val.name)))
                            .append($('<td>').html(val.price))
                            .append($('<td>').html('<button type="button" class="btn btn-primary">Update Price</button>'))
                            //.append($('<td>').html($('<img>').attr('src', 'http://mtgimage.com/card/'+val.name+'.jpg')))
                $('.item-list').append(html)
                current_no += 1;
            })
            $('.item-list').before('<button type="button" class="btn btn-primary">Update All Price</button>')
            $('.tooltip').tooltipster({contentAsHTML:true,theme: 'custom-tipster'});
            console.log(data);
        },'jsonp');
    },'jsonp')
}
</script>
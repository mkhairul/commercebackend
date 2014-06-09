<div id="page-heading">
    <ol class="breadcrumb">
        <li class='active'><a href="#">Product New</a></li>
    </ol>
    <h1>Create New Product</h1>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>New Product</h4>
                </div>
                <div class="panel-body" style="border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-right-radius: 0px; border-bottom-left-radius: 0px;">
                    <form class="form-horizontal" id="create">
                        <div class="form-group">
						  	<label for="selector1" class="col-sm-3 control-label">Select Vendor</label>
						  	<div class="col-sm-6">
                                <select name="vendor" id="vendor" class="form-control">
                                    <option value="">General</option>
                                </select>
                            </div>
						</div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Category</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control typeahead categories" name="category[]" placeholder="">
                                <p class="help-block"><a href="#" class="add-category">Add</a> another category</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Name</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="name" placeholder="Item Name">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-sm-3 control-label">Description</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="description" placeholder="Item Description">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Weight</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="weight" value="0.01">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-sm-3 control-label">Quantity</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="qty" value="1">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-sm-3 control-label">SKU</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="sku" value="">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-sm-3 control-label">Price</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="price" value="0.1">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-sm-3 control-label">Enabled</label>
                            <div class="col-sm-6">
                                <div class="checkbox block">
									<label>
										<input type="checkbox" name="enable" value="1"/>
									</label>
								</div>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-sm-3 control-label">Images</label>
                            <div class="col-sm-6">
								<div class="image-container"></div>
								<input type="file" class="form-control images" name="images[]" placeholder="">
								<!--
								<input type="text" class="form-control images" name="imageurl[]" placeholder="Image URL">
								<p class="help-block"><a href="#" class="add-imageurl">Add</a> another image URL</p>
                                <input type="file" class="form-control images" name="images[]" placeholder="">
                                <p class="help-block"><a href="#" class="add-image">Add</a> another image</p>
								-->
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="btn-toolbar">
                                <button class="btn-primary btn" id="save_btn">Save</button>
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
<script type='text/javascript' src='assets/plugins/form-typeahead/bloodhound.min.js'></script> 
<script type='text/javascript' src='assets/plugins/form-typeahead/typeahead.jquery.js'></script> 
<script>
	function handleFileSelect(evt) {
		var files = evt.target.files; // FileList object
		
		// Loop through the FileList and render image files as thumbnails.
		for (var i = 0, f; f = files[i]; i++) {
		
			// Only process image files.
			if (!f.type.match('image.*')) {
				continue;
			}
		
			var reader = new FileReader();
		
			// Closure to capture the file information.
			reader.onload = (function(theFile) {
				return function(e) {
					// Render thumbnail.
					var block = document.createElement('a');
					block.innerHTML = ['<img class="thumb" src="', e.target.result,
								      '" title="', escape(theFile.name), ' - Click to delete"/>'].join('');
					$(block).addClass('image-block').attr({'href':'#', 'title':'Click to remove'});
					$(block).on('click', function(){
						$(this).remove();
						return false;
					})
					var image = {}
					image.data = e.target.result;
					image.filename = theFile.name
					image.size = theFile.size
					console.log(image);
					$(block).append($('<input>').attr({'type':'hidden', 'name':'images[]'}).val(JSON.stringify(image)))
					$('.image-container').append(block);
					$('.images').val("");
				};
			})(f);
		
			// Read in the image file as a data URL.
			var tmp = reader.readAsDataURL(f);
		}
	}
	$('.images').on('change', handleFileSelect);
	
	itemPost = new service.Post({
        url: "<?php echo Config::get('service.host'); ?>item/create",
		form: '#create'
    })
	$('#save_btn').on('click', function(){
		$('#create').submit();
	})
	
	$('.add-image').on('click', function(){
		var input = $('<input>').addClass('form-control images').attr({'type':'file','name':'images[]'})
		$(this).parent().before(input);
		return false;
	})
	
	$('.add-imageurl').on('click', function(){
		var input = $('<input>').addClass('form-control images').attr({'type':'text','name':'imageurl[]', 'placeholder':'Image URL'})
		$(this).parent().before(input);
		return false;
	})
	
	var category_dataset = '';
	$('.add-category').on('click', function(){
		var id = $('.categories').length + 1
		var input = $('<input>').addClass('form-control typeahead categories').attr({'type':'text', 'name':'category[]', 'id':id});
		$(this).parent().before(input);
		attachTypeahead($('#'+id), 'categories', category_dataset);
		return false;
	})
	
    $.get('<?php echo Config::get('service.host'); ?>vendor/list', function(data){
        if (data.length > 0) {
            $.each(data, function(key, val){
                var html = '<option value="'+val.id+'">'+val.name+'</option>'
                $('select#vendor').append(html);
            })
        }
    },'jsonp')
	
	
	var createDataSet = function(data)
	{
		return new Bloodhound({
			datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
			queryTokenizer: Bloodhound.tokenizers.whitespace,
			// `states` is an array of state names defined in "The Basics"
			local: $.map(data, function(datum) { return { value: datum.name }; })
		});
	}
	
	var attachTypeahead = function(el, name, dataset)
	{
		$(el).typeahead(null, {
			name: name,
			source: dataset.ttAdapter(),
			displayKey: 'value'
		});
	}
	
	$.get('<?php echo Config::get('service.host'); ?>categories', function(data){
		category_dataset = createDataSet(data);
		category_dataset.initialize();
		//console.log(dataset);
		attachTypeahead($('.categories'), 'categories', category_dataset);
		/*
		var categories = new Bloodhound({
			datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
			queryTokenizer: Bloodhound.tokenizers.whitespace,
			// `states` is an array of state names defined in "The Basics"
			local: $.map(data, function(datum) { return { value: datum.name }; })
		});
		   
		// kicks off the loading/processing of `local` and `prefetch`
		categories.initialize();
		console.log(categories);
		$('.categories').typeahead(null, {
			name: 'categories',
			source: categories.ttAdapter(),
			displayKey: 'value'
		});
		*/
	},'jsonp');
</script>
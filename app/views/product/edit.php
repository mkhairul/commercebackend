    <div class="row update-product">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Edit Product</h4>
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
								<input type="file" class="form-control images" name="images" placeholder="">
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
                                <button class="btn-default btn cancel-update">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $('.cancel-update').on('click', function(){
                $('.update-product').remove();
            })
        </script>
    </div>
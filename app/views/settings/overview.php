<div id="page-heading">
    <ol class="breadcrumb">
        <li class='active'><a href="#">Settings Overview</a></li>
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
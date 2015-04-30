<div class="container">

    <div class="page-header">
        <h1>Admin - Upload</h1>
    </div>

    <?php $this->loadBlock('admin-nav'); ?>

    <?php if ( isset($this->has_error) && $this->has_error ) : ?>
        <p class="alert alert-danger">An error occurred. Please try again.</p>
    <?php endif; ?>

    <div>
        <form action="/admin/upload_process/" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="csv">CSV</label>
                        <input type="file" name="csv" id="csv" required class="form-control">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Upload</button>
        </form>
    </div>

</div>
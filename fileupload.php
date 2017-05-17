<?php
?>
<form id="phpForm" name="phpForm" method="post" action="studentpicupload.php" enctype="multipart/form-data">
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3>File Upload</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <input type="file" id="file" name="File" />
            </div>
            <div class="col-md-12">&nbsp;</div>
            <div class="col-md-12">
                <img src="<?php echo "images/default.jpg "?>" height="100px" width="100px" />
            </div>
            <div class="col-md-12">
                <input type="submit" id="submit" name="Submit" value="Upload File" class="btn btn-success" />
            </div>
        </div>
    </div>
</div>
</form>
</div>
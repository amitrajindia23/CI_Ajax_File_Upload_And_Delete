<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css';?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap-responsive.min.css';?>">
	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-1.11.2.min.js';?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-migrate-1.2.1.min.js';?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.min.js';?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/ajax-file-upload-delete.js';?>"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<h1>File Upload</h1>
			<hr>			
			<div class="col-sm-8">
				<form name="file-upload" id="file-upload" action="javascript:void(0);" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="file-name">File Name</label>
						<input type="text" id="file-name" name="file-name" class="form-control">
					</div>
					<div class="form-group">
						<label for="file">File</label>
						<input type="file" id="userfile" name="userfile">
					</div>
					<div class="form-group">
						<input type="submit" name="file-upload" id="file-upload" class="btn btn-primary" value="upload">
					</div>
				</form>
				<div class="form-group">
					<?php 
						if($message != ''){							
					?>
						<h3><?php echo $message; ?></h3>
					<?php
						}
					?>
				</div>
				<span id="error"></span>
			</div>			
		</div>
		<div class="row">
			<div class="col-lg-12 table-responsive" id="file-list-div">
                <table class="table table-hover" id="file-list-table">
                    <thead style="background-color:black; color:white;">
                        <tr>
                            <th>Id</th>
                            <th>File Name</th>
                            <th>File</th>
                            <th>Status</th>
                            <th>Updated</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                        <tbody id="file_list_table_body">
                            <?php 
                                foreach ($fileList as $key => $value) {
                            ?>
                                <tr id="rowId_<?php echo $value['id']; ?>">
                                    <td class="id"><?php echo $value['id']; ?></td>
                                    <td class="file_name"><?php echo $value['file_name']; ?></td>
                                    <td class="file_path">
                                        <a href="<?php echo base_url().$value['file_path']; ?>"><?php echo $value['file_name']; ?></a>
                                    </td>
                                    <td class="status"><?php echo $value['status']; ?></td>
                                    <td class="updated_at"><?php echo $value['updated_at']; ?></td>
                                    <td>
                                        <a class="btn btn-danger btn-xs delbutton" data="<?php echo $value['id']; ?>" title="Delete this Item"><i class="glyphicon glyphicon-trash"></i></a>
                                    </td>
                                </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                </table>
            </div>
		</div>
	</div>
</body>
</html>
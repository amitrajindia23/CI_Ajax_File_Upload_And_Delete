/////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////// Ready Function /////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////

function addNewRow(data){
	var newRow = '<tr id="rowId_'+data.id+'">\
                    <td class="id">'+data.id+'</td>\
                    <td class="file_name">'+data.file_name+'</td>\
                    <td class="file_path">\
                        <a href="'+data.file_path+'">'+data.file_name+'</a>\
                    </td>\
                    <td class="status">'+data.status+'</td>\
                    <td class="updated_at">'+data.updated_at+'</td>\
                    <td>\
                        <a class="btn btn-danger btn-xs delbutton" data="'+data.id+'" title="Delete this Item"><i class="glyphicon glyphicon-trash"></i></a>\
                    </td>\
                </tr>';
    return newRow;
}

$(document).ready(function(){
	//File Upload
	$('#file-upload').submit(function(){
		var data = $('#file-upload').serialize();
		$.ajax({
			url: "./upload/fileupload",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
            success:function(result){
            	if(result != 'error'){
            		data = $.parseJSON(result);
	            	var newRow = addNewRow(data);
					$("#file_list_table_body").prepend(newRow).find("tr:first").hide().fadeIn('slow');
            	}
            	else{
            		$('#error').html('Error!')
            	}
            	$('#file-name').val('');
            }
		});
		return false;
	});

	//Delete file
	$('.delbutton').live('click', function(){
		var fileId = $(this).attr('data');
		var data = "deleteFile=&fileId="+fileId;

		$.ajax({
			url: "./upload/deletefile",
			type: "POST",
			data: data,
			cache: false,
			processData: false,
			success:function(result){
				data = $.parseJSON(result);
				if(data.message == 'deleted'){
					$("a[data='"+fileId+"']").closest("tr").fadeOut();
				}
			}
		});
		return false;
	});

});
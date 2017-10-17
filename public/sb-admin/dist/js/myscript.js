$('#browse').on('click', function(){
	$('#fImage').click();
});

var openFile = function(event) {
	var input = event.target;

	var reader = new FileReader();
	reader.onload = function(){
		var dataURL = reader.result;
		var output = document.getElementById('myAvatar');
		output.src = dataURL;

	};
	reader.readAsDataURL(input.files[0]);
};
$('#browse1').on('click', function(){
	$('#fImage').click();
});
var openFile1 = function(event) {
	var input = event.target;

	var reader = new FileReader();
	reader.onload = function(){
		var dataURL = reader.result;
		var output = document.getElementById('myImageUp');
		output.src = dataURL;
	};
	reader.readAsDataURL(input.files[0]);
};


$("#flash_msg, #errors_msg, #myFlash, #myErrors ").delay(5000).fadeOut();

function confirmMsg(msg)
{
	return window.confirm(msg);
}



$(document).ready(function(){
	var check = 0;
	$('a#btnDelImg').click(function(){
		$('#delImg').remove();
		check = 1;
	});

	// if(check == 1)
	// {
	// 	$('#btnEdit').click(function(){

	// 	// 
	// 	var url = "http://booksharing.com/admin/news/delimg/";
	// 	var _token = $("form[name='formEditNews']").find("input[name='_token']").val();
	// 	var idNews = $(this).parent().find("input").attr("idNews"); // 4
	// 	// var urlImg = $(this).parent().find("img").attr("src"); //uploads news 1/ sss
	
	// 	$.ajax({
	// 		url: url + idNews,
	// 		type: 'GET',
	// 		cache: false,
	// 		data: {
	// 			// "_token": _token,
	// 			// "idNews": idNews,
	// 		},
	// 		success: function(data)
	// 		{
	// 			if(data != "success")
	// 			{
	// 				alert('Error ! Please contact admin !');
	// 			}
	
	// 		}
	// 	});
	// });
	// }
});

$(document).ready(function(){
	$('#btnDelImg').click(function(){
		$('#insertChooseImage').append('<input  type="file" name="fImage" id="fImage" required accept="image/*">');
	});
});

function checkTypeImage(){
	var type = $('#fImage').val().split('.').slice(-1);
	if(type == "png" || type == "jpg" || type == "PNG" || type == "JPG"
		|| type == "JPGE" || type == "jpge"){
		return true;
}
$('#errors').css('display', 'block');
$('#errors').text('Vui lòng chọn ảnh có loại là .jpg, jpge, .png !');
$('#errors').delay(5000).fadeOut();
return false;
}
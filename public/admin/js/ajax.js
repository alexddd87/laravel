
	
///////////////Sort
$(".tb_sort").tableDnD({
	onDragClass:"hover"
});
$(document).on('mouseup', ".move",function(){
	var id = $(this).parent().parent().attr('id');
	sortA(id);
});

///////Active
$(document).on('click', '.active_status', function()
{
	var tb=$("#action").val();
	var tb2=$("#action2").val();
	var id=$(this).attr('id');
	var dataString = 'id='+id+'&tb='+tb+'&tb2='+tb2;
	$.ajax({type:"POST",url:"/admin/ajax/active",dataType:'json', data:dataString,cache:false,success:
	function(data)
	{
		if(!data.access)$('#'+id).html(data.active);//alert(tb);
		$('#message').html(data.message);
		autoHide();
	}
});});

/////search
x = '';
$(document).on('keyup', "#gs_text", function(e) {
	clearTimeout(x);
	//alert(e.which);

	if ($(this).val().length > 1)
	{
		var word = $(this).val();
		x = setTimeout(function() {
			autosearch(word);
		}, 300);
	}
	else
		$('#results_search').css('display', 'none');
});
$("body").on('click', function() {
	$('#results_search').hide(200);

});

function autosearch(word)
{
	var dataString = 'word=' + word;
	$.ajax({type: "POST", url: "/admin/ajax/search", data: dataString, cache: false, success: function(data)
	{
		$('#results_search').html(data);
		$('#results_search').show(200);
	}});
}
function sortA(id)
{
	var tb=$("#action").val();
	var tb2=$("#action2").val();
	
	if(id=='load_price')
	{
		tb2='price';
		$('.price_config').remove();
	}
	var arr=$(".tb_sort").tableDnDSerialize();
	var dataString = 'arr='+arr+'&tb='+tb+'&tb2='+tb2;//alert(dataString);
	$.ajax({type: "POST",url: "/admin/ajax/sort",dataType:'json',data: dataString,cache: false,success:function(data){$('#message').html(data.message);autoHide();}});
}



var BASE_URL = "/admin/";

$(document).on('click', '.save_or_create', function(){
	updateCkeditor();
	console.log($(this).parents('form.save_or_create_form'));
	var form = $(this).parents('form.save_or_create_form');
	var type = $(this).attr('name');

	save_or_create(form, type);

	return false;
});

function save_or_create(form, type)
{
	var data = form.serializeArray();
	var module = form.find('[name=module]').val();
	var method = 'POST';
	var url = BASE_URL + module;

	if (type == 'save' || type == 'save_and_close') {
		var id = $('[name=id]').val();
		method = 'PUT';
		url += '/' + id;
	}

	$.ajax({
		type: method,
		url: url,
		data: data,
		statusCode: {
			200: function(response) {
				statusCode200(response, type, module);
			},
			403: function() {
				statusCode403();
			},
			422: function(response) {
				statusCode422(response);
			},
			500: function() {
				statusCode500();
			}
		}
	}, "json");
}

function statusCode200(response, type, module)
{
	var redirect = false;
	if (type == 'create_and_open') {
		redirect = BASE_URL + module + '/' + response.id + '/edit';
	} else if (type == 'save_and_close') {
		redirect = BASE_URL + module;
	}

	if (response.status == 1) {
		toastr.success(response.message);
	} else {
		toastr.error(response.message, 'Ошибка!');
	}

	if (redirect) {
		window.location.href = redirect;
	}
}

function statusCode403()
{
	toastr.error('У вас нет прав доступа для этого действия!', 'Ошибка!');
}

function statusCode422(response)
{
	response = JSON.parse(response.responseText);
	$.each(response, function(index, value){
		toastr.error(value, 'Ошибка!');
	});
}

function statusCode500()
{
	toastr.error('Ошибка на сервере, обратитесь к системному администратору!', 'Ошибка!');
}

function updateCkeditor()
{
	tinyMCE.triggerSave();
}

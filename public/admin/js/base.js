$(document).ready(function(){

	$(".showAllParams").on('click',function(){
		var status='';
		if($(this).attr('href')=='show')
		{
			$('.params_group div').show(200);
			status='show';
		}
		else{
			$('.params_group div').hide(200);
			status='hide';
		}

		$(".params_group").each(function(){
			var id=$(this).children('div').attr('id');
			$.cookie(id, status);
		});

		return false;
	});

	$('#content_basic textarea').autoResize();

	if($('.cm-calendar').length>0)
	{
		$('.cm-calendar').appendDtpicker({
			"dateFormat": "YYYY-MM-DD hh:mm",
			"locale": "ru"
		});
	}


	///display active tab
	var tab=$.cookie('active_tab');
	if($('#'+tab).length>0)
	{
		$(".cm-js").removeClass('cm-active');
		$('#'+tab).addClass('cm-active');
		$('.cm-tabs').addClass('hidden');
		$('#content_'+tab).removeClass('hidden');
	}


	$(".cm-check-changes").delegate(":input", "change", function(){
		$(".cm-check-changes").addClass('tb_was_change');
	});

	$(".extra-tools .cm-confirm").on('click', function(){
		$(".cm-check-changes").removeClass('tb_was_change');
		window.onbeforeunload =false;
	});
	$(".cm-check-changes").on('submit', function(){
		$(".cm-check-changes").removeClass('tb_was_change');
		window.onbeforeunload =false;
	});
	$(".extra-tools .cm-confirm").on('click', function(){
		$(".cm-check-changes").removeClass('tb_was_change');
		window.onbeforeunload =false;
	});

	$(".tb_was_change :input").on("change", function(){
		window.onbeforeunload = function(){
			return "Are you sure you wish to leave this delightful page?";
		}
	});

	if($('.cm-active.hidden_li').length>0)$(".hidden_li").show();

	$(".see-all").on('click', function(){
		if($(".hidden_li").css('display')=='none')
		{
			$(".hidden_li").show();
			$(this).html('Скрыть ...');
		}
		else{
			$(".hidden_li").hide();
			$(this).html('Показать все ...');
		}
	});


	$("div").parent(".lBlock");

	$('.cm-external-focus').on('click', function(){
		var id = $(this).attr('rev');
		$('#'+id).focus();
	});

	$('.check_all').click(function(){
		$('.check-item').attr('checked', true);
		$('.check_all2').attr('checked', true);
	});

	$('.check_all2').click(function(){//alert($('.check').attr('checked'));
		if($('.check-item').attr('checked')=='checked')$('.check-item').attr('checked', false);
		else $('.check-item').attr('checked', true);
	});

	$('.uncheck_all').click(function(){
		$('.check-item').attr('checked', false);
		$('.check_all2').attr('checked', false);
	});

	$('input[type=checkbox]').on('click', function(){//alert($('.check').attr('checked'));
		var id=$(this).attr('id');
		var cl=$(this).attr('class');

		if(id!='')
		{
			if($(this).attr('checked')=='checked')$('.'+id).attr('checked', true);
			else $('.'+id).attr('checked', false);
		}

		if(cl!='')
		{
			if($(this).attr('checked')=='checked')$('#'+cl).attr('checked', true);
		}
	});

	$('.cm-save-and-close').click(function(){
		var action = '/admin/'+$('#action').val();
		$('form[name=page_update_form]').attr('action', action);
	});

	$("#ajax_loading_box").ajaxStart(function(){
		$(this).show();
	});

	$("#ajax_loading_box").ajaxStop(function(){
		$(this).hide();
	});

	$(".cm-js").on('click', function(){
		var id2=$(this).attr('id');
		var id='content_'+id2;

		$('.cm-js').removeClass('cm-active');
		$(this).addClass('cm-active');


		$('.cm-tabs').addClass('hidden');
		$('#'+id).removeClass('hidden');
		$.cookie('active_tab', id2);
	});

	$('#sw_select_RU_wrap_').click(function(){
		if($('#select_RU_wrap_').css('display')=='block')$('#select_RU_wrap_').css('display', 'none');
		else $('#select_RU_wrap_').css('display', 'block');
	});

	$(".notification-content").on('click', function(){
		var id = $(this).attr('id').split('_')[1];
		closeNotification(id, false);
	});

	checkCompareItems();
	$("#startcompare").on('click', function() {
		checkCompareItems();
	})
});


$(".cm-confirm").on('click', function(){
	return  confirm('Вы уверены что хотите удалить данную запись?');
});


function checkCompareItems() {
	if ($("#startcompare").is(":checked"))
		$("#compare_wrapper").show();
	else
		$("#compare_wrapper").hide();
}
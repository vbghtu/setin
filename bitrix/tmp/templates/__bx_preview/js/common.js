/*
 * Theme     : Starting markup template;
 * Developer : Oleg Demkovych;
 * Company   : Teil;
 */

function rew(){
	
	$predel = $('.recommendations .item img').length - 1;
	$index = $('.recommendations .item img:visible').index();
	$('.recommendations .item img img').hide();
	
	if ($index == $predel){
		$('.recommendations .item img img').eq(0).show();	
	}else{
		$('.recommendations .item img img').eq($index+1).show();
	};
	}
	
function start(){
		id=setInterval('rew()',5000);
	}	 


$(document).on('ready', function () {
	
	$(function() 
	{
		 $(".Vwidget  .VjCarouselLite").jCarouselLite({
			btnNext: ".Vwidget .down",
			btnPrev: ".Vwidget .up",
			vertical:false,
			visible: 4,
			auto: 3000, 
			speed: 500,
			circular: true
		 });
	
	});

	$(function() 
	{
		 $(".Vwidget .VjCarouselLite_proj").jCarouselLite({
			btnNext: ".Vwidget .down_proj",
			btnPrev: ".Vwidget .up_proj",
			vertical:false,
			visible: 4,
			/* auto: 5000, */
			speed: 500,
			circular: true
		 });
	
	});
		
		if ($.browser.msie && $.browser.version == 10) {
		  $("html").addClass("ie10");
		}
		if ($.browser.mozilla && $.browser.version > 10) {
		  $("html").addClass("ie10");
		}

	
	

$(function()
{
	
	$('#dialog .form-wrap .form-button').click(function()
	{
		var data="";
		var errors=false;

		$("#dialog input[type=text]").each(function()
		{
			if($(this).val()=="")
			{
				$(this).addClass('error');
				errors=true;
			}
			else
			{
				$(this).removeClass('error');
				errors=false;
			}
			data+="&"+$(this).attr("name")+"="+$(this).val();
		});

		$("#dialog textarea.form-textarea").each(function()
		{			
			data+="&"+$(this).attr("name")+"="+$(this).val();
		});
		
		if (!errors)
		{
			$(".load_road").html("<img src='/images/ajax-loader.gif' />");
			$.ajax(
			{
				type: "POST",
				url: "/ajax/add_telefon.php",
				data: data,
				success: function(msg)
				{
					$(".load_road").html(msg);
					$(".form-wrap .form-button").hide();
				}
			});
		}
		return false;
	});


	$('.send-button').click(function()
	{
		var data="";
		var errors=false;

		$("#dialog2 input[type=text]").each(function()
		{
			data+="&"+$(this).attr("name")+"="+$(this).val();
		});

		$("#dialog2 textarea.send-textarea").each(function()
		{			
			data+="&"+$(this).attr("name")+"="+$(this).val();
		});
		
		if (!errors)
		{
			$(".load_road").html("<img src='/images/ajax-loader.gif' />");
			$.ajax(
			{
				type: "POST",
				url: "/ajax/add_zayavka.php",
				data: data,
				success: function(msg)
				{
					$(".load_road").html(msg);
					$(".form-wrap .send-button").hide();
				}
			});
		}
		return false;
	});

});

		$("#content .triggers a").click(
			function(){
				id = $(this).attr('id');
				$("#content .products_blocks > div").removeClass('active');
				$("#" + id + '_block').addClass('active');
				$("#content .triggers a").removeClass('active');
				$(this).addClass('active');
                if (id == "plan")
                    $('.zoomContainer').show();
                else
                    $('.zoomContainer').hide();
				return false;
			}
		);
        
/*		$("#content .fasad .previews a").click(
			function(){
				src = $(this).find('.smi1').attr('src');
				src2 = $(this).find('.smi2').attr('src');
				
				$(".mim1").attr('src', src);

				$(".mim2").attr('src', src2);
				
				$("#content .fasad .previews a").removeClass('active');
				$(this).addClass('active');

				src3 = $('.mim1').attr('src');
				$(".main_img_a1").attr('href', src3);

				src4 = $('.mim2').attr('src');
				$(".main_img_a2").attr('href', src4);

				return false;
			}
		);*/


});
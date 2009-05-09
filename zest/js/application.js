var selected_image;

var BASE_URL = "/";

function thickbox(title, url, width, height, type, is_modal){

tb_show(title, ((type == "inline")?'#TB_inline?':(url + ((url.indexOf('?') != -1)?"&":"?"))) + 'KeepThis=true' + ((type == "iframe" || !type)?'&TB_iframe=true':'') + '&height=' + height + '&width=' + width + ((type == "inline")?'&inlineId=' + url:'') + '&modal=' + ((is_modal)?'true':'false'), false);
}

function change_status(id,model) {
	url = BASE_URL+'admin/change_status/'+model+'/'+id
	$.get(url);
	if ($('#status_'+id).parents("li").hasClass('published')) {
		$('#status_'+id).css('color','red');
		$('#status_'+id).html('Unpublished');
		$('#status_'+id).parents("li").addClass('unpublished');
		$('#status_'+id).parents("li").removeClass('published');
	}
	else {
		$('#status_'+id).css('color','green');
		$('#status_'+id).html('Published');
		$('#status_'+id).parents("li").addClass('published');
		$('#status_'+id).parents("li").removeClass('unpublished');
	}

	return false;
}

function select_image(image_id) {
	$("#image_"+selected_image).css("border-color","#dddddd")
	$("#edit_image").show();
  	$("#edit_image_form").hide();
  	
  	
  	
  	src = $("#image_link_"+image_id).attr("href");
  	
  	
  	text = "<p>url: "+src+'</p>';
  	
  	arr = src.split('/');
  	
  	
  	filename = arr[arr.length - 1];
  	if (arr[1] != "assets")
  		extra = extra + arr[1];
  	text = text+'<p>thumbnail: '+BASE_URL+'image/crop/100/100/'+filename+'</p>';
  	text = text+'<p>crop: '+BASE_URL+'image/crop/{WIDTH}/{HEIGHT}/'+filename+'</p>';
  	text = text+'<p></p><p>To turn an image into a thickbox you must give the image a link and point it to the main url. Then assign a class of \'<u>thickbox</u>\' to the link.</p><p style="font-weight:normal;font-style:italic;">We suggest you have two windows open to make this process easier.</p>';
  	
  	
	$("#image_url").html(text);
	if (image_id == selected_image) {
		selected_image = null;
		$("#image_url").html("");
		return false;
	}
	
	selected_image = image_id
	$("#image_"+image_id).css("border-color","#27AAE1")
	return false;
}



function edit_image() {
	if (!selected_image) {
		alert("You must first select an image to edit");
		return false;
	}
	url = BASE_URL+'admin/media/get_name/'+selected_image;
	
	$("#edit_image").html('Please Wait');
	$.get(url, function(data){
		data = jQuery.trim(data);
		data = data.split('{}');
		id = data[0];
		name = data[1];
		category = data[2];
	
  		$("#edit_image_title").attr("value",name);
  		$("#edit_image_category").attr("value",category);
  		$("#edit_image_id").attr("value",id);
  		$("#edit_image").hide();
  		$("#edit_image_form").show();
  		$("#edit_image").html('Edit Image');
	});
	return false;
}

function delete_image() {
	if (!selected_image) {
		alert("You must first select an image to delete");
		return false;
	}
	url = BASE_URL+'admin/media/delete/'+selected_image;
	$.post(url);
	$("#image_link_"+selected_image).hide();
	success("The image has been deleted");
	selected_image = null;
	return false;
}

function preview_image() {
	if (!selected_image) {
		alert("You must first select an image to preview");
		return false;
	}
	title = $("#image_link_"+selected_image).attr("title");
	url = $("#image_link_"+selected_image).attr("href");
	thickbox(title, url);
	return false;
}

$(document).ready(function(){
/*		 $(".valid_form").validate({
		 	 onfocusout: true,
			 success: "valid"
		 });
*/		 
		 $(".media_category_complete").autocomplete(BASE_URL+"admin/media/get_categories", {});


		$("#topNav li a").corner('top 5px');
		$("ul.nav.subnav li a").corner('top 10px');
		$(".content").corner('bottom 20px');
		$(".hide").hide();
	    $("ul.tabs").tabs();
		$('.date-pick').datePicker().trigger('change');
		$('.date-picker').dpSetSelected($('.date-pick').attr('value'));		
		$('#pages').ajaxSortable({
			url: '/admin/pages/changeOrder',
			accept: 'page',
			result : function (result) {
				if (result.toString() == "")
					success("The new page display order has been saved.");
				else 
				   	error(result);
			}
		});
		$('.ajax-button').each(function() {			
			$(this).click(function() {
				url = $(this).attr('href');
				action_type = $(this).attr('rel');
				div = $(this).parent().parent();
				html = $(this).html();
				$(this).html('<img src="/zest/img/ajax-loader.gif" />');
				
				
				if (action_type == 'delete') {
					if (!confirm('Are you sure?')) {
						$(this).html(html);
						return false;
					}
				}
				
				$.getJSON(url,function(json){
					if (json.errors == 0) {
						success(json.message);
						switch(action_type) {
							case 'delete' :
								div.slideUp();
								
								break;
						
						}	
						
					}
					else
						error(json.error_message);
  			//		alert("JSON Data: " + json.users[3].name);
				});

				return false;
			}); 
		});
});
	
	function toUrl(e,div,toDiv) {
		if (toDiv) {
			title = $("input[name='"+div+"']").val();			
			x = '';
			while (x != title) {
				x = title
				title = title.replace(' ','-');
			}
			title = escape(x);
			$("input[name='"+toDiv+"']").val(title);
		}
	}
	
	function hideMessages() {
		$("#confirm").fadeTo(10000, 1).hide(2000);
		$("#warning").fadeTo(10000, 1).hide(2000);
		$("#error").fadeTo(10000, 1).hide(2000);		
		
	}
	
	function alert(string) {
		$("#warning").show();
		$("#warning").html(string);
		hideMessages();
	}
	
	function error(string) {
		$("#error").show();
		$("#error").html(string);
		hideMessages();
	}
	
	function success(string) {
		$("#confirm").show();
		$("#confirm").html(string);
		hideMessages();
	}


function scan_site() {
	url2 = $('#profile_url').val();
	url = "/admin/profiles/scan";
	
	$('#profile_form').html("<p>Please wait. This could take fucking ages</p>");
	
	$.post(url, { url: url2 },
	  function(data){
	    
	    profiles = data.profiles;
	    feeds = data.feeds;
	    console.log(data);
		html = "<h2>I come bearing gifts</h2>";
		html += "<h3>I have found the following profiles:</h3>";
		html += "<ul>";
		
		for(i=0;i < profiles.length;i++) {
			html += "<li id='profile_"+profiles[i].id+"'><span style='float:right'><a onclick='$('#profile_"+profiles[i].id+"').hide();return false;' class='ajax' href='/admin/profiles/activate/"+profiles[i].id+"'>activate</a></span><img src='"+profiles[i].favicon+"' />"+profiles[i].url+"</li>";
		}
		
		html += "</ul>";
		
		html += "<h3>I have found the following feeds:</h3>";
		html += "<ul>";
		
		for(i=0;i < feeds.length;i++) {
			html += "<li id='feed_"+feeds[i].id+"'><span style='float:right'><a onclick='$('#feed_"+feeds[i].id+"').hide();return false;' class='ajax' href='/admin/feeds/activate/"+feeds[i].id+"'>activate</a></span><img src='"+feeds[i].favicon+"' /><a href='"+feeds[i].url+"' target='_BLANK'>"+feeds[i].title+"</a></li>";
		}
		
		html += "</ul>";	    
	    
	    $('#profile_form').html(html);
	    
	    $('a.ajax').each(function() {
	    	$(this).click(function() {
	    		url = $(this).attr('href');
	    		$.get(url);
	    		return false;
	    	})
	    });
	  }, "json");
	return false;
	
}
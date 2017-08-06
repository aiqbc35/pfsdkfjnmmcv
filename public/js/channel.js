
$(document).ready(function () {
					 "use strict";
$('.top-bar-upload .admin-name').on('click',function() {
			if($('.hidden-menue2').hasClass('gayab'))
			{
				$('.hidden-menue2').addClass('nazar').removeClass('gayab');
			}
			else
			{
			   $('.hidden-menue2').addClass('gayab').removeClass('nazar');
			}
		  });	
		  
		$('.hidden-menue2 li').on('click',function() {
		  var i = $(this).index();
		  $('.load-tabs li.cb')
		  .eq(i)
		  .addClass('active')
		  .siblings()
		  .removeClass('active');
		});	
		  
		  
});	 		  
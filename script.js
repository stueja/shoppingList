$(document).ready(function(){
	 var $window = $(window);

    function checkWidth() {
        var windowsize = $window.width();
        if (windowsize < 736) {
            //if the window is greater than 440px wide then turn on jScrollPane..
            $(".menuPop").css("width", "100%");

            $(".menubar").click(function(){
				$(".menuPop").animate({
					"left":"0%"
				})
				$(".menubar").hide(300);
			});

			$(".menux").click(function(){
				$(".menuPop").animate({
					"left":"-100%"
				});
				// $("#container").toggleClass("menuopen");
				$(".menubar").show(300);
			});
        }
        else{
	        $(".menubar").click(function(){
				$(".menuPop").animate({
					"left":"0%"
				})
				$(".menubar").hide(300);
			});

			$(".menux").click(function(){
				$(".menuPop").animate({
					"left":"-100%"
				});
				// $("#container").toggleClass("menuopen");
				$(".menubar").show(300);
			});
        }
    }
    // Execute on load
    checkWidth();
    // Bind event listener
    $(window).resize(checkWidth);



	$(".ok").click(function(){
		$(".popUps").hide();
	});

	$(".menuPop").height($(window).height())
	$(window).resize(function(){
		$(".menuPop").height($(window).height())
	});

	$("body").height($(window).height())
	$(window).resize(function(){
		$("body").height($(window).height())
	});
		
	$(".titlePencil").click(function(){
		$("#titleEditDiv").slideToggle(200);
		$(".mainListTitle").toggle(200);
	});

	$(".add_item").click(function(){
		$("#add").slideToggle(500);
	});

	$(".fa-pencil").click(function(e){
		e.preventDefault();
		$(this).parents("li").find(".editToggle").slideToggle(500);
		$(this).parents("li").find(".nonedit").toggle();
	});

	$(".add_item").click(function(){
		$(".item_form").slideToggle(500);
	});

	$(".add_list").click(function(){
		$(".list_form").slideToggle(500);
	});


	$(".user_pic").click(function(e){
		e.preventDefault();
		$(".user_info").toggle(300);
		$(".list_info").toggle(300);
	});

	// $(".ok").click(function(){
	// 	$(".search_result").hide();
	// });

	$(".fa-angle-down").click(function(){
		$(this).parents(".atagDrop").find(".atags").slideToggle(500);
	});

	

	

	// setTimeout(function(){
	// 	$("ul").load("edit.php?item_id=20&list_id=1")
	// },3000)


});
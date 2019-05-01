(function ($) {
    "use strict";
    var mainApp = {
        main_fun: function () {
            $('#main-menu').metisMenu();
            $(window).bind("load resize", function () {
                if ($(this).width() < 768) {
                    $('div.sidebar-collapse').addClass('collapse')
                } else {
                    $('div.sidebar-collapse').removeClass('collapse')
                }
            });
        },
        initialization: function () {
            mainApp.main_fun();
        }
    }
    $(document).ready(function () {
        mainApp.main_fun();
    });

}(jQuery));

 $(function() {
	 $("#main-menu   li a").each(function(){
		 if($(this).attr("href")==window.location.href){
			 $(this).css({"background":"#06f","color":"#ffffff"});
		 }
	 });
	 
	 $("#main-menu  ul li a").each(function(){
		 if($(this).attr("href")==window.location.href){
			 $(this).css({background:"#ffffff", color:"#06f"});
			 $(this).parents("ul").prev().css("background","#06f");
		 }
	 });
	 
	 $("#sidebtn").click(function(){
		 logo_manager();
	 })
	 function logo_manager(){
		 if($("#hoe-header").hasClass('hoe-minimized-lpanel')){
			 $("#logo2").css('display','none');
			 $("#logo1").css('display','block');
			 
		 }else{
			 $("#logo1").css('display','none');
			 $("#logo2").css('display','block');
		 }
	 }
	 logo_manager();
 });

;(function ($, window, document, undefined) {

    var pluginName = "metisMenu",
        defaults = {
            toggle: true
        };
        
    function Plugin(element, options) {
        this.element = element;
        this.settings = $.extend({}, defaults, options);
        this._defaults = defaults;
        this._name = pluginName;
        this.init();
    }

    Plugin.prototype = {
        init: function () {

            var $this = $(this.element),
                $toggle = this.settings.toggle;

            $this.find('li.active').has('ul').children('ul').addClass('collapse in');
            $this.find('li').not('.active').has('ul').children('ul').addClass('collapse');

            $this.find('li').has('ul').children('a').on('click', function (e) {
                e.preventDefault();

                $(this).parent('li').toggleClass('active').children('ul').collapse('toggle');

                if ($toggle) {
                    $(this).parent('li').siblings().removeClass('active').children('ul.in').collapse('hide');
                }
            });
        }
    };

    $.fn[ pluginName ] = function (options) {
        return this.each(function () {
            if (!$.data(this, "plugin_" + pluginName)) {
                $.data(this, "plugin_" + pluginName, new Plugin(this, options));
            }
        });
    };

})(jQuery, window, document);


$(function(){
//	table-data manager code
//	var table_height=$(".table-data").height();
//	if(table_height>500){
//		$(".table-data").css({
//			"height":"500px",
//			"overflow-Y":"auto"
//			});
//	}
	$("#toggle_side_menu_show").hide();
//	Toggle SideBar
	$("#toggle_side_menu").click(function(){
		$(".navbar-side").stop(true, false).animate({left: "-245" }, 800);
		$("#page-wrapper").stop(true, false).animate({margin: "0" }, 800);
		$("#toggle_side_menu_show").show();
	});
	
	$("#toggle_side_menu_show").click(function(){
		$(".navbar-side").stop(true, false).animate({left: "0" }, 800),
		$("#page-wrapper").stop(true, false).animate({margin: "0 0 0 200px" }, 800);
		$("#toggle_side_menu_show").hide();
	});
});
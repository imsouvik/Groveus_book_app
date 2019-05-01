//blank line is required
app.controller('ctrl_login',function($scope,$http,$filter){
	$http.get('login/check_valid_session').success (function(data) {if(data!=1){window.location.assign('<?=site_url("login")?>');}});
	
	$scope.save_data=function(){
//		console.log("adad");
		$.ajax({
			type: "POST",
			url: "login/change_password_submit",
			data: $("#form1").serialize(),
			beforeSend: function()
			{
				$('#submitbtn').attr('disabled',true);
				$('#webprogress').css('display','inline');
			},
			success: function(data){
				$('#result').html(data);
				$('#form1').trigger("reset");
				$('#webprogress').css('display','none');
				$('#submitbtn').attr('disabled',false);
			}
		});
	}
});
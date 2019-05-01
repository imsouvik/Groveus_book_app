app.controller('ctrl_user_privileges_master',function($scope,$http){
	$http.get('login/check_valid_session').success (function(data) {if(data.status==0){window.location.assign('<?=site_url("login")?>');}});
	$('#page_loader').css('display','none');
	
	$('#progress').hide();
	$("#btnsubmit").prop('disabled',true);
//	
	$http.get('users/view_data?data=username,user_id').success (function(data) {
			$scope.users=data;
	});
	$http.get('user_privileges/view_privileges_json').success (function(data) {
			$scope.modules=data;
	});
	
	$scope.reset_all=function(){
//		$scope.username="";
		$scope.user="";
		$scope.user_name="";
		$scope.x.status="";
	};
	
	
	$scope.fetch_data=function(id){
		$('#progress').toggle();
		$http.get('user_privileges/view_data?id='+ id).success (function(data) {
				$scope.user=data;
				$('#progress').hide();
		});
		$("#btnsubmit").prop('disabled',false);
	};
	
	$scope.update_data=function(x){
		$("#btnsubmit").text('Please Wait...');
		$("#btnsubmit").prop('disabled',true);
		$("#uprogress").css( 'display' , 'inline');
		$.ajax({
			type: "POST",
			url: "user_privileges/update_data",
			data: $("#form2").serialize(),
			beforeSend: function()
			{
				$('#progress').toggle();
			},
			success: function(data){
				$("#btnsubmit").text('Save');
				$("#btnsubmit").prop('disabled',false);
				$('#progress').toggle();
				var arr = $.parseJSON(data);
				if (arr.type == "1") {
					messages("danger", "Warning!",arr.error, 8000);
				} else {
					setTimeout($scope.unlockwindow, 2000);
					messages("success", "Success!",arr.error, 4000);
				}
			}
		});
	};
	$scope.unlockwindow=function(){
		window.location.reload();
	}
	
	$scope.update_data_other=function(x){
		$.ajax({
			type: "POST",
			url: "other_privileges/update_data",
			data: $("#form3").serialize(),
			beforeSend: function()
			{
				$('#webprogress').css('display','inline');
			},
			success: function(data){
				var arr = $.parseJSON(data);
				if(arr.type=="1")
				{
					$('#error_msg').html(arr.error);
					$('#error_modal').trigger("click");
				}
				else
				{
					setTimeout($scope.unlockwindow, 3000);
					$('#success_msg').html(arr.error);
					$('#alert_modal').trigger("click");
				}
				$('#webprogress').css('display','none');
			}
		});
	};
	
});
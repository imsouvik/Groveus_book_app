//blank line is required
app.controller('ctrl_book_details',function($scope,$http){
	$http.get('login/check_valid_session').success (function(data) {if(data!=1){window.location.assign('<?=site_url("login")?>');}});
	$scope.y={};
	
	$scope.loader=function(){
		$http.get("book_details/view").success(function(data){
			$scope.datadb=data;
		})
	}
	$scope.loader();
	
	$http.get("search_category/view_data").success(function(data){
		$scope.search=data;
	})
	$http.get("supplier/view_data").success(function(data){
		$scope.suppliers=data;
	})
	$http.get("genre/view_data").success(function(data){
		$scope.genre=data;
	})
	$http.get("shelf/view_data").success(function(data){
		$scope.shelf=data;
	})

	
	$scope.filter_new=function(){
		$("#form1").trigger('reset');
		$scope.y={};
	}
	
	$scope.update=function(z){
		$scope.y=z;
	}
	
	$scope.save_data=function(x){
		$('#form1').ajaxForm({
			type: "POST",
			url: "book_details/add",
			beforeSend: function()
			{
				$('#webprogress').css('display','inline');
			},
			success: function(data){
				console.log(data);
				if(data=="1")
				{
					$scope.loader();
					messages("success", "Success!","page Saved Successfully", 3000);
					$scope.filter_new();
				}
				else if(data=="0")
				{
					messages("warning", "Info!","No Data Affected", 3000);
				}
				else
				{
					messages("danger", "Warning!",data, 4000);
				}
				$('#webprogress').css('display','none');
				$('#submitbtn').attr('disabled',false);
			}
		});
	}
	
	$scope.delete_data=function(id)
	{
		if(confirm("Deleting Service may hamper your data associated with it."))
		{
			if(confirm("Are you Sure to DELETE ??"))
			{
				$http.get("plans/delete_data?id="+id).success(function(data){
					if(data=="1")
					{
						messages("success", "Success!","service Deleted Successfully", 3000);
					}
					else
					{
						messages("danger", "Warning!","service not Deleted", 4000);
					}
					$scope.loader();
				})
			}
		}
	}
});
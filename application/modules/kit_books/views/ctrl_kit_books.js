//blank line is required
app.controller('ctrl_kit_books',function($scope,$http){
	$http.get('login/check_valid_session').success (function(data) {if(data!=1){window.location.assign('<?=site_url("login")?>');}});
	$scope.x={};
	$scope.kit_name="";
	$scope.tempLoader=function(){
		$http.get("kit_temp/view_data").success(function(data){
			$scope.tempData=data;
		})
	}
	$scope.addTemp=function(x){
		$http.get("kit_temp/add_data/"+x.book_id+"/"+x.qty).success(function(data){
			$scope.x={};
			$scope.tempLoader();
		})
	}
	$scope.save_data=function(x){
		$http.get("kit_books/add_data?name="+$scope.kit_name).success(function(data){
			console.log(data);
			if(data=="1"){
				messages("success", "Success!","Saved Successfully", 3000);
				$scope.tempLoader();
				$scope.kit_name="";
			}else{
				messages("danger", "Danger!","Error", 3000);
			}
//			$scope.x={};
//			
		})
	}
	
	
	$scope.tempLoader();
	$http.get("book_details/view").success(function(data){
		$scope.books=data;
	})
	
//	$scope.master=function(){
//		$http.get("kit_books/view_data").success(function(data){
//			$scope.datadb=data;
//		})
//	}
//	$scope.master();
////	$http.get("page/view_data?data=page_id,title").success(function(data){
////		console.log(data);
////		$scope.pages=data;
////	})
//	$http.get("book_details/view").success(function(data){
//		$scope.books=data;
//	})
//	
//	
//	$scope.loader();
//	
//	$scope.update_call=function(y){
//		console.log(y);
//		$scope.y=y;
//	}
//	
//	$scope.filter_new=function(){
//		$scope.x={};
//	}
//	$scope.master_new=function(){
//		$scope.m={};
//	}
//	$scope.save_master=function(m){
//		$('#master_form').ajaxForm({
//			type: "POST",
//			url: "kit_books/master_save",
//			beforeSend: function()
//			{
//						$('#masterbtn').attr('disabled',true);
//						$('#webprogress').css('display','inline');
//			},
//			success: function(data)
//			{
//				if(data=="1")
//				{
//					$scope.master();
//					messages("success", "Success!","page Saved Successfully", 3000);
//					//$scope.loader();
//					$scope.master_new();
//				}
//				else if(data=="0")
//				{
//					messages("warning", "Info!","No Data Affected", 3000);
//				}
//				else
//				{
//					messages("danger", "Warning!",data, 4000);
//				}
//				$('#webprogress').css('display','none');
//				$('#masterbtn').attr('disabled',false);
//			}
//		});
//	}
//	
//	
//	$scope.save_data=function(x){
//		$('#master_form').ajaxForm({
//			type: "POST",
//			url: "kit_books/save_data",
//			beforeSend: function()
//			{
//				$('#submitbtn').attr('disabled',true);
//				$('#webprogress').css('display','inline');
//			},
//			success: function(data)
//			{
//				console.log(data);
//				if(data=="1")
//				{
//					$scope.loader();
//					messages("success", "Success!","Saved Successfully", 3000);
////					$scope.loader();
//					$scope.filter_new();
//				}
//				else if(data=="0")
//				{
//					messages("warning", "Info!","No Data Affected", 3000);
//				}
//				else
//				{
//					messages("danger", "Warning!",data, 4000);
//				}
//				$('#webprogress').css('display','none');
//				$('#submitbtn').attr('disabled',false);
//			}
//		});
//	}
//	
//	$scope.delete_data=function(id)
//	{
//
//		if(confirm("Deleting shelf may hamper your data associated with it."))
//		{
//			if(confirm("Are you Sure to DELETE ??"))
//			{
//				$http.get("kit_books/delete_data?kit_id="+id).success(function(data){
//					console.log(data);
//					if(data=="1")
//					{
//						messages("success", "Success!","Shelf Deleted Successfully", 3000);
//					}
//					else
//					{
//						messages("danger", "Warning!","Shelf not Deleted", 4000);
//					}
//					$scope.loader();
//				})
//			}
//		}
//	}
//	
});
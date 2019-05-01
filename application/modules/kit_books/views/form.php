<div class="heading">
    <ol class="breadcrumb">
      <li><a href="#/">Dashboard</a></li> 
      <li><a href="javascript:void(0)">Create Kit</a></li>
    </ol>
</div>
<style>
.deco
{
font-family: "Times New Roman", Times, serif;
color:#87CEEB;
font-size: 16px;
}
</style>
<div class="col-sm-12 well">
     <div class="col-sm-12">
       <form action="" id="master_form" method="post">
         <input name="kit_id"  ng-model="y.kit_id" hidden>
            <div class="clearfix"></div>
            <div class="col-sm-12">
                <div class="col-sm-6">
                    <label class="deco">Name</label>
                    <input name="kit_name" class="form-control" ng-model="kit_name"   required style="width:400px;">               
                </div>
             </div>
        	<table class="table">
        		<tr>
        			<td>Book</td>
        			<td>Quantity</td>
        			<td>Action</td>
        		</tr>
        		<tr>
        			<td>
        			<select class="form-control" name="book_id" ng-model="x.book_id">
                    	<option value="">Select</option>
           				<option ng-repeat="b in books" value="{{b.b_id}}">{{b.book_name}}</option>
					</select>
        			</td>
        			<td><input name="quantity" class="form-control" ng-model="x.qty" ></td>
        			<td><button type="button" id="addMe" ng-click="addTemp(x)" class="btn btn-success">+</button></td>
        		</tr>
        		<tr ng-repeat="t in tempData">
        			<td>{{t.book_id}}</td>
        			<td>{{t.qty}}</td>
        			<td></td>
        		</tr>
        	
        	</table>
     		
            <div class="clearfix"></div><br>
            <div class="col-sm-12"> 
            <div class="col-sm-4"></div>
               <button type="button" id="submitbtn" accesskey="s" ng-click="save_data(x)" class="btn btn-info"><u><b>S</b></u>ave</button>
               <a class="btn btn-default" accesskey="c" ng-click="filter_new()"><u><b>C</b></u>lear</a>
               <br><br> 
            </div>
        </form>
    </div>

 <?php //include 'data.php';?>
</div>  
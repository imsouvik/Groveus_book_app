<div class="heading">
    <ol class="breadcrumb">
      <li><a href="#/">Dashboard</a></li> 
      <li><a href="javascript:void(0)">Shelf</a></li>
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
       <form action="" id="form1" method="post">
         <input name="k_asgn_id"  ng-model="y.k_asgn_id" hidden>
            <div class="clearfix"></div>
            <div class="col-sm-12">
                <div class="col-sm-6">
                   	<label class="deco">School</label>
            		<select class="form-control" name="school_id" ng-model="y.school_id">
                    	<option value="">Select</option>
           				<option  value="{{s.school_id}}" ng-repeat="s in schools">{{s.school_name}}</option>
					</select>              
				  </div>
                <div class="col-sm-6 ">
                    <label class="deco">Class</label>
            		<select class="form-control" name="class_id" ng-model="y.class_id">
                    	<option value="">Select</option>
           				<option  value="{{c.class_id}}" ng-repeat="c in classs">{{c.class}}</option>
					</select>
                </div>
            </div>
            <div class="clearfix"></div>
               <div class="col-sm-12">
                <div class="col-sm-6 ">
                   	<label calss="deco">Section</label>
            		<select class="form-control" name="section" ng-model="y.section">
                    	<option value="">Select</option>
           				<option  value="{{c.class_id}}" ng-repeat="c in classs">{{c.section}}</option>
					</select>
                </div>
                <div class="col-sm-6 ">
                    <label calss="deco">Kit</label>
            		<select class="form-control" name="kit_id" ng-model="y.kit_id">
                    	<option value="">Select</option>
           				<option  value="{{k.kit_id}}" ng-repeat="k in kits"> {{k.kname}}</option>
					</select>
                </div>
                	
            </div>                                 
            <div class="clearfix"></div><br> 
            <div class="col-sm-12"> 
               <button type="submit" id="submitbtn" accesskey="s" ng-click="save_data(y)" class="btn btn-info"  ng-disabled="form1.$invalid"><u><b>S</b></u>ave</button>
               <a class="btn btn-default" accesskey="c" ng-click="filter_new()"><u><b>C</b></u>lear</a>
               <br><br> 
            </div>
        </form>
    </div>

 <?php include 'data.php';?>
</div>  
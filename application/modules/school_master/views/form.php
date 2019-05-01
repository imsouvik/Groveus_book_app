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
         <input name="school_id"  ng-model="y.school_id" hidden>
            <div class="clearfix"></div>
            <div class="col-sm-12">
                <div class="col-sm-6">
                    <label class="deco">School Name</label>
                    <input name="school_name" class="form-control" ng-model="y.school_name"   required>               
                </div>
                <div class="col-sm-6 ">
                    <label class="deco">Board</label>
                    <input name="board" class="form-control" ng-model="y.board"   required>               
                </div>
            </div>
            <div class="clearfix"></div>
               <div class="col-sm-12">
                <div class="col-sm-6 ">
                    <label class="deco">Address</label>
                    <input name="address" class="form-control" ng-model="y.address"    required>               
                </div>
				<div class="col-sm-3 ">
                    <label class="deco">Email</label>
                    <input name="email" class="form-control" ng-model="y.email"    required>               
                </div>
				<div class="col-sm-3 ">
                    <label class="deco">Phone</label>
                    <input name="phone" class="form-control" ng-model="y.phone"    required>               
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
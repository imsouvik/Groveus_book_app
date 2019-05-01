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
         <input name="shelf_id"  ng-model="y.shelf_id" hidden>
            <div class="clearfix"></div>
            <div class="col-sm-12">
                <div class="col-sm-6">
                    <label class="deco">Shelf Number</label>
                    <input name="shelf_number" class="form-control" ng-model="y.shelf_number"   required style="width:400px;">               
                </div>
                <div class="col-sm-6 ">
                    <label class="deco">Shelf Name</label>
                    <input name="shelf_name" class="form-control" ng-model="y.shelf_name" style="width:400px;"   required>               
                </div>
            </div>
            <div class="clearfix"></div>
               <div class="col-sm-12">
                <div class="col-sm-6 ">
                    <label class="deco">Shelf Row</label>
                    <input name="shelf_row" class="form-control" ng-model="y.shelf_row" style="width:400px;"   required>               
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
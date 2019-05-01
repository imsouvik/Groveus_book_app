<div class="heading">
    <ol class="breadcrumb">
      <li><a href="#/">Dashboard</a></li> 
      <li><a href="javascript:void(0)">Genre</a></li>
    </ol>
</div>

<div class="col-sm-12 well">
     <div class="col-sm-6">
         <form name="form1" id="form1" method="post" action="">
         <input name="genre_id" ng-model="y.genre_id" hidden>
          <div class="clearfix"></div><br>
            <div class="col-sm-12 ">
                <div class="col-sm-6 ">
                    <label class="deco">Genre Name</label>
                    <input name="genre_name" class="form-control" ng-model="y.genre_name"   required style="width:400px;">               
                </div>
             </div>
 			<div class="clearfix"></div><br>
 			<div class="col-sm-12">
 			      <div class="col-sm-6 ">
                    <label class="deco">Description</label>
                    <input name="description" class="form-control" ng-model="y.description"   required style="width:400px;">                    
                   </div>
                </div>
         
            <div class="clearfix"></div>
            <div class="col-sm-12"> 
               <button type="submit" id="submitbtn" accesskey="s" ng-click="save_data(y)" class="btn btn-info"  ng-disabled="form1.$invalid"><u><b>S</b></u>ave</button>
               <a class="btn btn-default" accesskey="c" ng-click="filter_new()"><u><b>C</b></u>lear</a>
               <br><br> 
            </div>
        </form>
    </div>
  <?php include 'data.php';?>
   

</div>
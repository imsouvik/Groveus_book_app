<div class="col-sm-12">
    <div class="col-sm-12 table_horizontal">
		<div class="input-group custom_addon">
            <div class="input-group-addon"  style="box-shadow:none; -webkit-box-shadow:none;"><i class="fa fa-search"></i></div>
				<input type="text" ng-model="search_text" placeholder="Search here...">
			</div>
		</div>
		<div class="table-data">
			<table class="table table-hover">
				<thead>
					<tr class="active">
					      <th>Title</th>
    					 
    					  <th>Date</th>
    					  <th>Time</th>
    					  <th>Logged in User</th>
    					  <th>Timestamp</th>
    					  <th>Object</th>
					</tr>
				</thead>
				<tbody>
				
					<tr dir-paginate="x in datadb | filter: search_text | itemsPerPage: 10" >
					    <td>{{x.data_title}}</td>
						<td>{{x.date}}</td>
						<td>{{x.time}} mins</td>
						<td>{{x.user}}</td>
						<td>{{x.timestamp}}</td>
						<td><button class="btn btn-info btn-xs" ng-click="fetch_log(x.auto_id)">View Data</button></td>
					</tr>
				</tbody>
			</table>
        </div>
        <div class="col-sm-12">
            <dir-pagination-controls boundary-links="true" on-page-change="pageChangeHandler(newPageNumber)" template-url="app/pagination"></dir-pagination-controls>
        </div>
   </div>


<!-- Modal -->
<button type="button" class="btn btn-primary btn-lg" id="modalbtn" data-toggle="modal" data-target="#myModal"style="display: none"/>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="color:black">
	<div class="modal-dialog" role="document">
		<div class="modal-content modal-lg">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
				<h4 class="modal-title" id="myModalLabel"></h4>
			</div>
			
			<div class="modal-body">
				
		    </div>
					
		</div>
	</div>
</div>
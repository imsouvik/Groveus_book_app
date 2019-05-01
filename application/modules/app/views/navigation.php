<style>
.panel-list li ul li {
	padding: 5px 20px 5px 20px;
}
</style>
<div id="hoeapp-container" hoe-lpanel-effect="default">
	<aside id="hoe-left-panel" hoe-position-type="absolute"
		style="height: 50px; overflow: scroll">
		<div class="profile-box">
			<div class="media">
				<a class="pull-left" href="#/home" style="text-decoration: none">
					<div class="media-body">
						<h5 class="media-heading">
							Welcome! <b style="color: #06f"><?=$this->session->userdata('name');?></b>
						</h5>
						<small style="color: #06f"><?php if($this->session->userdata('type')=='A') echo "Administrator"; else echo 'User'?></small>
					</div>
				</a>
			</div>
		</div>
		<ul class="nav panel-list">
			
			<li><a accesskey="h" href="#/home"><i
					class="fa fa-dashboard"></i><span class="menu-text">Das<u><b>h</b></u>board
				</span><span class="selected"></span></a></li>
					
							
		     <li class="sidepadding"><a accesskey="a" href="#/admin_profile"><i
					class="fa fa-edit"></i><span class="menu-text">Admin Profile</span><span
					class="selected"></span></a></li>	 
			
			 <li class="sidepadding"><a accesskey="a" href="#/book_details"><i
					class="fa fa-edit"></i><span class="menu-text">Book Details</span><span
					class="selected"></span></a></li>
			<li class="sidepadding"><a accesskey="a" href="#/kit_books"><i
					class="fa fa-edit"></i><span class="menu-text">Create Kit</span><span
					class="selected"></span></a></li>	 
					
			<li class="sidepadding"><a accesskey="a" href="#/supplier"><i
					class="fa fa-edit"></i><span class="menu-text">Create Supplier</span><span
					class="selected"></span></a></li>	 
					
			<li class="sidepadding"><a accesskey="a" href="#/search_category"><i
					class="fa fa-edit"></i><span class="menu-text">Select Search Ctaegory</span><span
					class="selected"></span></a></li>	 


			<li class="sidepadding"><a accesskey="a" href="#/shelf"><i
					class="fa fa-edit"></i><span class="menu-text">Create Shelf</span><span
					class="selected"></span></a></li>
			
			<li class="sidepadding"><a accesskey="a" href="#/genre"><i
					class="fa fa-edit"></i><span class="menu-text">Create Genre</span><span
					class="selected"></span></a></li>	 

			<li class="sidepadding"><a accesskey="a" href="#/school_master"><i
					class="fa fa-edit"></i><span class="menu-text">School Entry</span><span
					class="selected"></span></a></li>	 
					
			<li class="sidepadding"><a accesskey="a" href="#/class_master"><i
					class="fa fa-edit"></i><span class="menu-text">Class Entry</span><span
					class="selected"></span></a></li>	 
			
			<li class="sidepadding"><a accesskey="a" href="#/kit_assign"><i
					class="fa fa-edit"></i><span class="menu-text">Assign Kit</span><span
					class="selected"></span></a></li>	 
			 
			
			 
		</ul>
	</aside>
	<section id="main-content">
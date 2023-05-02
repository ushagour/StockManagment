 <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">
            <div class="dlabnav-scroll">
				<ul class="metismenu" id="menu">
                 
					<li><a href="{{route("home")}}" class="" aria-expanded="false">
						<i class="fas fa-home"></i>					
					<span class="nav-text">Dashboard</span>
					</a>
				</li>
				@can('asset_access')
					<li>
						<a href="{{route("asset.index")}}" class="" aria-expanded="false">
					<i class="fa-fw fas fa-cogs nav-icon"></i>
						<span class="nav-text">Assets</span>
					</a>
				</li>
				@endcan
				@can('stock_access')

				<li><a href="{{route("stock.index")}}" class="" aria-expanded="false">
					<i class="fas fa-boxes"></i>					
					<span class="nav-text">Stocks</span>
					</a>
				</li>
				@endcan

				@can('transaction_access')

				<li><a href="{{route("transactions.index")}}" class="" aria-expanded="false">
					<i class="fas fa-file-alt"></i>						
					<span class="nav-text">Transactions</span>
					</a>
				</li>
				@endcan

				@admin
				<li><a href="{{route("team.index")}}" class="" aria-expanded="false">
					<i class="fa fa-solid fa-hospital"></i>
						<span class="nav-text">Hospitals</span>
					</a>
				</li>


				<li>

					<a class="has-arrow " href="javascript:void()" aria-expanded="false">
					<i class="fas fa-user-check"></i>
					<span class="nav-text">User Management</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="{{route("roles.index")}}">Roles</a></li>
					<li><a href="{{route("permissions.index")}}">Permissions</a></li>
					<li><a href="{{route("users.index")}}">liste of users </a></li>
				
				</ul>
			</li>
			@endadmin
		

           
                </ul>
			
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

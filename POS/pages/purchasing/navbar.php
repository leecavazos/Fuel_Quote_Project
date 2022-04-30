<!-- Navigation Bar Begins -->
	<div class="sidebar">
		<div class="logo_content">
			<div class="logo">
				<i class='bx bx-money'></i>
				<div class="logo_name">Purchasing</div>
			</div>
			<i class='bx bx-menu' id="btn"></i>
		</div>
		<ul class="nav_list">
			<!-- <li>
				<i class='bx bx-search' ></i>
				<input type="text" placeholder="Search...">
				<span class="tooltip">Search</span>
			</li> -->
			
			<li>
				<a href="profile.php">
					<i class='bx bxs-user-badge' ></i>
					<span class="links_name">Manager</span>
				</a>
				<span class="tooltip">Manager</span>
			</li>
			<li>
				<a href="dashboard.php">
					<i class='bx bx-grid-alt' ></i>
					<span class="links_name">Dashbobard</span>
				</a>
				<span class="tooltip">Dashboard</span>
			</li>
			<li>
				<a href="pending.php">
					<i class='bx bx-dollar-circle' ></i>
					<span class="links_name">Requests</span>
				</a>
				<span class="tooltip">Requests</span>
			</li>
			<li>
				<a href="invoices.php">
					<i class='bx bx-spreadsheet' ></i>
					<span class="links_name">Invoices</span>
				</a>
				<span class="tooltip">Invoices</span>
			</li>
			<!-- <li>
				<a href="analytics.html">
					<i class='bx bx-stats'></i>
					<span class="links_name">Analytics</span>
				</a>
				<span class="tooltip">Analytics</span>
			</li> -->
			<!-- <li>
				<a href="finalize.php">
					<i class='bx bx-cart-alt' ></i>
					<span class="links_name">Finalize</span>
				</a>
				<span class="tooltip">Finalize</span>
			</li> -->
			<li>
				<a href="reject.php">
					<i class='bx bx-task-x' ></i>
					<span class="links_name">Reject</span>
				</a>
				<span class="tooltip">Reject History</span>
			</li>
			<!-- <li>
				<a href="reports.html">
					<i class='bx bxs-report' ></i>
					<span class="links_name">Reports</span>
				</a>
				<span class="tooltip">Reports</span>
			</li> -->
		</ul>
		<div class="profile_content">
			<div class="profile">
				<div class="profile_details">
					<div class="name_job">
						<div class="name">manager/user</div>
						<div class="job">Purchasing Manager</div>
					</div>
				</div>
				<a href = '../AdminLogin.php'><i class='bx bx-log-out' id="log_out"></i></a>
			</div>
		</div>
	</div>
	<!-- Navigation Bar Ends -->

	<!-- Begin Script -->
	<script type="text/javascript">
		let btn = document.querySelector("#btn");
		let sidebar = document.querySelector(".sidebar");
		let searchBtn = document.querySelector(".bx-search");

		btn.onclick = function(){
			sidebar.classList.toggle("active");
		}
		searchBtn.onclick = function(){
			sidebar.classList.toggle("active");
		}
	</script>
	<!-- End Script -->
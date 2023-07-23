<?php
			
			session_start();
			
			if (!isset($_SESSION['username'])){
			header('location:index.php');
			}
			//
			?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>index</title>
    <link rel="stylesheet" href="style.css" />
    <!-- Boxicons CDN Link -->
    <script>
			function printDiv(print){
				var printContents = document.getElementById(print).innerHTML;
				var originalContents = document.body.innerHTML;
	
				document.body.innerHTML = printContents;
	
				window.print();
	
				document.body.innerHTML = originalContents;
	
			}
		</script>
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
    <div class="sidebar">
      <div class="logo-details">
       <span class="logo_name" style="font-family:times new roman;font-size:32px;">Account Book</span>
      </div>
      <ul class="nav-links">
        <li>
          <a href="purchase.php"  target="iframe_a">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Company</span>
          </a>
        </li>
        <!-- <li>
          <a href="sales.php"  target="iframe_a">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Sells</span>
          </a> -->
        </li>
        <li>
          <a href="login.php"target="iframe_a">
            <i class="bx bx-box"></i>
            <span class="links_name">Account</span>
          </a>
        </li>
        <li>
          <a href="journal.php" target="iframe_a">
            <i class="bx bx-list-ul"></i>
            <span class="links_name">Journal</span>
          </a>
        </li>
        
        <li>
          <a href="ledger.php" target="iframe_a">
            <i class="bx bx-coin-stack"></i>
            <span class="links_name">Ledger</span>
          </a>
        </li>
        <li>
          <a href="trial_balance.php" target="iframe_a">
            <i class="bx bx-book-alt"></i>
            <span class="links_name">Trial-Balance</span>
          </a>
        </li>
        
        <li>
          <a href="profit_account.php" target="iframe_a">
            <i class="bx bx-message"></i>
            <span class="links_name">Profit&Loss A/c</span>
          </a>
        </li>

        <li>
          <a href="balancesheet.php" target="iframe_a">
            <i class="bx bx-message"></i>
            <span class="links_name">Balance_sheet</span>
          </a>
        </li>
        
        
        <li class="log_out">
          <a href="logout.php">
            <i class="bx bx-log-out"></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
    </div>

    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"style="color:white;font-family:times new roman;"></i>
          <span class="dashboard" style="color:white;font-family:times new roman;">Dashboard</span>
        </div>
        <div class="search-box">
          <input type="text" placeholder="Search..." />
          <a href=""><i class="bx bx-search" name="submit"></i></a>
        </div>
        <div class="profile-details">
          <img src="images/eric.PNG" alt="" />
          <span class="admin_name">Admin</span>
          <i class="bx bx-chevron-down"></i></a>
        </div>
      </nav>
      <button onclick="printDiv('print')">Print</button></center>
      <div class="home-content" style="height: 100%;background:white;">
      
        <iframe name="iframe_a" frameborder="0" width="100%"height="100%" id="print"style="background-image:url(images/rw.jpg)">
<!-- all content -->

        </iframe>
      </div>
      
    </section>

    <script>
      let sidebar = document.querySelector(".sidebar");
      let sidebarBtn = document.querySelector(".sidebarBtn");
      sidebarBtn.onclick = function () {
        sidebar.classList.toggle("active");
        if (sidebar.classList.contains("active")) {
          sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
      };
    </script>
  </body>
</html>

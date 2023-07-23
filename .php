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
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
    <div class="sidebar">
      <div class="logo-details">
       <span class="logo_name">Account Book</span>
      </div>
      <ul class="nav-links">
        <li>
          <a href="#" class="active">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Dashboard</span>
          </a>
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
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">Dashboard</span>
        </div>
        <div class="search-box">
          <input type="text" placeholder="Search..." />
          <i class="bx bx-search"></i>
        </div>
        <div class="profile-details">
          <img src="images/eric.PNG" alt="" />
          <span class="admin_name">Admin</span>
          <i class="bx bx-chevron-down"></i>
        </div>
      </nav>
      <div class="home-content" style="height: 100%;background:white;">
        <iframe name="iframe_a" frameborder="0" width="100%"height="100%">
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

<?php
session_start();

// Default role
$role = 'guest';

// Check if logged in
if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
}
?>
<!DOCTYPE html>

<html lang="en">

<head>

      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Bootsrap css -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
      <title>Lost & Found System</title>
      <!-- FONT AWESOME ICON -->
      <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.1/css/all.css">
    <!-- External CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="foundPage.css">
    <link rel="stylesheet" href="found-date.css">
    <link rel="stylesheet" href="foundsections.css">
  
</head>     


<body>
      <header>
            <nav class="navbar">
            <div class="logo">
                        <a href="../Main/main-page.php"><img class="logo-image"
                                    src="../Reference/ctu-danao-logo.png" alt="CTU-Logo">
                        </a>

                        <div>
                              <p class="school-ctu">Cebu Technological University</p>
                              <p class="school-ctu">Danao Campus</p>
                        </div>

                  </div>
                  <div class="right-side-nav">
                        <div class="home me-5"><a href="../Main/main-page.php" class="nav-link"><i class="fa-solid fa-house fs-5"></i></a>
                        </div>

                        <div class="items me-5"><a href="" class="nav-link">ITEMS &#x25BC;</a>

                        <ul class="dropdown">
                                    <li><a href="../Lost/Lost-page.php" ><button
                                                      class="items-lost-button">Lost</button></a></li>
                                    <li><a href="../Found/Found-page.php" ><button
                                                      class="items-found-button">Found</button></a>
                                    </li>
                              </ul>

                        </div>

                        <div class="notification">
                              <button class="notification-bell-btn" id="notification-bell-btn"><i
                                          class="fa-solid fa-bell fs-4"></i>
                                    <div class="bell-badge">3</div>
                              </button>
                              <div class="notification-container ">
                                    <div class="notification-label">Notifications</div>
                                    <div class="notification-container-renderer">

                                          <div class="notification-content-container">
                                                <img src="../Reference/ctu-danao-logo.png" alt="Profile Picture"
                                                      class="notification-profile-pic">
                                                <div class="notification-content-item">
                                                      <span class="notification-username">User Name</span>
                                                      <span class="notification-action">messages to the ITEM NAME</span>
                                                      <div class="notification-content-daysPass">3 days ago</div>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="notification-container-renderer">

                                          <div class="notification-content-container">
                                                <img src="../Reference/ctu-danao-logo.png" alt="Profile Picture"
                                                      class="notification-profile-pic">
                                                <div class="notification-content-item">
                                                      <span class="notification-username">User Name</span>
                                                      <span class="notification-action">messages to the ITEM NAME</span>
                                                      <div class="notification-content-daysPass">3 days ago</div>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="notification-container-renderer">

                                          <div class="notification-content-container">
                                                <img src="../Reference/ctu-danao-logo.png" alt="Profile Picture"
                                                      class="notification-profile-pic">
                                                <div class="notification-content-item">
                                                      <span class="notification-username">User Name</span>
                                                      <span class="notification-action">messages to the ITEM NAME</span>
                                                      <div class="notification-content-daysPass">3 days ago</div>
                                                </div>
                                          </div>
                                    </div>

                              </div>

                        </div>

                        <div class="settings">
                              <button class="settings-btn" id="settings-btn">
                                    <i class="fa-regular fa-bars"
                                          style="color:#2c3b80;font-size:30px;cursor: pointer;"></i>
                              </button>

                              <div class="dropdown-content">
                                    <div class="dropdown-item">
                                          <img src="../Reference/ctu-danao-campus.jpg" alt="Profile Picture"
                                                class="profile-pic">
                                                <span>  <?= htmlspecialchars($role) ?> </span>
                                    </div>
                                    <a href="../Report-page/report-page.html" class="dropdown-item">Report</a>
                                    <?php if ($role ==='user'): ?>
                                          <a href="../Registration/logout.php" class="dropdown-item">Log Out</a>
                                    <?php elseif ($role === 'guest' || ''): ?>
                                          <a href="../Registration/login.html" class="dropdown-item">Log In</a>
                                    <?php endif; ?>
                              </div>
                        </div>
                  </div>
            </nav>
      </header>
      <div class="whole-section">
            <!-- Main Content -->
            <div class="wrapper-sections">
                <div class="wrapper">
                    <!-- Text Container -->
                    <section class="txt-container">
                        <div class="line"></div>
                        <h1 class="txt">FOUND ITEMS</h1>
                    </section>
                    
                    <!-- Section Container -->
                    <section class="section-container">
                        <div class="boxes-outer-container">
                            <!-- Include PHP File for Dynamic Content -->
                            <?php include "display_cards.php"; ?>
                        </div>
                        <div class="overlay" id="overlay">
                              <div class="overlay-content">
                                    <?php include "overlay.php"; ?>
                              
                              </div>
                        </div>
                    </section>
                </div>
                
            </div>
            <!-- RIGHT SECTION -->
                <div class="right-section">
                          <div class="searchbar"><input class="search-item" type="text" placeholder="Search Lost Item...">
                                <button class="search-button"><i class="fa-solid fa-magnifying-glass"></i></button>
                          </div>
                          <div class="clock" id="clock"></div>
                          <div class="date-container">
                                <p class="mb-0"id="weekday"></p>
                                <p id="date"></p>
                            </div>
                    </div>
         </div>
         <!-- Bootsrap JS -->
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
              <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
                    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
                    crossorigin="anonymous"></script>
              <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
                    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
                    crossorigin="anonymous"></script>
              <!-- CLOCK JS -->
              <script src="clock.js"></script>
              <!-- DATE JS -->
              <script src="date.js"></script>
              <!-- LOST PAGE JS -->
               <script src="foundPage.js"></script>
               <!-- GET ALL DETAILS JS -->
                <script src="displayFullDetails.js"></script>
</body>

</html>
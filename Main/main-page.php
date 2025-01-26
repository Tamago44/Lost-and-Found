<?php
session_start();

// Default role
$role = 'guest';

// Check if logged in
if (isset($_SESSION['role'])) {
      $role = $_SESSION['role'];
      $token = $_SESSION['token'] ?? null;
}

if (isset($_SESSION['name'])) {
      $name = $_SESSION['name'] ?? null;
}
?>

<!DOCTYPE html>

<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Link swiper css -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
      <!-- Bootsrap css -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
      <title>Lost & Found System</title>
      <!-- Main-page Css -->
      <link rel="stylesheet" href="mainPage.css">
      <link rel="stylesheet" href="mainSection.css">
      <!-- FONT AWESOME ICON -->
      <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.1/css/all.css">

</head>

<body>
      <header>
            <nav class="navbar container">
                  <div class="logo">
                        <a href="main-page.html"><img class="logo-image" src="../Reference/ctu-danao-logo.png"
                                    alt="CTU-Logo">
                        </a>

                        <div>
                              <p class="school-ctu">Cebu Technological University</p>
                              <p class="school-ctu">Danao Campus</p>
                        </div>

                  </div>
                  <div class="right-side-nav">
                        <div class="home me-5"><a href="main-page.html" class="nav-link"><i
                                          class="fa-solid fa-house fs-5"></i></a>
                        </div>

                        <div class="items me-5" style="cursor: default;">
                              <div class="nav-link">ITEMS &#x25BC;</div>

                              <ul class="dropdown">
                                    <li><a href="../Lost/Lost-page.php" target="_blank"><button
                                                      class="items-lost-button">Lost</button></a></li>
                                    <li><a href="../Found/Found-page.php" target="_blank"><button
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


                  </div>
                  <div class="settings">
                        <button class="settings-btn" id="settings-btn">
                              <i class="fa-regular fa-bars"></i>
                        </button>

                        <div class="dropdown-content">
                              <div class="dropdown-item">
                                    <img src="../Reference/ctu-danao-campus.jpg" alt="Profile Picture"
                                          class="profile-pic">
                                    <?php if ($role === 'user' || $role === 'admin'): ?>
                                          <span> <?= htmlspecialchars($name) ?> </span>
                                    <?php elseif ($role === 'guest' || ''): ?>
                                          <span> <?= htmlspecialchars($role) ?> </span>
                                    <?php endif; ?>
                              </div>
                              <?php if ($role === 'user' || $role === 'admin'): ?>
                                    <a href="../Report/report-page.php" class="dropdown-item">Report</a>
                              <?php elseif ($role === 'guest' || ''): ?>
                                    <a href="../Login/login-page.html" class="dropdown-item" onclick="alert('Please login to create report.'); return false;">Report</a>
                              <?php endif; ?>

                              <?php if ($role === 'user' || $role === 'admin'): ?>
                                    <a href="../Registration/logout.php" class="dropdown-item">Log Out</a>
                              <?php elseif ($role === 'guest' || ''): ?>
                                    <a href="../Registration/login.html" class="dropdown-item">Log In</a>
                              <?php endif; ?>
                        </div>
                              </div>
            </nav>
      </header>
      <div class="background-ctu">
            <h1>Lost & Found</h1>
            <p>Your lost items, our mission to find them.</p>
      </div>

      <div class="whole-section container">
            <div class="wrapper-sections">

                  <!-- LOST -->
                  <div class="wrapper">
                        <div class="txt-container">
                              <div class="line"></div>
                              <div class="txt">LOST </div>
                        </div>
                        <div class="section-container">

                              <!-- Include PHP File for Dynamic Content -->
                              <?php include "display_cards-lost.php"; ?>

                        </div>
                        <div class="overlay" id="overlay">
                              <div class="overlay-content">
                                    <?php include "overlay.php"; ?>
                              </div>
                        </div>
                        <div class="message-overlay" id="message-overlay">
                        </div>
                        <a href="../Lost/Lost-page.php" target="_blank" class="view-more-button-link">
                              <button class="view-more-button">VIEW MORE</button>
                        </a>
                  </div>
                  <!-- FOUND -->

                  <div class="wrapper">
                        <div class="txt-container">
                              <div class="line"></div>
                              <div class="txt">FOUND </div>
                        </div>
                        <div class="section-container">

                              <!-- Include PHP File for Dynamic Content -->
                              <?php include "display_cards-found.php"; ?>
                              <div class="overlay" id="overlay">
                                    <div class="overlay-content">
                                          <?php include "overlay.php"; ?>
                                    </div>
                              </div>
                        </div>
                        <a href="../Found/Found-page.php" target="_blank" class="view-more-button-link">
                              <button class="view-more-button">VIEW MORE</button>
                        </a>
                  </div>
            </div>
            <!-- RIGHT SECTION -->
            <div class="right-section">
                  <div class="searchbar"><input class="search-item" type="text" placeholder="Search Lost Item...">
                        <button class="search-button"><i class="fa-solid fa-magnifying-glass"></i></button>
                  </div>
                  <div class="clock" id="clock"></div>
                  <div class="date-container">
                        <p class="weekday" id="weekday"></p>
                        <p class="date" id="date"></p>
                  </div>
            </div>



      </div>
      <!-- FOR MEDIA QUERIES -->
      <div class="nav-bottom">
            <div class="container">

                  <div class="bottom-items">
                        <div class="items me-5" style="cursor: default;">
                              <div class="nav-link">ITEMS &#x25BC;</div>

                              <ul class="dropdown">
                                    <li><a href="/Lost-page/Lost-page.html" target="_blank"><button
                                                      class="items-lost-button">Lost</button></a></li>
                                    <li><a href="/Found-page/Found-page.html" target="_blank"><button
                                                      class="items-found-button">Found</button></a>
                                    </li>
                              </ul>

                        </div>
                  </div>

                  <div class="bottom-home">
                        <div class="home"><a href="main-page.html" class="nav-link"><i
                                          class="fa-solid fa-house fs-5"></i></a>
                        </div>
                  </div>

                  <div class="bottom-notif" id="notification-bottom">
                        <div class="notification">
                              <button class="notification-bell-btn" id="notification-bell-btn-screen"><i
                                          class="fa-solid fa-bell fs-5"></i>
                                    <div class="bell-badge">3</div>
                              </button>
                        </div>
                  </div>
            </div>
      </div>
      <!-- Link for swiper JS -->
      <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

      <!-- Bootsrap JS -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
            integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
            crossorigin="anonymous"></script>

      <!-- For main page js navigation -->
      <script src="mainPage.js"></script>
      <!-- CLOCK JS -->
      <script src="../Lost/clock.js"></script>
      <!-- DATE JS -->
      <script src="../Lost/date.js"></script>
      <!-- Full Details -->
      <script src="displayFullDetails.js"></script>
</body>

</html>
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
      <link rel="stylesheet" href="main-date.css">
      <link rel="stylesheet" href="mainsection.css">
      <!-- FONT AWESOME ICON -->
      <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.1/css/all.css">

</head>

<body>
      <header>
            <nav class="navbar">
                  <div class="logo">
                        <a href="/Front-End/Main/main-page.php"><img class="logo-image" src="/Front-End/Reference/ctu-danao-logo.png"
                                    alt="CTU-Logo">
                        </a>

                        <div>
                              <p class="school-ctu">Cebu Technological University</p>
                              <p class="school-ctu">Danao Campus</p>
                        </div>

                  </div>
                  <div class="right-side-nav">
                        <div class="home me-5"><a href="/Front-End/Main/main-page.php" class="nav-link"><i
                                          class="fa-solid fa-house fs-5"></i></a>
                        </div>

                        <div class="items me-5" style="cursor: default;">
                              <div class="nav-link">ITEMS &#x25BC;</div>

                              <ul class="dropdown">
                                    <li><a href="/Front-End/Lost/Lost-page.php" target="_blank"><button
                                                      class="items-lost-button">Lost</button></a></li>
                                    <li><a href="/Front-End/Found/Found-page.php" target="_blank"><button
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
                                                <img src="/Front-End/Reference/ctu-danao-logo.png" alt="Profile Picture"
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
                                                <img src="/Front-End/Reference/ctu-danao-logo.png" alt="Profile Picture"
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
                                                <img src="/Front-End/Reference/ctu-danao-logo.png" alt="Profile Picture"
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
                                          <img src="/Front-End/Reference/ctu-danao-campus.jpg" alt="Profile Picture"
                                                class="profile-pic">
                                          <span>Guest</span>
                                    </div>
                                    <a href="/Front-End/Lost/report-page.html" class="dropdown-item">Report</a>
                                    <a href="/Front-End/Registration/html/login.html" class="dropdown-item">Log Out</a>
                              </div>
                        </div>
                  </div>
            </nav>
      </header>
      <div class="background-ctu">
            <h1>Lost & Found</h1>
            <p>Your lost items, our mission to find them.</p>
      </div>

      <div class="whole-section">
            <div class="wrapper-sections">

                  <!-- LOST -->
                  <div class="wrapper">
                        <div class="txt-container">
                              <div class="line"></div>
                              <div class="txt">LOST </div>
                        </div>
                        <div class="section-container">
                              <div class="boxes-outer-container">
                                    <!-- Include PHP File for Dynamic Content -->
                                    <?php include "display_cards-lost.php"; ?>
                              </div>
                        </div>
                        <div class="overlay" id="overlay">
                                    <div class="overlay-content">
                                          <?php include "overlay.php"; ?>
                                    </div>
                        </div>
                        <div class="message-overlay" id="message-overlay">
                        </div>
                        <a href="/Front-End/Lost/Lost-page.php" target="_blank" class="view-more-button-link">
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
                              <div class="boxes-outer-container">
                                    <!-- Include PHP File for Dynamic Content -->
                                    <?php include "display_cards-found.php"; ?>
                              </div>
                              <div class="overlay" id="overlay">
                                    <div class="overlay-content">
                                          <?php include "overlay.php"; ?>
                                    </div>
                              </div>
                        </div>
                        <a href="/Front-End/Found/Found-page.php" target="_blank" class="view-more-button-link">
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
                        <p class="mb-0" id="weekday"></p>
                        <p id="date"></p>
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
      <script src="mainpage.js"></script>
      <!-- CLOCK JS -->
      <script src="/Front-End/Lost/clock.js"></script>
      <!-- DATE JS -->
      <script src="/Front-End/Lost/date.js"></script>
      <!-- GET REPORT -->
      <script src="/Front-End/Lost/get-report.js"></script>
      <!-- Full Details -->
       <script src="displayFullDetails.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Lost or Found Item</title>
    <!-- Boostrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- REPORT CSS -->
    <link rel="stylesheet" href="report-page.css"> 
   
    <!-- FONT AWESOME ICON -->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.1/css/all.css">
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
                        <div class="home me-5"><a href="../Main/main-page.php" class="nav-link"><i
                                          class="fa-solid fa-house fs-5"></i></a>
                        </div>

                        <div class="items me-5" style="cursor: default;">
                              <div class="nav-link">ITEMS &#x25BC;</div>

                              <ul class="dropdown">
                                    <li><a href="../Lost/Lost-page.php" target="_blank"><button class="items-lost-button">Lost</button></a></li>
                                    <li><a href="../Found/Found-page.php" target="_blank"><button class="items-found-button">Found</button></a>
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
                                          <span>Guest</span>
                                    </div>
                                    <a href="../Lost/report-page.html"
                                          class="dropdown-item">Report</a>
                                    <a href="../Registration/html/Log-in.html" class="dropdown-item">Log Out</a>
                              </div>
                        </div>
                  </div>
            </nav>
      </header>

      <main class="container mt-5">
            <h1 class="text-center mb-4">Report Lost or Found Item</h1>
            <form action="submit.php" method="POST" class="needs-validation" novalidate>
                <div class="mb-3">
                  <p id="error" style="display: block; color: red;">FILL ALL FIELDS!</p>
                    <label for="itemType" class="form-label">Item Type:</label>
                    <select class="form-select" name="itemType" id="itemType" required>
                        <option value="" disabled selected>Select an option</option>
                        <option value="lost">Lost</option>
                        <option value="found">Found</option>
                    </select>
                    <div class="invalid-feedback">Please select an item type.</div>
                </div>
                <div class="mb-3">
                    <label for="itemName" class="form-label">Item Name:</label>
                    <input type="text" class="form-control" name="itemName" id="itemName" placeholder="Enter item name" required>
                    <div class="invalid-feedback">Please provide the item name.</div>
                </div>
                <div class="mb-3">
                    <label for="whenLost" class="form-label">When Reported:</label>
                    <input type="text" class="form-control" name="whenLost" id="whenLost" placeholder="E.g., Yesterday at 10 AM" required>
                </div>
                <div class="mb-3">
                    <label for="whereLost" class="form-label">Where Reported:</label>
                    <input type="text" class="form-control" name="whereLost" id="whereLost" placeholder="E.g., Library" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea class="form-control" name="description" id="description" rows="4" placeholder="Describe the item..." required></textarea>
                    <div class="invalid-feedback">Please provide a description.</div>
                </div>
                <div class="mb-3">
                    <label for="dateReported" class="form-label">Date Reported:</label>
                    <input type="date" class="form-control" name="dateReported" id="dateReported" required>
                    <div class="invalid-feedback">Please select a date.</div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Report Item</button>
            </form>
        </main>
    
    <script src="report-page.js"></script>
    <script src="report-submit.js"></script> <!-- Link to your JavaScript file -->
</body>
</html>
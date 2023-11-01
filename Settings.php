<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Settings</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <span class="navbar-brand">Service Project</span>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a href="BrowseServiceProjs.html" class="nav-link">Home</a>
                    </li>
                </ul>
                <div class="container-sm align-content-center">
                    <form class="d-flex container-fluid justify-content-start" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <a href="BrowseServiceProjs.html">
                        <button class="btn btn-outline-success" type="button">
                            <img src="https://static.thenounproject.com/png/5103870-200.png" width="20" height="20">
                        </button>
                        </a>
                        <a href="AdvancedSearch.html">
                        <button class="btn btn-sm btn-outline-secondary" type="button">Advanced</button>
                        </a>
                    </form>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="Settings.html">
                        <h3>^</h3>
                    </a>
                    <a href="SignIn.html">
                        <img class="d-inline-block" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1200px-Circle-icons-profile.svg.png"
                        width="30" height=30>
                    </a>
                </div>
            </div>
        </nav>
        <div class="mt-3">
            <h1 class="text-center">User Settings</h1>
        <form class="row g-3 justify-content-center p-5">
            <div class="form-group">
                <label for="emailInput">Change Email address</label>
                <input type="email" class="form-control" id="emailInput" aria-describedby="emailHelp" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="passwordInput">Change Password</label>
                <input type="password" class="form-control" id="passwordInput" placeholder="Password">
              </div>
              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="verifyChange">
                <label class="form-check-label" for="verifyChange">Are you sure you want to make these changes?</label>
              </div>
              <button type="submit" class="btn btn-primary">Apply Changes</button>
          </form>
          <h4 class="text-center">After submitting, you will need to sign in again with the new details!</h4>
    </body>
</html>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
    <head>
        <title>Service Project Signin</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <span class="navbar-brand">Service Project</span>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a href="#" class="nav-link">Home</a>
                    </li>
                </ul>
                <div class="container-sm align-content-center">
                    <form class="d-flex container-fluid justify-content-start" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">
                            <img src="https://static.thenounproject.com/png/5103870-200.png" width="20" height="20">
                        </button>
                        <button class="btn btn-sm btn-outline-secondary" type="button">Advanced</button>
                    </form>
                </div>
                <div class="d-flex justify-content-end">
                    <h3>^</h3>
                    <img class="d-inline-block" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1200px-Circle-icons-profile.svg.png"
                    width="30" height=30>
                </div>
            </div>
        </nav>
        <form class="container-sm align-content-center" action=""> <!-- needs action -->
            <div class="mb-3">
                <label for="emailInput" class="form-label">Email address</label>
                <input type="email" class="form-control" id="emailInput" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="passwordInput" class="form-label">Password</label>
                <input class="form-control" id="passwordInput" type="password">
            </div>
            <div>
                <a href="ForgotPassword.html">
                    <p class="text-muted">Forgot Password?</p>
                </a>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Sign in</button>
            </div>
            <div class="d-flex justify-content-center p-3">
                <a href="Registration.html">
                    <h6>Create Account</h2>
                </a>
            </div>
        </form>
    </body>
</html>
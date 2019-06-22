<html>
<head>
    <title>Kalam</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
  <br>
  <div class='header'>
    <h1 align="center"> Kalam   <img src="feather.svg" alt="$0"/> </h1>
  </div>

  <br>
  <div class="container"> <!-- container is a bootstap class-->
    <div class="login-box">
    <div class="row">
    <div class="col-md-6"> <!-- 6 grid in bootstrap -->
      <h2>Login here </h2>
      <form action="validation.php" method="post">
        <div class="form-group">
          <label>Username</label>
          <input type="text" name="user" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary"> Login </button>
      </form>
      </div>
      <div class="col-md-6"> <!-- 6 grid in bootstrap -->
        <h2>Register Here </h2>
        <form action="registration.php" method="post">
          <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Username</label>
            <input type="text" name="user" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-primary"> Sign Up </button>
        </form>
        </div>
    </div>
  </div>

</div>
</body>
</html>

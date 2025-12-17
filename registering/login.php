<?php 
require('../layout.php');
require('../includes/config.php');


if(isset($_SESSION['email'])) {
  header("Location: ../index.php");
}

if(isset($_POST['login'])) {
  // Get the data
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Write the query
  $login = $conn->prepare("SELECT * FROM users WHERE email = :email");
  $login->execute([':email' => $email]);

  $fetch = $login->fetch(PDO::FETCH_ASSOC);

  if ($login->rowCount() > 0) {
    if (password_verify($password, $fetch['password'])) {
      $_SESSION['name'] = $fetch['name'];
      $id= $_SESSION['user_id'] = $fetch['id'];
      $_SESSION['email'] = $fetch['email'];

      header("Location: ../index.php?id=$id");
    } else {
      echo "<script>alert('Email or password is wrong');</script>";
    }
  } else {
    echo "<script>alert('Email or password is wrong');</script>";
  }
}



?>

<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

            <form action="login.php" method="post">
                <h2>Log in</h2>
                <p>Please fill in the form to log in.</p>
                <hr>

                <div class="container">
                    <label for="email"><b>Email</b></label>
                    <input class="form-control form-control-lg" type="text" placeholder="Enter Email" name="email" required>

                    <label for="psw"><b>Password</b></label>
                    <input class="form-control form-control-lg" type="password" placeholder="Enter Password" name="password" required>
                    <label class="my-2">
                        <input type="checkbox" checked="checked" name="remember"> Remember me
                    </label><br>
                    <button type="submit" name="login" class="btn btn-outline-light btn-lg px-5 my-2">Login</button>
                    
                </div>

                <div class="container">
                  <span>Don't have an account? <a href="register.php">Register</a></span>
                </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>
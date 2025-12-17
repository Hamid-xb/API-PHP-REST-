<?php
require('../layout.php');
require("../includes/config.php");

if(isset($_SESSION['email'])) {
    header("Location: ../index.php");
}

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $insert = $conn->prepare("INSERT INTO users (name, email, password)
     VALUES (:name, :email, :password)");
    
    $insert->execute([
        ":name" => $name,
        ":email" => $email,
        ":password" => $password,
    ]);

    header("location: login.php");
}
?>

<!-- Your HTML here -->

<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

            <form action="register.php" method="POST">
                <div class="container">
                    <h1>Register</h1>
                    <p>You need to make an account in order to make your todo list</p>
                    <p>Please fill in this form to create an account.</p>
                    <hr>

                    <label for="name"><b>Name</b></label>
                    <input class="form-control form-control-lg" type="text" placeholder="Enter Name" name="name" id="name" required>

                    <label for="email"><b>Email</b></label>
                    <input class="form-control form-control-lg" type="text" placeholder="Enter Email" name="email" id="email" required>

                    <label for="password"><b>Password</b></label>
                    <input class="form-control form-control-lg" type="password" placeholder="Enter Password" name="password" id="password" required>

                    <button name="submit" type="submit" class="btn btn-outline-light btn-lg px-5 my-2">Register</button>
                </div>
                
                <div class="container signin">
                    <p>Already have an account? <a href="login.php">Sign in</a>.</p>
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
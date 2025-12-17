<?php
  $urls = 'http://localhost/phpRest/'; 
?>

<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand text-primary" href="<?php echo $urls?>index.php?id=<?php echo $_GET['id']?>" style="padding-left: 30px">
       Hamid
    </a>
    <ul style="padding-right: 30px; padding-top: 20px;">
        <?php if(isset($_SESSION['email'])) : ?>        
        <li><?php echo $_SESSION['name'];?> <a href="<?php echo $urls?>registering/logout.php"><i class="fa-solid fa-right-from-bracket"></i></a></li>
        <?php else:?>
        <li><a href="<?php echo $urls?>registering/register.php">Register</a></li>
        <li><a href="<?php echo $urls?>registering/login.php">Login</a></li>
        <?php endif; ?>
    </ul>
    </ul>
  </div>
</nav>
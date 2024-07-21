<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
 <?php if (isset($_SESSION['user'])) { ?>
  <a class="navbar-brand" href="#"><?php echo $_SESSION['user']['name'] ?></a>

 <?php }else { ?>
  <a class="navbar-brand" href="#">User Name</a>
 <?php  } ?>
  
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../../view/Home/index.php">Home</a>
        </li>
        <?php if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']==true) { ?>
          
          <li class="nav-item">
            <a class="nav-link" href="../../view/Product/product.php">Product</a>
          </li>

        <?php } ?>

      </ul>

      <form class="d-flex">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">


        <?php if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']==true) { ?>
          
          <li class="nav-item">
            <a class="nav-link" href="../../action/users/act_logout.php">Logout</a>
          </li>

        <?php }else { ?>
          
              <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../../view/Auth/register.php">Register</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="../../view/Auth/login.php">Login</a>
              </li>

        <?php } ?>

      </ul>
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">My blog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="blog.php">Blog</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Category
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Category1</a></li>
            <li><a class="dropdown-item" href="#">Category2</a></li>
          </ul>
        </li>
        <?php
          if($logged){
        ?>
        <li class="nav-item" style="font-weight: 800; color: black;">
          <a class="nav-link" href="profile.php">Heloo-<?=$_SESSION['username']?> </a>
        </li>
        <li class="nav-items"  >
          <a class="nav-link" style="color:red; font-weight:600" href="logout.php">| Logout</a>
        </li>
        <?php
          }else{ 
        ?>
         <li class="nav-item">
            <a class="nav-link" href="login.php">Login | Signup</a>
          </li>
        <?php
          }
        ?>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
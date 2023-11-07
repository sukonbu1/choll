<div class="topnav">
    <img src="include/bannerlogo.png" class="img-fluid rounded-top" alt="">
    <div class="leftnav">
      <a class="active" href="homepage.php">Home</a>
      <a href="#about">About</a>
      <a href="#contact">Contact</a>
    </div>
    <div class="rightnav">
    <?php if(isset($_SESSION['username']))  : ?>
      <a href="logout.php" class="logout">Log out</a>
    <?php else : ?>
      <a href="login.php" class="login">Log in</a>
      <a href="register.php"class="register">Sign up</a>
    <?php endif; ?>
    </div>
    <div class="search-container">
      <form>
        <input type="text" placeholder="Search.." name="search">
        <button type="submit">Submit</button>
      </form>
    </div>
  </div>
  
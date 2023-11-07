
<div class="container">
  <div class="header">
    <?php if(isset($_SESSION['username']))  : ?>
    <h2>Welcome back, <strong>
        <?php echo $_SESSION['username']; ?>
      </strong>!</h2>
    <?php else : ?>
    <h1>Welcome to the University of Greenwich unofficial forum!</h1>
    <?php endif; ?>
  </div>
  <button onclick="topFunction()" id="topbtn" class="btn btn-danger btn-floating btn-lg" title="Go to top"><i class="bi bi-arrow-up-circle-fill">↑</i></button>

  <div class="row">
    <div class="middlecolumn">
      <div class="card">
        <?php if(isset($_SESSION['username']))  : ?>
        <input name="createPost" class="zgT5MfUrDMC54cpiCpZFu" placeholder="Create Post" type="text"
          onclick="opencreateblog()">
        <?php else : ?> 
        <h4>Login to create a post</h4>
        <?php endif; ?>
      </div>
      <div class="d-flex ai-baseline mln24 pl24 pb16">
          <div class="flex-item fs-body3">
          <h4><?= $stmt['num']?> posts</h4>
        </div>
          <div class="sortoption">
              <button class="sortdropbtn"><h6>Sort by <i class="fa fa-caret-down"></i></h6> 
              </button>
              <div class="sort-option-content">
                <a href="homepage.php">Most recent</a>
                <a href="homepage_oldest.php">Oldest</a>
              </div>
          </div> 
      </div>
      <?php foreach($posts as $post): ?>
            <div class="card">
            <div class="dropdown">
              <!-- three dots -->
              <ul class="editbtn icons btn-right showLeft" onclick="showDropdown(event)">
                <li></li>
                <li></li>
                <li></li>
              </ul>
              <!-- menu -->
              <div class="dropdown-content">
                  <?php if(isset($_SESSION['username']) && $_SESSION['username'] == $post['username']):?>
                        <a href="editblog.php?id=<?=$post['id']?>">Edit</a>
                        <form action='deleteblog.php' method='post'>
                        <input type="hidden" name="id" value="<?=$post['id']?>">
                        <input onclick="deleteblog.php?id=<?=$post['id']?>"type='submit' value='Delete'></a>
                      </form>
                        <?php else: ?>
                        <a href="#about">Hide</a>
                    <?php endif;?>
              </div>
            </div>
              <h2><?= htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8') ?></h2>
              <h5><?= htmlspecialchars($post['username'], ENT_QUOTES, 'UTF-8') ?>,
                  <?php $display_date = date("D d M Y", strtotime($post['date'])) ?>
                  <?= htmlspecialchars($display_date, ENT_QUOTES, 'UTF-8') ?>
              </h5>
              <?php if( NULL !== $post['image']): ?>
                <img src=<?= $post['image'] ?>/>
              <?php endif; ?>
              <p><?= htmlspecialchars($post['content'], ENT_QUOTES, 'UTF-8') ?></p>
            </div>
          <?php endforeach; ?>

    </div>
    <div class="rightcolumn">
      <div class="card">
        <h2>About Me</h2>
        <div class="fakeimg" style="height:100px;">Image</div>
        <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
      </div>
      <div class="card">
        <h3>Popular Post</h3>
        <div class="fakeimg">Image</div><br>
        <div class="fakeimg">Image</div><br>
        <div class="fakeimg">Image</div>
      </div>
      <div class="card">
        <h3>Follow Me</h3>
        <p>Some text..</p>
      </div>
    </div>
  </div>

<script type="text/javascript">

    function opencreateblog() {
      window.location = 'addblog.php';
    }
    let mybutton = document.getElementById("topbtn");

// When the user scrolls down from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 1000 || document.documentElement.scrollTop > 500) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
} 

function showDropdown(event) {
    event.target.nextElementSibling.classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches(".editbtn")) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains("show")) {
        openDropdown.classList.remove("show");
      }
    }
  }
};

  </script>
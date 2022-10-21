<nav id="side_nav" class="side_nav">
  <a href="index.php">
    <button class="btn nav_btn">
      <div class="sidebar_icon">
        <i class="fa-solid fa-gauge"></i>
      </div>
      <span class="nav_text">Dashboard</span>
    </button>
  </a>

  <a href="add-post.php">
    <button class="btn nav_btn">
      <div class="sidebar_icon">
      <i class="fa-solid fa-plus"></i>
      </div>
      <span class="nav_text">Add Post</span>
    </button>
  </a>

  <a href="customer-all.php">
    <button class="btn nav_btn">
      <div class="sidebar_icon">
        <i class="fa-solid fa-user-tie"></i>
      </div>
      <span class="nav_text">Customer</span>
    </button>
  </a>

  <a href="category-all.php">
    <button class="btn nav_btn">
      <div class="sidebar_icon">
        <i class="fa-brands fa-bandcamp"></i>
      </div>
      <span class="nav_text">Category</span>
    </button>
  </a>

  <a href="tag-all.php">
    <button class="btn nav_btn">
      <div class="sidebar_icon">
      <i class="fa-solid fa-tag"></i>
      </div>
      <span class="nav_text">Tag</span>
    </button>
  </a>

  <a href="category-test.php">
    <button class="btn nav_btn">
      <div class="sidebar_icon">
      <i class="fa-solid fa-comment"></i>
      </div>
      <span class="nav_text">Comment</span>
    </button>
  </a>

  <a href="menu.php">
    <button class="btn nav_btn">
      <div class="sidebar_icon">
      <i class="fa-solid fa-ellipsis"></i>
      </div>
      <span class="nav_text">Menu</span>
    </button>
  </a>

  <a href="ad-all.php">
    <button class="btn nav_btn">
      <div class="sidebar_icon">
      <i class="fa-solid fa-rectangle-ad"></i>
      </div>
      <span class="nav_text">Ad</span>
    </button>
  </a>

  <div class="relative">
    <button style="padding-left:17px" class="btn nav_btn nav_btn_toggler">
      <div class="sidebar_icon">
        <i class="fa-solid fa-receipt"></i>
      </div>
      <span class="nav_text">Post Status</span>
      <span class="nav_toggle_icon">+</span>
    </button>
    <div class="hidden hide_nav_items nav_items">
      <a href="draft.php">
        <button class="sub_link">Draft</button>
      </a>
      <a href="published.php">
        <button class="sub_link">Published</button>
      </a>
    </div>
  </div>
  

  <?php if ($admin_info['role'] == 'Moderator') { ?>
  <?php } else { ?>
    <div class="relative">
      <button style="padding-left:17px" class="btn nav_btn nav_btn_toggler">
        <div class="sidebar_icon">
          <i class="fa-solid fa-cog"></i>
        </div>
        <span class="nav_text">Setting</span>
        <span class="nav_toggle_icon">+</span>
      </button>
      <div class="hidden hide_nav_items nav_items">
        <a href="moderator.php">
          <button class="sub_link">Moderator</button>
        </a>
        <a href="mail-setting.php">
          <button class="sub_link">Mail Setting</button>
        </a>
        <a href="invoice-setting.php">
          <button class="sub_link">Invoice Setting</button>
        </a>
      </div>
    </div>
  <?php } ?>


  <!-- Toggle Nav Text -->
  <div id="toggle_nav_text">
    <button class="btn">
      <span class="chevronleft_icon"></span>
    </button>
  </div>
</nav>
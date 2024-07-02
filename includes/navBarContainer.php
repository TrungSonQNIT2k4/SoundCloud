 <style>
    body {
      font-family: Arial, sans-serif;
    }
    .navItemLink {
      transition: color 0.3s ease, background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
      padding: 10px;
      display: flex;
      align-items: center;
      cursor: pointer;
      border-radius: 5px;
      text-decoration: none;
    }
    .navItemLink:hover {
      transform: scale(1.05);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    .navItemLink.active {
      color: white;
    }
  </style>
<div id="navBarContainer">
  <nav class="navBar">
    <span role="link" tabindex="0" onclick="openPage('index.php')" class="logo">
      <img src="assets/images/icons/logo.png">
    </span>

    <div class="group">
      <div class="navItem">
        <span role='link' tabindex='1' onclick="openPage('search.php');" class="navItemLink">
          Tìm kiếm
          <img src="assets/images/icons/search.png" class="icon" alt="Search">
        </span>
      </div>
    </div>

    <div class="group">
      <div class="navItem">
        <span role="link" tabindex="2" onclick="openPage('browse.php');" class="navItemLink">
          <i class="fa-solid fa-house"></i> Trang chủ
        </span>
      </div>

      <div class="navItem">
        <span role="link" tabindex="3" onclick="openPage('yourMusic.php');" class="navItemLink">
          <i class="fa-solid fa-layer-group"></i> Thư viện
        </span>
      </div>

      <div class="navItem">
        <span role="link" tabindex="5" onclick="openPage('settings.php');" class="navItemLink">
          <i class="fa-regular fa-user"></i> <?php echo $userLoggedIn->getFirstAndLastName(); ?>
        </span>
      </div>
    </div>
  </nav>
</div>

<script>
  // Đoạn mã JavaScript của bạn
  var navItems = document.querySelectorAll('.navItemLink');

  for (var i = 0; i < navItems.length; i++) {
    navItems[i].addEventListener('click', function() {
      for (var i = 0; i < navItems.length; i++) {
        navItems[i].classList.remove('active');
      }

      this.classList.add('active');
    });
  }
</script>
<nav id="sidebar" class="">
  <h1>
    <a href="index.php" class="logo">Quản lý hoạt động</a>
  </h1>
  <ul class="list-unstyled components mb-5">
    <li class="<?php echo isset($_GET['url']) && $_GET['url'] == "home" ? "active" : "" ?>">
      <a href="index.php?url=home">
        <div class="link">
          <div style="width: 30px;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
          </div>
          <div>
            Trang chủ
          </div>
        </div>
      </a>
    </li>
    <li class="<?php echo isset($_GET['url']) && $_GET['url'] == "list_active" ? "active" : "" ?>">
      <a href="?url=list_active">
        <div class="link">
          <div style="width: 30px;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
          </div>
          <div>
            Tất cả hoạt động
          </div>
        </div>
      </a>
    </li>
    <li class="<?php echo isset($_GET['url']) && $_GET['url'] == "join_active" ? "active" : "" ?>">
      <a href="?url=join_active">
        <div class="link">
          <div style="width: 30px;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
          </div>
          <div>
            Hoạt động tham gia
          </div>
        </div>
      </a>
    </li>
    <li class="<?php echo isset($_GET['url']) && $_GET['url'] == "proof_active" ? "active" : "" ?>">
      <a href="?url=proof_active">
        <div class="link">
          <div style="width: 30px;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
          </div>
          <div>
            Thêm minh chứng
          </div>
        </div>
      </a>
    </li>
    <li class="<?php echo isset($_GET['url']) && $_GET['url'] == "proof_list" ? "active" : "" ?>">
      <a href="?url=proof_list">
        <div class="link">
          <div style="width: 30px;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
          </div>
          <div>
            Xem minh chứng
          </div>
        </div>
      </a>
    </li>
  </ul>
</nav>
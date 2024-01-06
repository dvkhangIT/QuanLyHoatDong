<nav id="sidebar" class="">
     <h1>
          <a href="admin.php" class="logo">Quản trị hệ thống</a>
     </h1>
     <ul class="list-unstyled components mb-5">
          <li class="<?php echo isset($_GET['url']) && $_GET['url'] == "home" ? "active" : "" ?>">
               <a href="admin.php?url=home"><span class="fa fa-home mr-3"></span> Trang chủ</a>
          </li>

          <li class="<?php echo isset($_GET['url']) && $_GET['url'] == "list_acc" ? "active" : "" ?>">
               <a href="?url=list_acc"><span class="fa fa-user mr-3"></span> Tài khoản </a>
          </li>
          <li class="<?php echo isset($_GET['url']) && $_GET['url'] == "add_acc" ? "active" : "" ?>">
               <a href="?url=add_acc"><span class="fa fa-user mr-3"></span>Thêm tài khoản </a>
          </li>

          <li class="<?php echo isset($_GET['url']) && $_GET['url'] == "list_class" ? "active" : "" ?>">
               <a href="?url=list_student"><span class="fa fa-sticky-note mr-3"></span> Sinh viên</a>
          </li>
          <li class="<?php echo isset($_GET['url']) && $_GET['url'] == "list_acc" ? "active" : "" ?>">
               <a href="?url=add_student"><span class="fa fa-user mr-3"></span> Thêm sinh viên </a>
          </li>

          <li class="<?php echo isset($_GET['url']) && $_GET['url'] == "list_acc" ? "active" : "" ?>">
               <a href="?url=list_course"><span class="fa fa-user mr-3"></span> Khoá học</a>
          </li>
          <li class="<?php echo isset($_GET['url']) && $_GET['url'] == "proof_active" ? "active" : "" ?>">
               <a href="?url=add_course"><span class="fa fa-paper-plane mr-3"></span> Thêm khoá học</a>
          </li>

          <li class="<?php echo isset($_GET['url']) && $_GET['url'] == "proof_list" ? "active" : "" ?>">
               <a href="?url=list_active"><span class="fa fa-paper-plane mr-3"></span> Hoạt động</a>
          </li>
          <li class="<?php echo isset($_GET['url']) && $_GET['url'] == "list_acc" ? "active" : "" ?>">
               <a href="?url=add_active"><span class="fa fa-user mr-3"></span> Thêm hoạt động </a>
          </li>

          <li class="<?php echo isset($_GET['url']) && $_GET['url'] == "list_acc" ? "active" : "" ?>">
               <a href="?url=list_student_join"><span class="fa fa-user mr-3"></span> Sinh viên tham gia </a>
          </li>
          <li class="<?php echo isset($_GET['url']) && $_GET['url'] == "list_acc" ? "active" : "" ?>">
               <a href="?url=list_proof"><span class="fa fa-user mr-3"></span> Minh chứng</a>
          </li>

     </ul>
</nav>
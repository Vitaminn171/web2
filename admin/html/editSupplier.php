<?php 
  include('../SQL/connection.php');
  if(isset($_GET['page'])) {
    $page = $_GET['page'];
  } else {
    $page = '1';
  }

  $tukhoa = '';
  if(isset($_GET['tukhoa'])) {
    $tukhoa = $_GET['tukhoa'];
    $sql_lietke_order = "SELECT * FROM supplier WHERE supplier.`name` LIKE '%".$tukhoa."%'";
  } else {
    if($page == '' || $page == 1) {
      $begin = 0;
      $sql_lietke_order = "SELECT * FROM supplier LIMIT 0,7";
    } else {
      $begin = ($page * 7) - 7;
      $sql_lietke_order = "SELECT * FROM supplier LIMIT $begin,7";
    }
  }
  
  $query_lietke_order = mysqli_query($con ,$sql_lietke_order);

  $id = $_GET['id'];

  if(isset($_POST["sua"])) {
        $name = $_POST["sup-name"];
        $email = $_POST["sup-email"];
        $phoneNumber = $_POST["sup-phoneNumber"];

        if($id != "" && $name != "" && $email != "" && $phoneNumber != "") {
            $sql = "UPDATE supplier SET id='$id' , name='$name' , email='$email' , phoneNumber = '$phoneNumber' WHERE id = $id ";
            $query = mysqli_query($con , $sql);
            header("location: /admin/html/supplier.php");
        }
    }
    require_once("template/sidebar.php");
?>

<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Fluid - Layouts | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
    <style>
      a {
        color: black;
      }
      .modal-add-supplier {
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        z-index: 2000;

        display: flex;
        align-items: center;
        justify-content: center;

        background-color: rgba(0, 0, 0, 0.1);
      }
      .add-form-wrapper {
        position: relative;
        background-color: white;

        width: 500px;
        height: 410px;

        border-radius: 10px;
      }

      .exit-btn {
        position: absolute;
        top: 10px;
        right: 10px;

        padding: 5px;
        font-size: 18px;
        font-weight: bold;
      }
      .add-form-wrapper h1 {
        padding: 20px 0 10px 0;
        text-align: center;
      }
      .add-form-wrapper p {
        text-align: center;
        color: red;
      }
      .add-form--input-wrapper {
        width: 100%;
        padding: 0 20px;
      }
      .add-form--input-wrapper input {
        width: 100%;
        padding: 5px;
        border-radius: 5px;
        border: 1px solid rgba(0, 0, 0, 0.3);

        margin: 10px 0;
      }
      .btn-wrapper {
        text-align: center;
        margin-top: 10px;
      }
      .btn a {
        display: block;
        background-color: aqua;
        color: white;
      }
    </style>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-fluid navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <form action="/admin/html/supplier.php?tukhoa=tukhoa" method="GET" class="navbar-nav align-items-center">
                  <div class="navbar-nav align-items-center">
                    <div class="nav-item d-flex align-items-center">
                      <i class="bx bx-search fs-4 lh-0"></i>
                      <input
                        type="text"
                        class="form-control border-0 shadow-none"
                        placeholder="Tìm kiếm theo tên..."
                        aria-label="Search..."
                        name="tukhoa"
                      />
                    </div>
                    <button class="btn btn-secondary" type="submit">Tìm kiếm</button>
                  </div>
                </form>
                <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-3">
                  <a
                    class="github-button"
                    href="https://github.com/themeselection/sneat-html-admin-template-free"
                    data-icon="octicon-star"
                    data-size="large"
                    data-show-count="true"
                    aria-label="Star themeselection/sneat-html-admin-template-free on GitHub"
                    >Star</a
                  >
                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">John Doe</span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                          <span class="flex-grow-1 align-middle">Billing</span>
                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="auth-login-basic.html">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-fluid flex-grow-1 p-3">
                <main role="main">
                    <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
                    <div class="container-fluid mt-4">
                        <div id="thongbao" class="alert alert-danger d-none face" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>

                        <?php 
                            $sql = "SELECT * FROM supplier WHERE id = $id";
                            $query = mysqli_query($con , $sql);
                            $rows = mysqli_fetch_array($query);
                        ?>

                        <div class="modal-add-supplier">
                          <form class="form" action="" method="POST">
                            <div class="add-form-wrapper">
                              <a href="./supplier.php" class="exit-btn">X</a>
                              <h1>SỬA NHÀ CUNG CẤP</h1>
                              <p class="error-notice"></p>
                              <div class="add-form--input-wrapper">
                                <input placeholder="Nhập id của supplier..." name="sup-id" type="text" class="add-form-input--id" value="<?php echo $rows['id']?>" disabled>
                              </div>
                              <div class="add-form--input-wrapper">
                                <input placeholder="Nhập tên của supplier..." name="sup-name" type="text" class="add-form-input--name" value="<?php echo $rows['name']?>">
                              </div>
                              <div class="add-form--input-wrapper">
                                <input placeholder="Nhập email của supplier..." name="sup-email" type="text" class="add-form-input--email" value="<?php echo $rows['email']?>">
                              </div>
                              <div class="add-form--input-wrapper">
                                <input placeholder="Nhập số điện thoại của supplier..." name="sup-phoneNumber" type="text" class="add-form-input--phoneNumber" value="<?php echo $rows['phoneNumber']?>">
                              </div>
                              <div class="btn-wrapper"><button type="submit" name="sua" class="btn--submit btn btn-success">SỬA</button></div>
                            </div>
                          </form>
                        </div>
                        
                        <div class="row card">
                            <div class="col col-md-12">
                                <div class="d-flex">
                                  <div class="col-sm">
                                    <h3 class="card-header">
                                    THÔNG TIN NHÀ CUNG CẤP
                                    </h3>
                                  </div>
                                  <div class="col-sm card-header text-end">
                                    <div>
                                      <button class="btn-show-add-form btn btn-success">Thêm nhà cung cấp</button>
                                    </div>
                                  </div>
                                </div>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>PhoneNumber</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody id="datarow">
                                      <?php
                                      while ($row = mysqli_fetch_array($query_lietke_order)) {                          
                                      ?>
                                        <tr/>
                                            <td><?php echo $row['id'] ?></td>
                                            <td>
                                              <?php echo $row['name'] ?>
                                            </td>
                                            <td class="text-right"><?php echo $row['email'] ?></td>
                                            <td class="text-right"><?php echo $row['phoneNumber'] ?></td>
                                            <td>
                                              <a class="btn btn-primary" href="/admin/html/editSupplier.php?id=<?php echo $row['id'] ?>">Sửa</a>
                                              <a class="btn btn-danger" href="/admin/html/deleteSupplier.php?id=<?php echo $row['id'] ?>">Xóa</a>
                                            </td>
                                        </tr>
                                        <?php 
                                        }
                                        ?>
                                    </tbody>
                                </table>

                                <div class="pagination d-flex justify-content-center p-3">
                                  <ul class="pagination justify-content-center">
                                    <?php
                                      $sql_getAll = "SELECT * FROM supplier";
                                      $query_getAll = mysqli_query($con , $sql_getAll);

                                      if(isset($_GET['tukhoa'])) {
                                        echo '';
                                      } else {
                                        $row_count = mysqli_num_rows($query_getAll); 
                                        $all_page = ceil($row_count / 7);
                                        for($i = 1 ; $i <= $all_page ; $i++) {
                                          if($i == $page) {
                                            echo '<li class="page-item active" ><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>' ;
                                          } 
                                          else {
                                            echo '<li class="page-item" ><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>' ;
                                          }
                                        }
                                      }
                                    ?>
                                  </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End block content -->
                </main>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-fluid d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by
                  <a href="" target="_blank" class="footer-link fw-bolder">Tan Dat</a>
                </div>
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- <div class="buy-now">
      <a
        href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/"
        target="_blank"
        class="btn btn-danger btn-buy-now"
        >Upgrade to Pro</a
      >
    </div> -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script>
      const validateEmail = (email) => {
          return email.match(
            /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
          );
      };
      
      const validatePhoneNumber = (phoneNumber) => {
        return /^[0-9]{10}$/.test(phoneNumber);
      };

      const form = document.querySelector('.form')
      const addForm = document.querySelector('.modal-add-supplier')
      const addFormWrapper = document.querySelector('.add-form-wrapper')
      const btnShowAddForm = document.querySelector('.btn-show-add-form')
      const btnSubmit = document.querySelector('.btn--submit')
      const errorNotice = document.querySelector('.error-notice')
      const idInput = document.querySelector('.add-form-input--id')
      const nameInput = document.querySelector('.add-form-input--name')
      const emailInput = document.querySelector('.add-form-input--email')
      const phoneNumberInput = document.querySelector('.add-form-input--phoneNumber')

      btnShowAddForm.addEventListener('click' , (e) => {
        addForm.style.display = 'flex'
      })
      addForm.addEventListener('click' , (e) => {
        document.querySelector('.exit-btn').click()
        addForm.style.display = 'none'
        errorNotice.innerText = ""
        form.reset()
      })
      addFormWrapper.addEventListener( 'click' ,(e) => {
        e.stopPropagation()
      })

      btnSubmit.disabled = true

      let isValidEmail = false
      let isEmptyValueEmail = false
      emailInput.addEventListener('change' , (e) => {
        if(!validateEmail(e.target.value)) {
          isValidEmail = true
        } else {
          isValidEmail = false
        }

        if(e.target.value === "") {
          isEmptyValueEmail = true
        } else {
          isEmptyValueEmail = false
        }
      })

      let isEmptyValueId = false
      idInput.addEventListener('change' , (e) => {
        if(e.target.value === "") {
          isEmptyValueId = true
        } else {
          isEmptyValueId = false
        }
      })

      let isEmptyValueName = false
      nameInput.addEventListener('change' , (e) => {
        if(e.target.value === "") {
          isEmptyValueName = true
        } else {
          isEmptyValueName = false
        }
      })

      let isEmptyPhoneNumber = false
      let isValidPhoneNumber = false
      phoneNumberInput.addEventListener('change' , (e) => {
        if(!validatePhoneNumber(e.target.value)) {
          isValidPhoneNumber = true
        } else {
          isValidPhoneNumber = false
        }

        if(e.target.value === "") {
          isEmptyPhoneNumber = true
        } else {
          isEmptyPhoneNumber = false
        }
      })

      form.addEventListener('change' , (e) => {
        if(isEmptyPhoneNumber || isEmptyValueEmail || isEmptyValueId || isEmptyValueName) {
          errorNotice.innerText = "Vui lòng nhập đầy đủ các trường !"
          btnSubmit.disabled = true
          return
        } else {
          if(isValidEmail) {
            errorNotice.innerText = "Email không đúng định dạng !"
            btnSubmit.disabled = true
            return
          } else if(isValidPhoneNumber) {
            errorNotice.innerText = "Phone Number không đúng định dạng !"
            btnSubmit.disabled = true
            return
          }
          else {
            errorNotice.innerText = ""
            btnSubmit.disabled = false
          }
        }
      })

      btnSubmit.addEventListener('click' , (e) => {
        alert("Sửa thành công !")
      })

    </script>
  </body>
</html>

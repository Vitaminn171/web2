<?php 
  include('../SQL/connection.php');
  $sql_lietke_order = "SELECT * FROM supplier";
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
        <?php require_once("template/sidebar.php") ?>

        <!-- Layout container -->
        <div class="layout-page">
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-fluid flex-grow-1 container-p-y">
                <main role="main">
                    <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
                    <div class="container mt-4">
                        <div id="thongbao" class="alert alert-danger d-none face" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>

                        <h1 class="text-center">THÔNG TIN NHÀ CUNG CẤP</h1>

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
                        
                        <div class="row">
                            <div class="col col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>PhoneNumber</th>
                                            <th>Hành động</th>>
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

                                <!-- <a href="../index.html" class="btn btn-warning btn-md"><i class="fa fa-arrow-left"
                                        aria-hidden="true"></i>&nbsp;Quay
                                    về trang chủ</a>
                                <a href="checkout.html" class="btn btn-primary btn-md"><i
                                        class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Thanh toán</a> -->
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
        return /^\d+$/.test(phoneNumber);
      };

      const form = document.querySelector('form')
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
      let isEmptyValueEmail = true
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

      let isEmptyValueId = true
      idInput.addEventListener('change' , (e) => {
        if(e.target.value === "") {
          isEmptyValueId = true
        } else {
          isEmptyValueId = false
        }
      })

      let isEmptyValueName = true
      nameInput.addEventListener('change' , (e) => {
        if(e.target.value === "") {
          isEmptyValueName = true
        } else {
          isEmptyValueName = false
        }
      })

      let isEmptyPhoneNumber = true
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
        alert("Thêm thành công !")
      })

    </script>
  </body>
</html>

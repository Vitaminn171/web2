<?php 
  include('../../SQL/connection.php');
  $sql_lietke_order = "SELECT * FROM employee";
  $query_lietke_order = mysqli_query($con ,$sql_lietke_order);

  
  $sqlGetAllEmp = "SELECT email FROM employee";
  $querySqlGetAllEmp = mysqli_query($con , $sqlGetAllEmp);
  $listEmp = mysqli_fetch_all($querySqlGetAllEmp);
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
  data-assets-path="../../assets/"
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
    <?php require("../template/header.php");?>

    <style>
      .modal-add-employee {
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

        display: none;
      }
      .add-form-wrapper {
        background-color: white;

        width: 500px;
        height: 450px;

        border-radius: 10px;
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
      .position-wrapper {
        margin: 5px 0;
        padding: 0 20px;
      }
    </style>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        <?php require_once("../template/sidebar.php") ?>

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

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

                        <h1 class="text-center">THÔNG TIN EMPLOYEE</h1>

                        <div>
                          <button class="btn-show-add-form btn btn-success">Thêm nhân viên</button>
                        </div>

                        <div class="modal-add-employee">
                          <form class="form" action="addEmployee.php" method="POST">
                            <div class="add-form-wrapper">
                              <h1>THÊM NHÂN VIÊN</h1>
                              <p class="error-notice"></p>
                              <div class="add-form--input-wrapper">
                                <input placeholder="Nhập tên của employee..." name="employee-name" type="text" class="add-form-input--name">
                              </div>                
                              <div class="add-form--input-wrapper">
                                <input placeholder="Nhập email của employee..." name="employee-email" type="text" class="add-form-input--email">
                              </div>
                              <div class="add-form--input-wrapper">
                                <input placeholder="Nhập số điện thoại của employee..." name="employee-phoneNumber" type="text" class="add-form-input--phoneNumber">
                              </div>
                              <!-- <div class="add-form--input-wrapper">
                                <input placeholder="Nhập chức vụ của employee..." name="employee-position" type="text" class="add-form-input--position">
                              </div> -->
                              <div class="add-form--input-wrapper">
                                <input placeholder="Nhập mật khẩu của employee..." name="employee-password" type="password" class="add-form-input--password">
                              </div>
                              <div class="position-wrapper">
                                <select name="employee-position" class="add-form-input--position form-select">
                                  <option value="admin">admin</option>
                                  <option value="user" selected>user</option>
                                </select>
                              </div>
                              <div class="btn-wrapper"><button type="submit" name="themEmployee" class="btn--submit btn btn-success">THÊM</button></div>
                            </div>
                          </form>
                        </div>
                        
                        <div class="row">
                            <div class="col col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>PhoneNumber</th>
                                            <th>Position</th>
                                            <th>Block</th>
                                            <th>Hành động</th>>
                                        </tr>
                                    </thead>
                                    <tbody id="datarow">
                                      <?php
                                      while ($row = mysqli_fetch_array($query_lietke_order)) {                          
                                      ?>
                                        <tr/>
                                            <td><?php echo $row['name'] ?></td>
                                            <td>
                                              <?php echo $row['email'] ?>
                                            </td>
                                            <td class="text-right"><?php echo $row['phoneNumber'] ?></td>
                                            <td class="text-right"><?php echo $row['position'] ?></td>
                                            <td class="text-right">
                                            <?php
                                              $email = $row['email'];
                                              if($row['block'] == '0'){
                                                echo '<a class="btn btn-danger" href="blockEmployee.php?email='.$email.'">Khóa</a>';
                                              } else {
                                                echo '<a class="btn btn-success" href="unBlockEmployee.php?email='.$email.'">Mở khóa</a>';
                                              }
                                            ?>
                                             </td>
                                            <td>
                                              <a class="btn btn-primary" href="editEmployee.php?email=<?php echo $row['email'] ?>">Sửa</a>
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
                  <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
                </div>
                <div>
                  <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                  <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                  <a
                    href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                    target="_blank"
                    class="footer-link me-4"
                    >Documentation</a
                  >

                  <a
                    href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                    target="_blank"
                    class="footer-link me-4"
                    >Support</a
                  >
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

   
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <?php require("../template/tail.php");?>
    <script>
      const validateEmail = (email) => {
          return email.match(
            /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
          );
      };
      
      const validatePhoneNumber = (phoneNumber) => {
        return /^\d+$/.test(phoneNumber);
      };

      const checkStrengthPassword = (password) => {
        return String(password)
          .match(
            /((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{6,}))|((?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{8,}))/
          );
      }

      const checkEmailDuplicates = (email) => {
        let emailList = <?php echo json_encode($listEmp) ?>;

        for(let e of emailList) {
          if(e[0] === email) {
            return true
          }
        }
        return false
      }

      const form = document.querySelector('.form')
      const addForm = document.querySelector('.modal-add-employee')
      const addFormWrapper = document.querySelector('.add-form-wrapper')
      const btnShowAddForm = document.querySelector('.btn-show-add-form')
      const btnSubmit = document.querySelector('.btn--submit')
      const errorNotice = document.querySelector('.error-notice')
      const nameInput = document.querySelector('.add-form-input--name')
      const emailInput = document.querySelector('.add-form-input--email')
      const phoneNumberInput = document.querySelector('.add-form-input--phoneNumber')
      const passwordInput = document.querySelector('.add-form-input--password')

      btnShowAddForm.addEventListener('click' , (e) => {
        addForm.style.display = 'flex'
      })
      addForm.addEventListener('click' , (e) => {
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
      let isEmailDuplicates = false
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

        if(checkEmailDuplicates(e.target.value)) {
          isEmailDuplicates = true
        } else {
          isEmailDuplicates = false
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

      let isEmptyValuePassword = true
      let isStrengthPassword = false
      passwordInput.addEventListener('change' , (e) => {
        if(e.target.value === "") {
          isEmptyValuePassword = true
        } else {
          isEmptyValuePassword = false
        }

        if(checkStrengthPassword(e.target.value)) {
          isStrengthPassword = true
        } else {
          isStrengthPassword = false
        }
      })

      form.addEventListener('change' , (e) => {
        if(isEmptyPhoneNumber || isEmptyValueEmail || isEmptyValueName || isEmptyValuePassword) {
          errorNotice.innerText = "Vui lòng nhập đầy đủ các trường !"
          btnSubmit.disabled = true
          return
        } else {
          if(isValidEmail) {
            errorNotice.innerText = "Email không đúng định dạng !"
            btnSubmit.disabled = true
            return
          }  else if (!isStrengthPassword) {
            errorNotice.innerText = "Password chưa đủ mạnh !"
            btnSubmit.disabled = true
            return
          }else if(isEmailDuplicates) {
            errorNotice.innerText = "Email đã tồn tại !"
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

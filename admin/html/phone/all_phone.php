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
    <link rel="stylesheet" href="../../assets/css/all_phone.css" />
    <?php require_once("../template/header.php") ?>
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
              

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-3">
                  <a href="form_add_phone.php">
                    <button class="btn btn-primary">Add new product</button>
                  </a>
                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="../../assets/img/avatars/cowboy.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="../../assets/img/avatars/cowboy.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">Username (Email)</span>
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
           <!-- The Modal -->
            <div id="myModal" class="modal">

            <!-- Modal content -->
              <div class="modal-content" id="modal-content">
                <div id="spec_detail">
                  <div class="modal-header bg-dark">
                    <h3 style="margin-bottom:10px; color: white">Specifications</h3>
                  </div>
                  <div class="modal-body">
                    <h5 style="margin-bottom:-6px;font-weight:bold;">Processor</h5>
                    <div id="spec_group" class="mt-2 mb-3">
                      <div class="row mb-2">
                        <div class="col-lg-4" style="font-weight:bold;">Chipset:</div>
                        <div class="col" id="chipset"></div>
                      </div>
                      <div class="row">
                        <div class="col-lg-4" style="font-weight:bold;">CPU:</div>
                        <div class="col" id="cpu"></div>
                      </div>
                    </div>


                    <h5 style="margin-bottom:-6px;font-weight:bold;">Display</h5>
                    <div id="spec_group" class="mt-2 mb-3">
                      <div class="row mb-2">
                        <div class="col-lg-4" style="font-weight:bold;">Screen size:</div>
                        <div class="col" id="size"></div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-lg-4" style="font-weight:bold;">Screen panel:</div>
                        <div class="col" id="panel"></div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-lg-4" style="font-weight:bold;">Type:</div>
                        <div class="col" id="type"></div>
                      </div>
                      <div class="row">
                        <div class="col-lg-4" style="font-weight:bold;">Resolution:</div>
                        <div class="col" id="res"></div>
                      </div>
                    </div>

                    <h5 style="margin-bottom:-6px;font-weight:bold;">Camera</h5>
                    <div id="spec_group" class="mt-2 mb-3">
                      <div class="row mb-2">
                        <div class="col-lg-4" style="font-weight:bold;">Front camera:</div>
                        <div class="col" id="fcam"></div>
                      </div>
                      <div class="row mb-2"> 
                        <div class="col-lg-4" style="font-weight:bold;">Back camera:</div>
                        <div class="col" id="bcam"></div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-lg-4" style="font-weight:bold;">Camera Feature:</div>
                        <div class="col" id="feature"></div>
                      </div>
                      <div class="row">
                        <div class="col-lg-4" style="font-weight:bold;">Video capture:</div>
                        <div class="col" id="video"></div>
                      </div>
                    </div>

                    <h5 style="margin-bottom:-6px;font-weight:bold;">Design & Weight</h5>
                    <div id="spec_group" class="mt-2 mb-3">
                      <div class="row mb-2">
                        <div class="col-lg-4" style="font-weight:bold;">Dimensions:</div>
                        <div class="col" id="dimensions"></div>
                      </div>
                      <div class="row">
                        <div class="col-lg-4" style="font-weight:bold;">Weight:</div>
                        <div class="col" id="weight"></div>
                      </div>
                    </div> 


                    <h5 style="margin-bottom:-6px;font-weight:bold;">Misc</h5>
                    <div id="spec_group" class="mt-2">
                      <div class="row mb-2">
                        <div class="col-lg-4" style="font-weight:bold;">OS:</div>
                        <div class="col" id="os"></div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-lg-4" style="font-weight:bold;">Battery:</div>
                        <div class="col" id="battery"></div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-lg-4" style="font-weight:bold;">Sim:</div>
                        <div class="col" id="sim"></div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-lg-4" style="font-weight:bold;">Wifi:</div>
                        <div class="col" id="wifi"></div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-lg-4" style="font-weight:bold;">Mobile Network:</div>
                        <div class="col" id="network_support"></div>
                      </div>
                      <div class="row">
                        <div class="col-lg-4" style="font-weight:bold;">Other:</div>
                        <div class="col" id="other"></div>
                      </div>
                    </div>


                  </div>
                </div> 
              </div>  
              <!-- End The Modal -->
            </div>

                          
                        
            <div class="container-fluid container-p-y" id="card">
              
              <!-- Layout Demo -->
               <!-- Basic Bootstrap Table -->
              <div class="card">
                <div class="row">
                  <div class="col">
                    <h5 class="card-header ps-3 pt-3 pb-0">All products</h5>
                  </div>
                  <div class="col text-end">
                    <div class="dropdown card-header pe-3 pt-3 pb-0" >
                      <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">
                        Brand
                      </button>
                      <?php
                      require("../../SQL/sql_admin.php");

                      $result = mysqli_query($con, get_category_id_name()); ?>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="all_phone.php">All</a></li>
                      <?php
                      while ($row = mysqli_fetch_array($result)) {
                        ?>
                                <li><a class="dropdown-item" href="all_phone.php?category=<?= $row["id"] ?>"><?= $row["name"] ?></a></li>
                        <?php } ?>
                      </ul>
                    </div>
                  </div>
                </div>

                <div class="table">
                  <!-- Table product -->
                  <table class="table table-hover" id="product_table">
                    
                    <thead>
                      <tr >
                        <th>Image</th>
                        <th>Name</th>
                        <th>Color</th>
                        <th>Size</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <?php
                    $result = "";
                    if (isset($_GET["category"])) {
                      $result = mysqli_query($con, get_item_by_category($_GET["category"]));
                      //$countSql = count_item($_GET["category"]);
                    } else {
                      $result = mysqli_query($con, get_all_item());
                      //$countSql = count_item("0");
                    }
                    while ($row = mysqli_fetch_array($result)) {

                      ?>
                      



                      
                              <tr id="tr">
                                <td class="col-1">
                                  <?php
                                  if ($row["visible"] == 1) {
                                    echo "<img src='../../../phone_image/" . $row['image'] . "' style='width: 150%'>";
                                  } else {
                                    echo "<div class='card' id='allphone'>
                                    <img src='../../../phone_image/" . $row["image"] . "' class='card-img-top' style='width: 150%; opacity: 0.3'>
                                    <div class='card-img-overlay'>
                                      <img class='card-img' src='../../assets/img/elements/visible.png' style='width: 25px'></img>
                                      
                                    </div>
                                  </div>";
                                  }

                                  ?>
                      
                          
                              </td>
                                <td class="col-3 ps-4"><a onclick="show_detail_phone(<?= $row['phoneID'] ?>)" href="javascript:void(0);" class="hover-underline-animation"><strong><?= $row['name'] ?></strong></a></td>
                                <td class="col-3">
                                  <?= $row['cac_mau'] ?>
                                  </ul>
                                </td>
                                <td class="col-4">
                                  <!-- <span class="badge bg-label-primary me-1">Active</span> -->
                                  <?= $row['size'] ?>
                                </td>
                                <td class="col-1 text-center">
                                  <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                      <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                      <a class="dropdown-item text-dark" href="../../php/phone/visible.php?phoneID=<?= $row["phoneID"] ?>&visible=<?= $row["visible"] ?>" >
                              
                                      <i class='bx bx-low-vision me-1'></i> Visible</a
                                      >
                              
                              
                                      <a class="dropdown-item text-primary" href="form_edit_phone.php?phoneID=<?= $row["phoneID"] ?>"
                                        ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                      >
                                      <a class="dropdown-item text-danger" href="#" onclick="deletePhone(<?= $row['phoneID'] ?>)"
                                        ><i class="bx bx-trash me-1"></i> Delete</a
                                      >
                                    </div>
                                  </div>
                                </td>
                        
                              </tr>
                              <!-- Message Receive -->
                      <?php }

                    if (isset($_GET['message'])) {
                      if ($_GET['message'] == "Delete success!") {
                        echo '<div id="alert" class="alert alert-primary"><i class="bx bxs-like">   ' . urldecode($_GET['message']) . '</i></div>';
                      } else if ($_GET['message'] == "Can't delete product!") {
                        echo '<div id="alert" class="alert alert-danger"><i class="bx bx-error-alt">   ' . urldecode($_GET['message']) . '</i></div>';
                      } else if ($_GET['message'] == "Add new product success!") {
                        echo '<div id="alert" class="alert alert-primary"><i class="bx bx-check-double">   ' . urldecode($_GET['message']) . '</i></div>';
                      } else if ($_GET['message'] == "Edit product success!") {
                        echo '<div id="alert" class="alert alert-primary"><i class="bx bx-check-circle">   ' . urldecode($_GET['message']) . '</i></div>';
                      }
                    }
                    mysqli_close($con);
                    ?>
                        <!-- End Message Receive -->
                    </tbody>                   
                  </table>
                  <!-- End Table product -->
                </div>
              </div>
            </div>
            
              <!--/ Basic Bootstrap Table -->
              <!--/ Layout Demo -->
          </div>
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
    
    <!-- Page JS -->
    <?php require_once("../template/tail.php") ?>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    

  
    </body>
    <script>

      $(document).ready(function () {
        $('#product_table').DataTable({
          "info": false,
          "bLengthChange": true,
          "dom": '<"your-search-container"f><tr><"pagination justify-content-center mt-2"p>',
        });
      });
    </script>
    <script src="../../assets/js/phone/all_phone.js"></script>
</html>
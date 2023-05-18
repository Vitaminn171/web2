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
                    <!-- <li>
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
                    </li> -->
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

            <div class="container-fluid flex-grow-1 container-p-y">
                <!-- Layout Demo -->
                <div class="card mb-4">
                    <h5 class="card-header">Edit product</h5>
                    <!-- Form add new phone -->
                


                <form method="POST">
                    <div class="card-body">
                        <div class="d-flex align-items-center align-items-sm-center">
                          
                             <img
                            src="../../assets/img/elements/all_device.jpg"
                            alt="user-avatar"
                            class="d-block rounded"
                            height="100"
                            width="100"
                            id="uploadedAvatar"
                            /> 
                        </div>
                        </div>
                        <hr class="my-0" />
                        <div class="card-body">
                        
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="phoneName" class="form-label">Phone Name</label>
                                    <input
                                    class="form-control"
                                    type="text"
                                    id="phoneName"
                                    name="phoneName"
                                    placeholder="Device name"
                                    
                                    />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="brand">Brand</label>
                                    <select id="brand" class="select2 form-select" name="brand" >
                                      <option value="0">Select</option>
                                      <?php
                                      require("../../SQL/sql_admin.php"); 
                                      
                                      $result = mysqli_query($con,get_category_id_name());
                                      while($row = mysqli_fetch_array($result)){?>
                                          <option value="<?=$row['id']?>"><?=$row['name']?></option>
                                      <?php } ?>

                                  
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="date" class="form-label">Date</label>
                                    <input
                                    class="form-control"
                                    type="date"
                                    id="date"
                                    name="date"
                                    
                                    />
                                </div>
                              
                            </div>
                            <hr class="my-4" />
                            <h5>Specifications</h5>
                            <div class="row">   
                                <div class="mb-3 col-md-6">
                                    <label for="chipset" class="form-label">Chipset</label>
                                    <input
                                    class="form-control"
                                    type="text"
                                    id="chipset"
                                    name="chipset"
                                    placeholder="Chipset"
                                     
                                    />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="cpu" class="form-label">Cpu</label>
                                    <input
                                    type="text"
                                    class="form-control"
                                    id="cpu"
                                    name="cpu"
                                    placeholder="Cpu name"
                                    
                                    />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="dimensions">Body dimensions</label>
                                    <div class="input-group input-group-merge">
                                   
                                      <input
                                          type="text"
                                          id="dimensions"
                                          name="dimensions"
                                          class="form-control"
                                          placeholder="example: 146.3 x 70.9 x 7.6 mm"
                                        
                                      />
                                      <span class="input-group-text"> mm</span>
                                </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="weight" class="form-label">Body weight</label>
                                    <div class="input-group input-group-merge">
                                      <input
                                      type="number"
                                      class="form-control"
                                      id="weight"
                                      name="weight"
                                      placeholder="Weight"    
                                      
                                      />
                                      <span class="input-group-text"> g</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="display_feature" class="form-label">Display feature</label>
                                    <input class="form-control" type="text" id="display_feature" name="display_feature" placeholder="Feature" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="resolution" class="form-label">Display resolution</label>
                                    <div class="input-group input-group-merge">
                                      <input
                                      type="text"
                                      class="form-control"
                                      id="resolution"
                                      name="resolution"
                                      placeholder="Display resolution"    
                                       
                                      />
                                      <span class="input-group-text"> pixels</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="display_size" class="form-label">Display size</label>
                                    <div class="input-group input-group-merge">
                                      <input
                                      type="number"
                                      class="form-control"
                                      id="display_size"
                                      name="display_size"
                                      placeholder="Display size"    
                                      
                                      />
                                      <span class="input-group-text"> inches</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="resolution" class="form-label">Display technology</label>
                                    <input
                                    type="text"
                                    class="form-control"
                                    id="technology"
                                    name="technology"
                                    placeholder="Technology"   
                                    
                                    />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="os" class="form-label">OS</label>
                                    <input
                                    type="text"
                                    class="form-control"
                                    id="os"
                                    name="os"
                                    placeholder="OS"    
                                   
                                    />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="video" class="form-label">Video capture</label>
                                    <input
                                    type="text"
                                    class="form-control"
                                    id="video"
                                    name="video"
                                    placeholder="Video capture"  
                                    
                                    />
                                </div>        
                                <div class="mb-3 col-md-6">
                                    <label for="fcamera" class="form-label">Front camera</label>
                                    <input
                                    type="text"
                                    class="form-control"
                                    id="fcamera"
                                    name="fcamera"
                                    placeholder="Front camera"   
                                   
                                    />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="bcamera" class="form-label">Back camera</label>
                                    <input
                                    type="text"
                                    class="form-control"
                                    id="bcamera"
                                    name="bcamera"
                                    placeholder="Back camera"    
                                    
                                    />
                                </div>        
                                <div class="mb-3 col-md-6">
                                    <label for="camera_feature" class="form-label">Camera feature</label>
                                    <input
                                    type="text"
                                    class="form-control"
                                    id="camera_feature"
                                    name="camera_feature"
                                    placeholder="Camera feature"   
                                    
                                    />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="battery" class="form-label">Battery</label>
                                    <div class="input-group input-group-merge">
                                      <input
                                      type="number"
                                      class="form-control"
                                      id="battery"
                                      name="battery"
                                      placeholder="Battery"    
                                      
                                      />
                                      <span class="input-group-text"> mAh</span>
                                    </div>
                                </div>        
                                <div class="mb-3 col-md-6">
                                    <label for="sim" class="form-label">Sim</label>
                                    <input
                                    type="text"
                                    class="form-control"
                                    id="sim"
                                    name="sim"
                                    placeholder="Nano sim, eSim, ..."   
                                    
                                    />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="network" class="form-label">Network support</label>
                                    <input
                                    type="text"
                                    class="form-control"
                                    id="network"
                                    name="network"
                                    placeholder="5G, 4G, ..."  
                                     
                                    />
                                </div>    
                                <div class="mb-3 col-md-6">
                                    <label for="wifi" class="form-label">Wifi</label>
                                    <input
                                    type="text"
                                    class="form-control"
                                    id="wifi"
                                    name="wifi"
                                    placeholder="Wifi support"
                                      
                                    />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="misc" class="form-label">Misc</label>
                                    <input
                                    type="text"
                                    class="form-control"
                                    id="misc"
                                    name="misc"
                                    placeholder="Misc"  
                                  
                                    />
                                </div>        

                                
                            </div>
                            <hr class="my-4" />
                            
                            <div class="row"> 
                              <h5>Variant</h5>
                                    <div class="mb-1 col-3">
                                    
                                        <label for="size" class="form-label">Ram & Internal storage</label>
                                        <input
                                        type="text"
                                        class="form-control"
                                        id="size"
                                        name="size"
                                        placeholder="Example: 8GB 128GB"    
                                        />
                                                                  
                                    </div>
                             
                                    <div class="mb-1 col-5">
                                    
                                        <label for="price" class="form-label">Price</label>
                                      
                                        <div class="input-group input-group-merge">
                                          <input
                                          type="number"
                                          class="form-control"
                                          id="price"
                                          name="price"
                                          placeholder="Price "    
                                          />
                                          <span class="input-group-text"> VND</span>
                                        </div>
                                    </div>   
                                    <div class="mb-3 col-md-2">
                                        <label for="add" class="form-label">Add variant</label><br>
                                        <button class="btn btn-primary me-md-2 form-control" id="addVariant"><i class='bx bx-plus'></i></button>
                                    </div>

                                
                                    
                                
                                
                                
                                
                                
                            </div>
                            
                            <div class="mb-3 col-12">
                                <table class="table text-center">
                                    <thead class="table-secondary">
                                    <tr>
                                        <th>Size</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="table_variant">
                                   
                                
                                    </tbody>
                                </table>
                                        

                            </div>
                            <div class="row mt-5"> 
                              <div class="mb-3 col-5">
                                      <label for="color" class="form-label">Color</label>
                                          <input
                                          type="text"
                                          class="form-control"
                                          id="color"
                                          name="color"
                                          placeholder="Example: Trắng, Đen ....."    
                                          />
                                          

                                      </div>
                                      <div class="mb-3 col-md-2">
                                      <label for="addColor" class="form-label">Add color</label><br>
                                          <button class="btn btn-primary form-control" id="addColor"><i class='bx bx-plus text-center'></i></button>
                                          

                                      </div>
                            </div>
                            <div class="mb-3 col-12">
                                <table class="table text-center table-bordered">
                                    <thead class="table-secondary">
                                    <tr>
                                        <th>Color</th>
                                        <th>Image</th>
                                        <th>Upload</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="table_color">
                                   
                                
                                    </tbody>
                                    
                                </table>
                                        

                            </div>
                            
                            


                            <hr class="my-4" />
                            <div class="mt-2">
                            <button class="btn btn-primary me-2" name="submit" id="submit">Save changes</button>
                            <button type="reset" class="btn btn-outline-secondary" type="reset" id="cancel">Cancel</button>
                            </div>
                        </div>        
                    </div>
                </form>


            </div>





              <!--/ Layout Demo -->
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
    <?php require_once("../template/tail.php") ?>
    <script src="../../assets/js/phone/edit_phone.js"></script>
    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

  
  </body>
</html>

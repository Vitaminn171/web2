/**
 * Main
 */

'use strict';

let menu, animate;

(function () {
  // Initialize menu
  //-----------------

  let layoutMenuEl = document.querySelectorAll('#layout-menu');
  layoutMenuEl.forEach(function (element) {
    menu = new Menu(element, {
      orientation: 'vertical',
      closeChildren: false
    });
    // Change parameter to true if you want scroll animation
    window.Helpers.scrollToActive((animate = false));
    window.Helpers.mainMenu = menu;
  });

  // Initialize menu togglers and bind click on each
  let menuToggler = document.querySelectorAll('.layout-menu-toggle');
  menuToggler.forEach(item => {
    item.addEventListener('click', event => {
      event.preventDefault();
      window.Helpers.toggleCollapsed();
    });
  });

  // Display menu toggle (layout-menu-toggle) on hover with delay
  let delay = function (elem, callback) {
    let timeout = null;
    elem.onmouseenter = function () {
      // Set timeout to be a timer which will invoke callback after 300ms (not for small screen)
      if (!Helpers.isSmallScreen()) {
        timeout = setTimeout(callback, 300);
      } else {
        timeout = setTimeout(callback, 0);
      }
    };

    elem.onmouseleave = function () {
      // Clear any timers set to timeout
      document.querySelector('.layout-menu-toggle').classList.remove('d-block');
      clearTimeout(timeout);
    };
  };
  if (document.getElementById('layout-menu')) {
    delay(document.getElementById('layout-menu'), function () {
      // not for small screen
      if (!Helpers.isSmallScreen()) {
        document.querySelector('.layout-menu-toggle').classList.add('d-block');
      }
    });
  }

  // Display in main menu when menu scrolls
  let menuInnerContainer = document.getElementsByClassName('menu-inner'),
    menuInnerShadow = document.getElementsByClassName('menu-inner-shadow')[0];
  if (menuInnerContainer.length > 0 && menuInnerShadow) {
    menuInnerContainer[0].addEventListener('ps-scroll-y', function () {
      if (this.querySelector('.ps__thumb-y').offsetTop) {
        menuInnerShadow.style.display = 'block';
      } else {
        menuInnerShadow.style.display = 'none';
      }
    });
  }

  // Init helpers & misc
  // --------------------

  // Init BS Tooltip
  const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
  tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
  });

  // Accordion active class
  const accordionActiveFunction = function (e) {
    if (e.type == 'show.bs.collapse' || e.type == 'show.bs.collapse') {
      e.target.closest('.accordion-item').classList.add('active');
    } else {
      e.target.closest('.accordion-item').classList.remove('active');
    }
  };

  const accordionTriggerList = [].slice.call(document.querySelectorAll('.accordion'));
  const accordionList = accordionTriggerList.map(function (accordionTriggerEl) {
    accordionTriggerEl.addEventListener('show.bs.collapse', accordionActiveFunction);
    accordionTriggerEl.addEventListener('hide.bs.collapse', accordionActiveFunction);
  });

  // Auto update layout based on screen size
  window.Helpers.setAutoUpdate(true);

  // Toggle Password Visibility
  window.Helpers.initPasswordToggle();

  // Speech To Text
  window.Helpers.initSpeechToText();

  // Manage menu expanded/collapsed with templateCustomizer & local storage
  //------------------------------------------------------------------

  // If current layout is horizontal OR current window screen is small (overlay menu) than return from here
  if (window.Helpers.isSmallScreen()) {
    return;
  }

  // If current layout is vertical and current window screen is > small

  // Auto update menu collapsed/expanded based on the themeConfig
  window.Helpers.setCollapsed(true, false);
})();

const container = $("#container");
const dashboard = $("#dashboard");

// product sidebar
const product = $("#product");
const all_item = $("#all_item");
const category = $("#category");
const inventory = $("#inventory");
// product sidebar


// account sidebar
const account = $("#account");
const employee = $("#employee");
const customer = $("#customer");
// account sidebar



const url = window.location.href;

function click_sub_item_sidebar(menu,sub_active,sub_dis) {
  dashboard.removeClass("active");
  container.addClass("ps--active-y");
  container.addClass("ps");
  menu.addClass("open");
  menu.addClass("active");
  sub_active.addClass("active");
  sub_dis.removeClass("active");
}

function click_item_sidebar(item) {
  dashboard.removeClass("active");
  product.removeClass("open");
  product.removeClass("active");
  item.addClass("active");
}

if(url.includes("all_phone.php")) 
  click_sub_item_sidebar(product,all_item,category);
if(url.includes("category.php"))
  click_sub_item_sidebar(product,category,all_item); 
if(url.includes("inventory.php"))   
  click_item_sidebar(inventory);
if(url.includes("employee.php"))   
  click_sub_item_sidebar(account,employee,all_item);
if(url.includes("customer.php"))   
  click_sub_item_sidebar(account,customer,employee);



/**
 * The function inserts a new row into a table with a given size and a remove button.
 */

var items_variant = []
const insertTable = ({size}
  
) => {
  const tr = `<tr>
                  <td class="text-center">${size}</td>
            
                  <td>
                      <button id="removeVariant" class="text-danger btn-light border-0 removeItem" size="${size}" name="new_size"><a> <i class='bx bx-trash' ></i>
                      </a></button>
                      <input type="hidden" name="variant['size']" value="${size}"> 
                  </td>
              </tr>`
    
  $("#table_variant").append(tr)
  document.getElementById('size').value = ''
}

/**
 * 
 * The function adds a new row to a table when a button is clicked, based on user input, and prevents
 * duplicates.
 */
 //Onclick thêm vào table
 $("#addVariant").on("click", function(e) {
  e.preventDefault();
  
  if ($("#size").val() != "") {
      let variant = {
          size: $("#size").val(),
      }
      !items_variant.find(e => e.size == variant.size) && items_variant.push(variant);
      $("#table_variant").text("")
      
      items_variant.forEach(variant => insertTable(variant))
      
  }
})
const removeItem = (e) => {
  e.preventDefault();
  let size = e.target.closest("button").getAttribute("size")
  items_variant.splice(items_variant.indexOf(items_variant.find(ele => ele.size == size)),1)
  e.target.closest("tr").remove()
}
$(document).ready(() => {
  $(document).on("click", "button[id=removeVariant]", (e) => removeItem(e))
})

//----------------------------------------------------------------------------------------------------------------------------------------------





// document.addEventListener('DOMContentLoaded', function (e) {
//     (function () {
//       const deactivateAcc = document.querySelector('#formAccountDeactivation');
  
//       // Update/reset user image of account page
//       let accountUserImage = document.getElementById('uploadedAvatar');
//       const fileInput = document.querySelector('.account-file-input'),
//         resetFileInput = document.querySelector('.account-image-reset');
  
//       if (accountUserImage) {
//         const resetImage = accountUserImage.src;
//         fileInput.onchange = () => {
//           if (fileInput.files[0]) {
//             accountUserImage.src = window.URL.createObjectURL(fileInput.files[0]);
            
//           }
//         };
//         resetFileInput.onclick = () => {
//           fileInput.value = '';
//           accountUserImage.src = resetImage;
//         };
//       }
//     })();
//   });

var items_color = []
const insertTableColor = ({color}
  
) => {
  const tr = `<tr>
                  <td class="text-center">${color}</td>
            
                  <td>
                      <button id="removeItemColor" class="text-danger btn-light border-0 removeItem" color="${color}" name="new_color"><a> <i class='bx bx-trash' ></i>
                      </a></button>
                      <input type="hidden" name="colors['color']" value="${color}"> 
                  </td>
              </tr>`
  const opt = `<option value="${color}" id="${color}">${color}</option>`
  $("#table_color").append(tr)
  $("#image").append(opt)
  document.getElementById('color').value = ''
}

/**
 * 
 * The function adds a new row to a table when a button is clicked, based on user input, and prevents
 * duplicates.
 */
 //Onclick thêm vào table
 $("#addColor").on("click", function(e) {
  e.preventDefault();
  
  if ($("#color").val() != "") {
      let colors = {
          color: $("#color").val(),
      }
      !items_color.find(e => e.color == colors.color) && items_color.push(colors);
      $("#table_color").text("")
      
      items_color.forEach(colors => insertTableColor(colors))
      
  }
})
const removeItemColor = (e) => {
  e.preventDefault();
  let color = e.target.closest("button").getAttribute("color")
  items_color.splice(items_color.indexOf(items_color.find(ele => ele.color == color)),1)
  e.target.closest("tr").remove()
}
$(document).ready(() => {
  $(document).on("click", "button[id=removeItemColor]", (e) => removeItemColor(e))
})


// when submit push data to add_new_phone.php 
$("button[name=submit]").on("click",(e) => {
    e.preventDefault();
    // console.log(items)
    const phone = {
        name: $("#phoneName").val(),
        brand: $("#brand option:selected").attr("value"),
        date: $("#date").val()
    }
    const spec = {
        chipset: $("#chipset").val(),
        cpu: $("#cpu").val(),
        dimensions: $("#dimensions").val(),
        weight: $("#weight").val() + "g",
        display_feature: $("#display_feature").val(),
        resolution: $("#resolution").val(),
        display_size: $("#display_size").val() + " inches",
        technology: $("#technology").val(),
        os: $("#os").val(),
        video: $("#video").val(),
        fcamera: $("#fcamera").val(),
        bcamera: $("#bcamera").val(),
        camera_feature: $("#camera_feature").val(),
        sim: $("#sim").val(),
        network: $("#network").val(),
        wifi: $("#wifi").val(),
        misc: $("#misc").val(),
    }


    phone.length && spec.length && dataColor.length && dataVariant.length && $.post(`../php/add_new_phone.php`,{submit: true, dataColor: items_color, data_variant: items_variant, phone: phone, spec: spec}, (data) => {
        console.log(data)
                $("button[name=submit]").prop("disabled", true);
                $("#header").append(`<div class="absolute px-4 py-2 bg-green-500 font-medium text-base text-gray-50 shadow bottom-3 mr-2">
                Cập nhật thành công
            </div>`)
                setTimeout(function() {
                    //document.location.href = `../html/all_phone.php`
                },150);
            
        
        })
    })

    
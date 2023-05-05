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
  

  setTimeout(function(){
    var element = document.getElementById("alert");
    element.parentNode.removeChild(element);
}, 3000);



// /**
//  * The function inserts a new row into a table with a given size and a remove button.
//  */


// var items_variant = []
// const insertTable = ({size,price}
  
// ) => {
//     const number = parseInt(price).toLocaleString('en-US'); // format to currency 10000 -> 10,000
//   const tr = `<tr>
//                   <td class="text-center">${size}</td>
//                   <td class="text-center">${number} VND</td>
//                   <td>
//                       <button id="removeVariant" class="text-danger btn-light border-0 removeItem" size="${size}" name="new_size"><a> <i class='bx bx-trash' ></i>
//                       </a></button>
//                       <input type="hidden" name="variant['size']" value="${size}"> 
//                   </td>
//               </tr>`
    
//   $("#table_variant").append(tr)
//   document.getElementById('size').value = ''
//   document.getElementById('price').value = ''
// }

// /**
//  * 
//  * The function adds a new row to a table when a button is clicked, based on user input, and prevents
//  * duplicates.
//  */
//  //Onclick thêm vào table
//  $("#addVariant").on("click", function(e) {
//   e.preventDefault();
  
//   if ($("#size").val() != "" && $("#price").val() != null && isValidateVariantSize($("#size").val())) {
//       let variant = {
//           size: $("#size").val(),
//           price: $("#price").val()
//       }
//     //   const number = parseInt($("#price").val()).toLocaleString('en-US')
//       !items_variant.find(e => e.size == variant.size) && items_variant.push(variant);
//       $("#table_variant").text("")
      
//       items_variant.forEach(variant => insertTable(variant))
      
//   }
// })
// const removeItem = (e) => {
//   e.preventDefault();
//   let size = e.target.closest("button").getAttribute("size")
//   items_variant.splice(items_variant.indexOf(items_variant.find(ele => ele.size == size)),1)
//   e.target.closest("tr").remove()
// }
// $(document).ready(() => {
//   $(document).on("click", "button[id=removeVariant]", (e) => removeItem(e))
// })

// //----------------------------------------------------------------------------------------------------------------------------------------------



// let icolor = 1;
// var items_color = []
// const refresh = (colorID) => {
//   $("#table_color").empty();
  
//   items_color.forEach(item => {
//     const tr = `<tr>
//                   <td class="text-center">${item.color}</td>
//                   <td class="img-container" id="id_${item.colorID}">
                    
//                   </td>
//                   <td>
                      
                                            
                                      
//                                       <input
//                                           type="file"
//                                           id="upload_${item.colorID}"
//                                           class="account-file-input"
//                                           hidden  
//                                           name="file"
//                                           accept="image/png, image/jpeg, image/jpg"
//                                         />
//                                         <label for="upload_${item.colorID}" class="btn btn-primary me-3" onclick="uploadImage(${item.colorID})">
//                                           <i class="bx bx-upload"></i>   
//                                         </label>
//                   </td>
            
//                   <td>
//                       <button id="removeItemColor" class="text-danger btn-light border-0 removeItem" color="${item.color}" colorID="${item.colorID}" name="new_color"><a> <i class='bx bx-trash' ></i>
//                       </a></button>
//                       <input type="hidden" name="colors['color']" value="${item.color}"> 
//                   </td>
//               </tr>`
           
//     $("#table_color").append(tr)
//     var n = items_color.length + 1;
//     if(n > 0){

//         items_color.forEach(colors => {
//             $("#id_" + colors.colorID).text("")
//         })  
        
//         items_image.forEach(imageData => insertTdImage(imageData));
      
//     }
//     document.getElementById('color').value = ''
//   }) 
// };


// const insertTableColor = ({color, colorID}
  
// ) => {
  
//   const tr = `<tr>
//                   <td class="text-center">${color}</td>
//                   <td class="img-container" id="id_${colorID}">
                    
//                   </td>
//                   <td>
                      
                                            
                                      
//                                       <input
//                                           type="file"
//                                           id="upload_${colorID}"
//                                           class="account-file-input"
//                                           hidden  
//                                           name="file"
//                                           accept="image/png, image/jpeg, image/jpg"
//                                         />
//                                         <label for="upload_${colorID}" class="btn btn-primary me-3" onclick="uploadImage(${colorID})">
//                                           <i class="bx bx-upload"></i>   
//                                         </label>
//                   </td>
            
//                   <td>
//                       <button id="removeItemColor" class="text-danger btn-light border-0 removeItem" color="${color}" colorID="${colorID}" name="new_color"><a> <i class='bx bx-trash' ></i>
//                       </a></button>
//                       <input type="hidden" name="colors['color']" value="${color}"> 
//                   </td>
//               </tr>`
           
//   $("#table_color").append(tr)
//   var n = items_color.length;
//   if(n > 0){

//     items_color.forEach(colors => {
//         $("#id_" + colors.colorID).text("")
//     })
//       items_image.forEach(imageData => insertTdImage(imageData));
    
//   }
//   document.getElementById('color').value = ''
// }

// const insertTdImage = ({fileName, colorID}) => {
//   const img = `<div class="flex-item">
//                   <img src="../../phone_image/${fileName}"/>
//                   <a class="btn btn-sm text-danger" id="delete-btn" image="${fileName}" onclick="deleteImage('${fileName}',${colorID})"><i class='bx bx-trash' ></i></a>
//                   </div>`;

//   $("#id_" + colorID).append(img);
// }


// function deleteImage(fileName, colorID) {
//   items_color.forEach(colors => {
//     $("#id_" + colors.colorID).text("")
// })
//   items_image.splice(items_image.indexOf(items_image.find(ele => ele.fileName == fileName && ele.colorID == colorID)),1)
//   items_image.forEach(imageData => insertTdImage(imageData));
// }

// const refreshImageTd = () => {
//   $("#img-container").empty()
//   items_image.forEach(item => {
//     const img = `<div class="flex-item">
//                   <img src="../../phone_image/${item.fileName}"/>
//                   <a class="btn btn-sm text-danger" id="delete-btn" onclick="deleteImage('${item.fileName}',${item.colorID})"><i class='bx bx-trash' ></i></a>
//                   </div>`;
           
//       $("#id_" + item.colorID).append(img);
//   }) 
// };

// /**
//  * 
//  * The function adds a new row to a table when a button is clicked, based on user input, and prevents
//  * duplicates.
//  */
//  //Onclick thêm vào table
 
//  $("#addColor").on("click", function(e) {
//   e.preventDefault();
 
//   if ($("#color").val() != "") {
//       let colors = {
//           color: $("#color").val(),
//           colorID: icolor
//       }
//       !items_color.find(e => e.color == colors.color) && items_color.push(colors);
//       $("#table_color").text("")
//       //$("#img-container").text("")
//       $("#table_image").text("")
    
      
//       icolor++;
      
//       items_color.forEach(colors => insertTableColor(colors))
      
//   }
// })
// const removeItemColor = (e) => {
//   e.preventDefault();
//   let color = e.target.closest("button").getAttribute("color")
//   let colorID = e.target.closest("button").getAttribute("colorID")
//   items_color.splice(items_color.indexOf(items_color.find(ele => ele.color == color)),1)

//   items_image.forEach(item => {
//     if(item.colorID == colorID){
//         console.log(item.fileName)
//         items_image.splice(items_image.indexOf(item), 1)
//     }
    
//   });
//   items_image.forEach(item => {
//     if(item.colorID == colorID){
//         console.log(item.fileName)
//         items_image.splice(items_image.indexOf(item), 1)
//     }
    
//   });
  
 
//   //remove items_image where colorID = items_color.colorID deleted
//   console.log(items_image)

//   e.target.closest("tr").remove()
  
//   refresh(colorID);
// }
// $(document).ready(() => {
//   $(document).on("click", "button[id=removeItemColor]", (e) => removeItemColor(e))
// })

// var items_image = []
// function uploadImage(color_id){
//   const fileInput = document.querySelector('#upload_' + color_id);

//   function handleFileInputChange(){
//       if (fileInput.files[0]) {
//           const fileName = fileInput.files[0]['name'];
//           let dataImage = {
//               fileName: fileName,
//               colorID: color_id
//           }
            
//           // Kiểm tra xem item đã tồn tại chưa
//           const isExistItem = items_image.find(e => e.colorID === dataImage.colorID && e.fileName === dataImage.fileName);
          
//           if(!isExistItem){
//                 items_image.push(dataImage);      
//                 items_color.forEach(colors => {
//                     $("#id_" + colors.colorID).text("")

//                 })
//               items_image.forEach(imageData => insertTdImage(imageData));
//           }
          
//           // Loại bỏ sự kiện change
//           fileInput.removeEventListener('change', handleFileInputChange);
//       }
//   }
    
//   fileInput.addEventListener('change', handleFileInputChange);

// }

      


//   function isDateBeforeToday(date) {
//     // check valid date must before today or today
//     const today = new Date();
//     return date.getTime() <= today.getTime();
//   }
  
//   function isValidateBodyDimen(dimensions){
//     let pattern = /(\d+\s*x\s*\d+\s*x\s*\d+)/;
//     return dimensions.match(pattern)
//   }

//   function isValidateBodyWeight(weight){
//     return  int(weight) < 1000
//   }

//   function isValidateDisplayResolution(resolution){
//     let pattern = /(\d+\s*x\s*\d+)/;
//     return resolution.match(pattern)
//   }

//   function isValidateVariantSize(size){
//     let pattern = /(\d+GB\s\d+GB)/;
//     return size.match(pattern)
//   }
// const submit = document.querySelector("#submit")
// // when submit push data to add_new_phone.php 
// submit && submit.addEventListener("click", (e) => {
//     e.preventDefault()
//     // console.log('ok')
//     var flag = false
//     var selected_date = new Date($("#date").val());

//     //check validate form
//     if(isDateBeforeToday(selected_date)){
//         flag = true
//     }else{
//         alert("Date selected must before today!")
//         flag = false
//     }
//     if(isValidateBodyDimen($("#dimensions").val())){
//         flag = true
//     }else{
//         alert("Invalid dimensions!")
//         flag = false
//     }
   
//     if(isValidateDisplayResolution($("#resolution").val())){
//         flag = true
//     }else{
//         alert("Invalid resolution!")
//         flag = false
//     }

    
//         // console.log(items)
//       let phone = {
//             name: $("#phoneName").val(),
//             brand: $("#brand option:selected").attr("value"),
//             date: $("#date").val()
//       };

//       let spec = {
//         chipset: $("#chipset").val(),
//         cpu: $("#cpu").val(),
//         dimensions: $("#dimensions").val(),
//         weight: $("#weight").val() + "g",
//         display_feature: $("#display_feature").val(),
//         resolution: $("#resolution").val(),
//         display_size: $("#display_size").val() + " inches",
//         technology: $("#technology").val(),
//         os: $("#os").val(),
//         video: $("#video").val(),
//         fcamera: $("#fcamera").val(),
//         bcamera: $("#bcamera").val(),
//         camera_feature: $("#camera_feature").val(),
//         battery: $("#battery").val() + " mAh",
//         sim: $("#sim").val(),
//         network: $("#network").val(),
//         wifi: $("#wifi").val(),
//         misc: $("#misc").val()
//       };
//       if(flag){
//         $.ajax({
//           type: "POST",
//           url: "../php/add_new_phone.php",
//           data: { phone: phone , spec: spec, dataColor: items_color, dataVariant: items_variant, dataImage: items_image}
//         }).done(function( response ) {
//           document.location.href = `../html/all_phone.php`
//           alert(response); // hiển thị dữ liệu phản hồi trả về từ server
//         });
//       }
      
//     })


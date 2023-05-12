/**
 * The function inserts a new row into a table with a given size and a remove button.
 */

let isize = 1;
var items_variant = []
const insertTable = ({size,price}
  
) => {
    const number = parseInt(price).toLocaleString('en-US'); // format to currency 10000 -> 10,000
  const tr = `<tr>
                  <td class="text-center">${size}</td>
                  <td class="text-center">${number} VND</td>
                  <td>
                      <button id="removeVariant" class="text-danger btn-light border-0 removeItem" size="${size}" name="new_size"><a> <i class='bx bx-trash' ></i>
                      </a></button>
                      <input type="hidden" name="variant['size']" value="${size}"> 
                  </td>
              </tr>`
    
  $("#table_variant").append(tr)
  document.getElementById('size').value = ''
  document.getElementById('price').value = ''
}

/**
 * 
 * The function adds a new row to a table when a button is clicked, based on user input, and prevents
 * duplicates.
 */
 //Onclick thêm vào table
 $("#addVariant").on("click", function(e) {
  e.preventDefault();
  
  if ($("#size").val() != "" && $("#price").val() != null && isValidateVariantSize($("#size").val())) {
      let variant = {
          sizeID: isize,
          size: $("#size").val(),
          price: $("#price").val()
      }
    //   const number = parseInt($("#price").val()).toLocaleString('en-US')
      !items_variant.find(e => e.size == variant.size) && items_variant.push(variant);
      $("#table_variant").text("")
      isize++;
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



let icolor = 1;
var items_color = []
const refresh = (colorID) => {
  $("#table_color").empty();
  
  items_color.forEach(item => {
    const tr = `<tr>
                  <td class="text-center">${item.color}</td>
                  <td class="d-flex flex-wrap" id="id_${item.colorID}">
                    
                  </td>
                  <td>
                      
                                            
                                      
                                      <input
                                          type="file"
                                          id="upload_${item.colorID}"
                                          class="account-file-input"
                                          hidden  
                                          name="file"
                                          accept="image/png, image/jpeg, image/jpg"
                                        />
                                        <label for="upload_${item.colorID}" class="btn btn-primary" onclick="uploadImage(${item.colorID})">
                                          <i class="bx bx-upload"></i>   
                                        </label>
                  </td>
            
                  <td>
                      <button id="removeItemColor" class="text-danger btn-light border-0 removeItem" color="${item.color}" colorID="${item.colorID}" name="new_color"><a> <i class='bx bx-trash' ></i>
                      </a></button>
                      <input type="hidden" name="colors['color']" value="${item.color}"> 
                  </td>
              </tr>`
           
    $("#table_color").append(tr)
    var n = items_color.length + 1;
    if(n > 0){

        items_color.forEach(colors => {
            $("#id_" + colors.colorID).text("")
        })  
        
        items_image.forEach(imageData => insertTdImage(imageData));
      
    }
    document.getElementById('color').value = ''
  }) 
};


const insertTableColor = ({color, colorID}
  
) => {
  
  const tr = `<tr>
                  <td class="text-center">${color}</td>
                  <td class="d-flex flex-wrap" id="id_${colorID}">
                    
                  </td>
                  <td>
                      
                                            
                                      
                                      <input
                                          type="file"
                                          id="upload_${colorID}"
                                          class="account-file-input"
                                          hidden  
                                          name="file"
                                          accept="image/png, image/jpeg, image/jpg"
                                        />
                                        <label for="upload_${colorID}" class="btn btn-primary" onclick="uploadImage(${colorID})">
                                          <i class="bx bx-upload"></i>   
                                        </label>
                  </td>
            
                  <td>
                      <button id="removeItemColor" class="text-danger btn-light border-0 removeItem" color="${color}" colorID="${colorID}" name="new_color"><a> <i class='bx bx-trash' ></i>
                      </a></button>
                      <input type="hidden" name="colors['color']" value="${color}"> 
                  </td>
              </tr>`
           
  $("#table_color").append(tr)
  var n = items_color.length;
  if(n > 0){

    items_color.forEach(colors => {
        $("#id_" + colors.colorID).text("")
    })
      items_image.forEach(imageData => insertTdImage(imageData));
    
  }
  document.getElementById('color').value = ''
}

const insertTdImage = ({fileName, colorID}) => {
  const img = `<div class="flex-item">
                  <img src="../../../phone_image/${fileName}"/>
                  <a class="btn btn-sm text-danger" id="delete-btn" image="${fileName}" onclick="deleteImage('${fileName}',${colorID})"><i class='bx bx-trash' ></i></a>
                  </div>`;

  $("#id_" + colorID).append(img);
}


function deleteImage(fileName, colorID) {
  items_color.forEach(colors => {
    $("#id_" + colors.colorID).text("")
})
  items_image.splice(items_image.indexOf(items_image.find(ele => ele.fileName == fileName && ele.colorID == colorID)),1)
  items_image.forEach(imageData => insertTdImage(imageData));
}

const refreshImageTd = () => {
  $("#img-container").empty()
  items_image.forEach(item => {
    const img = `<div class="flex-item">
                  <img src="../../phone_image/${item.fileName}"/>
                  <a class="btn btn-sm text-danger" id="delete-btn" onclick="deleteImage('${item.fileName}',${item.colorID})"><i class='bx bx-trash' ></i></a>
                  </div>`;
           
      $("#id_" + item.colorID).append(img);
  }) 
};

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
          colorID: icolor
      }
      !items_color.find(e => e.color == colors.color) && items_color.push(colors);
      $("#table_color").text("")
      //$("#img-container").text("")
      $("#table_image").text("")
    
      
      icolor++;
      
      items_color.forEach(colors => insertTableColor(colors))
      
  }
})
const removeItemColor = (e) => {
  e.preventDefault();
  let color = e.target.closest("button").getAttribute("color")
  let colorID = e.target.closest("button").getAttribute("colorID")
  items_color.splice(items_color.indexOf(items_color.find(ele => ele.color == color)),1)

  items_image.forEach(item => {
    if(item.colorID == colorID){
        console.log(item.fileName)
        items_image.splice(items_image.indexOf(item), 1)
    }
    
  });
  items_image.forEach(item => {
    if(item.colorID == colorID){
        console.log(item.fileName)
        items_image.splice(items_image.indexOf(item), 1)
    }
    
  });
  
 
  //remove items_image where colorID = items_color.colorID deleted
  console.log(items_image)

  e.target.closest("tr").remove()
  
  refresh(colorID);
}
$(document).ready(() => {
  $(document).on("click", "button[id=removeItemColor]", (e) => removeItemColor(e))
})

var items_image = []
function uploadImage(color_id){
  const fileInput = document.querySelector('#upload_' + color_id);

  function handleFileInputChange(){
      if (fileInput.files[0]) {
          const fileName = fileInput.files[0]['name'];
          let dataImage = {
              fileName: fileName,
              colorID: color_id
          }
            
          // Kiểm tra xem item đã tồn tại chưa
          const isExistItem = items_image.find(e => e.colorID === dataImage.colorID && e.fileName === dataImage.fileName);
          
          if(!isExistItem){
                items_image.push(dataImage);      
                items_color.forEach(colors => {
                    $("#id_" + colors.colorID).text("")

                })
              items_image.forEach(imageData => insertTdImage(imageData));
          }
          
          // Loại bỏ sự kiện change
          fileInput.removeEventListener('change', handleFileInputChange);
      }
  }
    
  fileInput.addEventListener('change', handleFileInputChange);

}

      


  function isDateBeforeToday(date) {
    // check valid date must before today or today
    const today = new Date();
    return date.getTime() <= today.getTime();
  }
  
  function isValidateBodyDimen(dimensions){
    let pattern = /(\d+\s*x\s*\d+\s*x\s*\d+)/;
    return dimensions.match(pattern)
  }

  function isValidateBodyWeight(weight){
    return  int(weight) < 1000
  }

  function isValidateDisplayResolution(resolution){
    let pattern = /(\d+\s*x\s*\d+)/;
    return resolution.match(pattern)
  }

  function isValidateVariantSize(size){
    let pattern = /(\d+GB\s\d+GB)/;
    return size.match(pattern)
  }
const submit = document.querySelector("#submit")
// when submit push data to add_new_phone.php 
submit && submit.addEventListener("click", (e) => {
    e.preventDefault()
    // console.log('ok')
    var flag = false
    var selected_date = new Date($("#date").val());

    //check validate form
    if(isDateBeforeToday(selected_date)){
        flag = true
    }else{
        alert("Date selected must before today!")
        flag = false
    }
    if(isValidateBodyDimen($("#dimensions").val())){
        flag = true
    }else{
        alert("Invalid dimensions!")
        flag = false
    }
   
    // if(isValidateDisplayResolution($("#resolution").val())){
    //     flag = true
    // }else{
    //     alert("Invalid resolution!")
    //     flag = false
    // }

    
        // console.log(items)
      let phone = {
            name: $("#phoneName").val(),
            brand: $("#brand option:selected").attr("value"),
            date: $("#date").val()
      };

      let spec = {
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
        battery: $("#battery").val() + " mAh",
        sim: $("#sim").val(),
        network: $("#network").val(),
        wifi: $("#wifi").val(),
        misc: $("#misc").val()
      };
      if(flag){
        $.ajax({
          type: "POST",
          url: "../../php/phone/add_new_phone.php",
          data: { phone: phone , spec: spec, dataColor: items_color, dataVariant: items_variant, dataImage: items_image}
        }).done(function( response ) {
          var message = "Add new product success!";
          document.location.href = `../../html/phone/all_phone.php?message=` + message 
          //alert(response); // hiển thị dữ liệu phản hồi trả về từ server
        });
      }
      
    })


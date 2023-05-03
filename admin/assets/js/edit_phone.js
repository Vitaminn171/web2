if((location.href).includes("?phoneID=")){

  var queryString = url.split('?')[1];
  var parameter = queryString.split('=')[1]; // get phoneID
}
var data;
$.ajax({
  type: "POST",
  url: "../php/get_edit_phone.php",
  data: { phoneID: parameter },
  success: function (response) {
    data = JSON.parse(response);
    console.log(data)
    
    // set data form
    $("#phoneName").val(data.phone[0].name);
    $("#brand option").filter(function () {
      //may want to use $.trim in here
      return $(this).val() == data.phone[0].category;
    }).prop('selected', true);
    $("#date").val(data.phone[0].date);


    $("#chipset").val(data.spec[0].chipset);
    $("#cpu").val(data.spec[0].cpuType);
    $("#dimensions").val((data.spec[0].bodySize).replace(" mm", ""));
    $("#weight").val((data.spec[0].bodyWeight).replace("g", ""));
    $("#display_feature").val(data.spec[0].screenFeature);
    $("#resolution").val(data.spec[0].screenResolution);
    $("#display_size").val((data.spec[0].screenSize).replace(" inches", ""));
    $("#technology").val(data.spec[0].screenTech);
    $("#os").val(data.spec[0].os);
    $("#video").val(data.spec[0].videoCapture);
    $("#fcamera").val(data.spec[0].cameraFront);
    $("#bcamera").val(data.spec[0].cameraBack);
    $("#camera_feature").val(data.spec[0].cameraFeature);
    $("#battery").val((data.spec[0].battery).replace(" mAh", ""));
    $("#sim").val(data.spec[0].sim);
    $("#network").val(data.spec[0].networkSupport);
    $("#wifi").val(data.spec[0].wifi);
    $("#misc").val(data.spec[0].misc);
    //window.history.pushState("object or string", "Title", "../html/form_edit_phone.php");

    
    data.color[0].forEach(ele => insertTableColor(ele))
    data.variant[0].forEach(ele => insertTable(ele))
  }
})


const refresh = (colorID) => {
  $("#table_color").empty();

  data.color[0].forEach(item => {
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
                                          <label for="upload_${item.colorID}" class="btn btn-primary me-3" onclick="uploadImage(${item.colorID})">
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
    var n = data.color[0].length + 1;
    if (n > 0) {

      data.color[0].forEach(colors => {
        $("#id_" + colors.colorID).text("")
      })

      data.image[0].forEach(imageData => insertTdImage(imageData));

    }
    //document.getElementById('color').value = ''
  })
};


const insertTableColor = ({ color, colorID }

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
                                          <label for="upload_${colorID}" class="btn btn-primary me-3" onclick="uploadImage(${colorID})">
                                            <i class="bx bx-upload"></i>   
                                          </label>
                    </td>
              
                    <td>
                        <button id="removeItemColor" class="text-danger btn-light border-0 removeItem" color="${color}" colorID="${colorID}" name="new_color"><a> <i class='bx bx-trash' ></i>
                        </a></button>
                        <input type="hidden" name="colors['color']" value="${color}"> 
                    </td>
                </tr>`;

  $("#table_color").append(tr)
  var n = data.color[0].length;
  if (n > 0) {

    data.color[0].forEach(colors => {
      $("#id_" + colors.colorID).text("")
    })
    data.image[0].forEach(imageData => insertTdImage(imageData));

  }
  //ocument.getElementById('color').value = ''
}

const insertTdImage = ({ image, colorID }) => {
  const img = `<div class="flex-item">
                    <img src="../../phone_image/${image}"/>
                    <a class="btn btn-sm text-danger" id="delete-btn" image="${image}" onclick="deleteImage('${image}',${colorID})"><i class='bx bx-trash' ></i></a>
                    </div>`;

  $("#id_" + colorID).append(img);
}

function deleteImage(image, colorID) {
  data.color[0].forEach(colors => {
    $("#id_" + colors.colorID).text("")
  })
  data.image[0].splice(data.image[0].indexOf(data.image[0].find(ele => ele.image == image && ele.colorID == colorID)), 1)
  data.image[0].forEach(imageData => insertTdImage(imageData));
}

const refreshImageTd = () => {
  $("#img-container").empty()
  data.image[0].forEach(item => {
    const img = `<div class="flex-item">
              <img src="../../phone_image/${item.image}"/>
              <a class="btn btn-sm text-danger" id="delete-btn" onclick="deleteImage('${item.image}',${item.colorID})"><i class='bx bx-trash' ></i></a>
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

$("#addColor").on("click", function (e) {
  e.preventDefault();
  var max = 0;
  data.color[0].forEach(items => {
    var temp = parseInt(items.colorID);
    max = temp > max ? temp : max;
  })
  if ($("#color").val() != "") {
    let colors = {
      color: $("#color").val(),
      colorID: max + 1
    }
    !data.color[0].find(e => e.color == colors.color) && data.color[0].push(colors);
    $("#table_color").text("")
    //$("#img-container").text("")
    $("#table_image").text("")


    //icolor++;

    data.color[0].forEach(colors => insertTableColor(colors))

  }
})
const removeItemColor = (e) => {
  e.preventDefault();
  let color = e.target.closest("button").getAttribute("color")
  let colorID = e.target.closest("button").getAttribute("colorID")
  data.color[0].splice(data.color[0].indexOf(data.color[0].find(ele => ele.color == color)), 1)

  data.image[0].forEach(item => {
    if (item.colorID == colorID) {
      data.image[0].splice(data.image[0].indexOf(item), 1)
    }

  });
  data.image[0].forEach(item => {
    if (item.colorID == colorID) {
      data.image[0].splice(data.image[0].indexOf(item), 1)
    }

  });


  //remove items_image where colorID = items_color.colorID deleted
  console.log(data.image[0])

  e.target.closest("tr").remove()

  refresh(colorID);
}
$(document).ready(() => {
  $(document).on("click", "button[id=removeItemColor]", (e) => removeItemColor(e))
})



function uploadImage(color_id) {
      
  const fileInput = document.querySelector('#upload_' + color_id);

  function handleFileInputChange() {
    if (fileInput.files[0]) {
      const fileName = fileInput.files[0]['name'];
      let dataImage = {
        image: fileName,
        colorID: color_id
      }
      console.log(data)
      // Kiểm tra xem item đã tồn tại chưa
      const isExistItem = data.image[0].find(e => e.colorID === dataImage.colorID && e.image === dataImage.image);

      if (!isExistItem) {
        data.image[0].push(dataImage);
        data.color[0].forEach(colors => {
          $("#id_" + colors.colorID).text("")

        })
        data.image[0].forEach(imageData => insertTdImage(imageData));
      }

      // Loại bỏ sự kiện change
      fileInput.removeEventListener('change', handleFileInputChange);
    }
  }

  fileInput.addEventListener('change', handleFileInputChange);

}

const insertTable = ({ size, price }

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
  $("#addVariant").on("click", function (e) {
    e.preventDefault();

    if ($("#size").val() != "" && $("#price").val() != null) {
      let variant = {
        size: $("#size").val(),
        price: $("#price").val()
      }
      //   const number = parseInt($("#price").val()).toLocaleString('en-US')
      !data.variant[0].find(e => e.size == variant.size) && data.variant[0].push(variant);
      $("#table_variant").text("")

      data.variant[0].forEach(variant => insertTable(variant))

    }
  })
  const removeItem = (e) => {
    e.preventDefault();
    let size = e.target.closest("button").getAttribute("size")
    data.variant[0].splice(data.variant[0].indexOf(data.variant[0].find(ele => ele.size == size)), 1)
    e.target.closest("tr").remove()
  }
  $(document).ready(() => {
    $(document).on("click", "button[id=removeVariant]", (e) => removeItem(e))
  })


  function isDateBeforeToday(date) {
    // check valid date must before today or today
    const today = new Date();
    return date.getTime() <= today.getTime();
  }
  
  function isValidateBodyDimen(dimensions){
    let pattern = /(\d+(\.\d+)+\s*x\s*\d+(\.\d+)+\s*x\s*\d+(\.\d+)+)/;
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
        dimensions: $("#dimensions").val() + " mm",
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
          url: "../php/update_phone.php",
          data: { phone: phone , spec: spec, dataColor: data.color[0], dataVariant: data.variant[0], dataImage: data.image[0]}
        }).done(function( response ) {
          document.location.href = `../html/all_phone.php`
          alert(response); // hiển thị dữ liệu phản hồi trả về từ server
        });
      }
      
    })
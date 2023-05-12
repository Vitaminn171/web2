var id;
if((location.href).includes("?brandID=")){

  var queryString = url.split('?')[1];
  var parameter = queryString.split('=')[1]; // get phoneID
  id = parameter;
}

$.ajax({
    type: "POST",
    url: "../../php/category/get_category.php",
    data: {brandID: id},
    success: function (response) {
      data = JSON.parse(response);
      console.log(data)
      $("#brandName").val(data.name[0].name);
    }
  })


  const submit = document.querySelector("#submit")
  // when submit push data to add_new_phone.php 
  submit && submit.addEventListener("click", (e) => {
      e.preventDefault()
      // console.log('ok')
      var brand = data.brand[0];
      var new_brand = $("#brandName").val();
      if(!brand.find(e => e.name == new_brand) && new_brand != ""){
          $.ajax({
                    type: "POST",
                    url: "../../php/category/edit_category.php",
                    data: { brand: new_brand, id: id}
                  }).done(function( response ) {
                    var message = "Edit brand success!";
                    document.location.href = `../../html/category/category.php?message=` + message 
                    console.log(response)
                    //alert(response); // hiển thị dữ liệu phản hồi trả về từ server
                  });
      }else{
          var message = "Brand available!";
          document.location.href = `../../html/category/form_add_category.php?message=` + message 
          $("#brandName").val(data.name[0].name);
      }
       })
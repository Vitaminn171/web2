



$.ajax({
    type: "POST",
    url: "../../php/category/get_category.php",
    success: function (response) {
      data = JSON.parse(response);
      console.log(data)

    }
  })

  $("#cancel").on("click", function(e) {
    e.preventDefault();
    if(confirm("Are you sure you want to cancel?")){
      window.location.href = "category.php";
    }
  })

  const submit = document.querySelector("#submit")
// when submit push data to add_new_phone.php 
submit && submit.addEventListener("click", (e) => {
    e.preventDefault()
    // console.log('ok')
    var brand = data.brand[0];
    var new_brand = $("#brandName").val();
    if(!brand.find(e => e.name == new_brand) && new_brand != "" && confirm("Are you sure you want to add this new brand?")){
        $.ajax({
                  type: "POST",
                  url: "../../php/category/add_new_category.php",
                  data: { brand: new_brand}
                }).done(function( response ) {
                  var message = "Add brand success!";
                  document.location.href = `../../html/category/category.php?message=` + message 
                  console.log(response)
                  //alert(response); // hiển thị dữ liệu phản hồi trả về từ server
                });
    }else{
        var message = "Brand available!";
        document.location.href = `../../html/category/form_add_category.php?message=` + message 
    }
     })
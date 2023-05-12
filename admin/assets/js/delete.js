function deletePhone(phoneID){
    if (confirm("Are you sure you want to delete this product?")) {
        window.location.href = "../../php/phone/delete_phone.php?phoneID=" + phoneID;
    }
  }
  
  function deleteBrand(brandID,quantity){
      if (confirm("Are you sure you want to delete this brand?")) {
          window.location.href = "../../php/category/delete_category.php?brandID=" + brandID + "&quantity=" + quantity;
      }
        
  }
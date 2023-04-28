const hehe = {
    name: "John",location: "Boston"
}

$.ajax({
    type: "POST",
    url: "../php/test.php",
    data: {hehe: hehe},
    success: function(response){
      var data = JSON.parse(response);
      console.log(data['id']);
    }
  });
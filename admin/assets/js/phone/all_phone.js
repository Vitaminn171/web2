

function show_detail_phone(phoneID){
    // Get the modal
    var modal = document.getElementById("myModal");

    modal.style.display = "block";
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    }

    // TODO: call ajax get detail phone
    var data;
    $.ajax({
      type: "POST",
      url: "../../php/phone/get_edit_phone.php",
      data: { phoneID: phoneID },
      success: function (response) {
        data = JSON.parse(response);
        
        var spec = data.spec[0];
        console.log(spec)
        $("#chipset").text(spec.chipset);
        $("#cpu").text(spec.cpuType);
        $("#size").text(spec.screenSize);
        $("#panel").text(spec.screenTech);
        $("#type").text(spec.screenFeature);
        $("#res").text(spec.screenResolution);
        $("#fcam").text(spec.cameraFront);
        $("#bcam").text(spec.cameraBack);
        $("#feature").text(spec.cameraFeature);
        $("#video").text(spec.videoCapture);
        $("#dimensions").text(spec.bodySize);
        $("#weight").text(spec.bodyWeight);
        $("#os").text(spec.os);
        $("#battery").text(spec.battery);
        $("#sim").text(spec.sim);
        $("#wifi").text(spec.wifi);
        $("#network_support").text(spec.networkSupport);
        $("#other").text(spec.misc);

        // set data form
        // $("#phoneName").val(data.phone[0].name);
        // $("#brand option").filter(function () {
        //   //may want to use $.trim in here
        //   return $(this).val() == data.phone[0].category;
        // }).prop('selected', true);
        // $("#date").val(data.phone[0].date);
    
    
        // $("#chipset").val(data.spec[0].chipset);
        // $("#cpu").val(data.spec[0].cpuType);
        // $("#dimensions").val((data.spec[0].bodySize).replace(" mm", ""));
        // $("#weight").val((data.spec[0].bodyWeight).replace("g", ""));
        // $("#display_feature").val(data.spec[0].screenFeature);
        // $("#resolution").val(data.spec[0].screenResolution);
        // $("#display_size").val((data.spec[0].screenSize).replace(" inches", ""));
        // $("#technology").val(data.spec[0].screenTech);
        // $("#os").val(data.spec[0].os);
        // $("#video").val(data.spec[0].videoCapture);
        // $("#fcamera").val(data.spec[0].cameraFront);
        // $("#bcamera").val(data.spec[0].cameraBack);
        // $("#camera_feature").val(data.spec[0].cameraFeature);
        // $("#battery").val((data.spec[0].battery).replace(" mAh", ""));
        // $("#sim").val(data.spec[0].sim);
        // $("#network").val(data.spec[0].networkSupport);
        // $("#wifi").val(data.spec[0].wifi);
        // $("#misc").val(data.spec[0].misc);
        // //window.history.pushState("object or string", "Title", "../html/form_edit_phone.php");
    
        
        // data.color[0].forEach(ele => insertTableColor(ele))
        // data.variant[0].forEach(ele => insertTable(ele))
      }
    })




    
}
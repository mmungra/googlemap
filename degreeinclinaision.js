$(document).on('input', '#slider', function() {

   var  adaptedValue= getSliderValue();
    //save to local storage
    localStorage.setItem("tilt", adaptedValue  );
    $("#tilt").attr("src","img/tilt/tilt-"+ tilt +".svg");
    $('.slidervalue').html(adaptedValue);
});

function getSliderValue()
{
    var slider = $('#slider')
    var value = slider.val();
    var adaptedValue;
    var tilt ;
    switch(value)
    {
        case "0" :
            adaptedValue = "0°";
            //change image
            tilt= "0";
            break;
        case "11.25" :
            adaptedValue = "15°";
            tilt= "15";
            break;
        case "22.5" :
            adaptedValue = "30°";
            tilt= "30";
            break;
        case "33.75" :
            adaptedValue = "40°";
            tilt= "40";
            break;
        case "45" :
            adaptedValue = "45°";
            tilt= "45";
            break;
        default:
            adaptedValue = "0°";
    }

    return adaptedValue;
}
$(document).ready(function(){
    localStorage.setItem("tilt", getSliderValue());
  $('#submit').click(function(e){
      e.preventDefault();
     //redirect to finish page
      window.location.href = "finish.php";
  })
})

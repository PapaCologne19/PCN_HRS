<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
 $("#counties").change(function() {
    if($(this).val()){
    $("#towns").attr('disabled',false);


  //var towns = countyTowns[county];
   // for (var i = 0; i < towns.length; i++) {
      //  $("#towns").append($("<option></option>").text(towns[i]));
   // }


      optionText = 'Premium'; 
      optionValue = 'premium'; 

      $('#towns').append(`<option value="${optionValue}"> 
                                       ${optionText} 
                                  </option>`); 
    }
    else {
     $("#towns").attr('disabled',true);
     $("#towns").empty();


    }
  });
});
</script>
</head>
<body>

<div id="div1"><h2>Let jQuery AJAX Change This Text</h2></div>
<select id="counties">
    <option> </option>
    <option> somerset </option>
    <option> hertfordshire </option>
</select>

<select id="towns" disabled="true">
</select>


</body>
</html>
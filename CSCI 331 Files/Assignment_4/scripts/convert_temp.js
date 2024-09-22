window.addEventListener("DOMContentLoaded", domLoaded);

// When the DOM has finished loading, add the event listeners.
function domLoaded() {
   
   //Input fields and convert button
   var far_box = document.getElementById("F_in");
   var cels_box = document.getElementById("C_in");
   var button = document.getElementById("convertButton");

   //When far_box is clicked, clear the value of cels_box
   far_box.addEventListener("click", function() {
      clearOther(cels_box);
   })

   //When cels_box is clicked, clear the value of far_box
   cels_box.addEventListener("click", function() {
      clearOther(far_box);
   })

   //When the convert button is clicked, convert the box with a value into the other box's corresponding temp
   button.addEventListener("click", function() {
      function_selector(far_box, cels_box); 
   })
}

//Clears the value of the input box that was NOT clicked
function clearOther(other_box) {
   other_box.value = '';
}

//Selects which conversion to do based on the empty input block and performs the conversion. Also changes the image
function function_selector(far_box, cels_box) {
   if(far_box.value != '') {
      cels_box.value = convertFtoC(far_box.value);
      document.getElementById("message").textContent = "";
      display_weather_icon(far_box);   
   }
   else if(cels_box.value != '') {
      far_box.value = convertCtoF(cels_box.value);
      document.getElementById("message").textContent = "";
      display_weather_icon(far_box);   
   }
   else {
      document.getElementById("message").textContent = 'Enter a temperature to convert';
      display_weather_icon(far_box);
   }
}

//Converts a temp in celsius to a temp in fahrenheit
function convertCtoF(C) {
   return((C*(9/5))+32);
}

//Converts a temp in fahrenheit to a temp in celsius
function convertFtoC(F) {
   return((F-32)*(5/9));
}

//Displays a different image depending on the far_box value
function display_weather_icon(input_box) {
   var image = document.getElementById("weatherIcon");

   if(input_box.value == '') {
      image.src = "images/C-F.png";
   }
   else if(input_box.value <= 32 && input_box.value > -200) {
      image.src = "images/cold.png";
   }
   else if(input_box.value > 32 && input_box.value < 90) {
      image.src = "images/cool.png";
   }
   else if(input_box.value >= 90 && input_box.value < 200) {
      image.src = "images/hot.png";
   }
   else {
      image.src = "images/dead.png";
   }
}
// filterSelection("all") // Execute the function and show all columns
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("column");
  $('button').not(this).removeClass("active");
  // $(this).toggleClass("active"); 
  if (c == "all") c = "";
  // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
  for (i = 0; i < x.length; i++) {
  //   // w3AddClass(x[i], "show");
  //   // w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) 
      w3AddClass(x[i], "show");
    else w3RemoveClass(x[i], "show");
  }
}

// Show filtered elements
function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += " " + arr2[i];
    }
  }
}

// Hide elements that are not selected
function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);
    }
  }
  element.className = arr1.join(" ");
}

// Add active class to the current button (highlight it)
// $(document).ready(function () {
// 	$('button').on('click', function() {
//     $('button').removeClass('active');
//     $(this).addClass('active');
//     $('button').not(this).removeClass("active");
//   });
// });

$('button').on("click",function(){
  $('button').not(this).removeClass("active");
  $(this).toggleClass("active");  
  // if($('button').hasClass("active") == false){
  //   document.getElementsByClassName("column").removeClass("show");
  // }
});


function toggleMute() {

  var video=document.getElementById("myVideo")
  
  if(video.muted){
      video.muted = false;
  } else {
      video.muted = true;
  }
  
  }
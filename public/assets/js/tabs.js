function openPage(pageName, elmnt, color) {
    // Hide all elements with class="tabcontent" by default */
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Remove the background color of all tablinks/buttons
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
    }

    // Show the specific tab content
    document.getElementById(pageName).style.display = "block";

    // Add the specific color to the button used to open the tab content
    elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();

// ******************************** MODAL Kharid*************************************
// Get the modal
var modal = document.getElementById("modal-kharidd");

// Get the button that opens the modal
var btn = document.getElementById("btnmodal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function () {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

// ******************************** MODAL Forgotpass*************************************
// Get the modal
var modal2 = document.getElementById("modal-forgotpass");

// Get the button that opens the modal
var btn2 = document.getElementById("btn-pass");

// Get the <span> element that closes the modal
var span2 = document.getElementsByClassName("close2")[0];

// When the user clicks on the button, open the modal
btn2.onclick = function () {
    modal2.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span2.onclick = function () {
    modal2.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event2) {
    if (event2.target == modal2) {
        modal2.style.display = "none";
    }
}


// *************************** TABLE CONFIG ******************************
$(document).ready(function () {
    $('.recive-table').DataTable({
        "info": false,
        "lengthChange": false,
        //   "dom": 'rt<"bottom"pf>',
        "language": {
            "zeroRecords": "&#129300;متاسفانه پیدا نشد دوست عزیز, حالا چیکار کنیم ؟ ",
            "search": "جست و جو :",
            "paginate": {
                "first": "اولی",
                "last": "آخری",
                "next": "بعدی",
                "previous": "قبلی",
            }
        }
    });
});

 // *************************** SELECTOR ******************************
 var x, i, j, l, ll, selElmnt, a, b, c;
 /* Look for any elements with the class "custom-select": */
 x = document.getElementsByClassName("custom-select");
 l = x.length;
 for (i = 0; i < l; i++) {
   selElmnt = x[i].getElementsByTagName("select")[0];
   ll = selElmnt.length;
   /* For each element, create a new DIV that will act as the selected item: */
   a = document.createElement("DIV");
   a.setAttribute("class", "select-selected");
   a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
   x[i].appendChild(a);
   /* For each element, create a new DIV that will contain the option list: */
   b = document.createElement("DIV");
   b.setAttribute("class", "select-items select-hide");
   for (j = 1; j < ll; j++) {
     /* For each option in the original select element,
     create a new DIV that will act as an option item: */
     c = document.createElement("DIV");
     c.innerHTML = selElmnt.options[j].innerHTML;
     c.addEventListener("click", function(e) {
         /* When an item is clicked, update the original select box,
         and the selected item: */
         var y, i, k, s, h, sl, yl;
         s = this.parentNode.parentNode.getElementsByTagName("select")[0];
         sl = s.length;
         h = this.parentNode.previousSibling;
         for (i = 0; i < sl; i++) {
           if (s.options[i].innerHTML == this.innerHTML) {
             s.selectedIndex = i;
             h.innerHTML = this.innerHTML;
             y = this.parentNode.getElementsByClassName("same-as-selected");
             yl = y.length;
             for (k = 0; k < yl; k++) {
               y[k].removeAttribute("class");
             }
             this.setAttribute("class", "same-as-selected");
             break;
           }
         }
         h.click();
     });
     b.appendChild(c);
   }
   x[i].appendChild(b);
   a.addEventListener("click", function(e) {
     /* When the select box is clicked, close any other select boxes,
     and open/close the current select box: */
     e.stopPropagation();
     closeAllSelect(this);
     this.nextSibling.classList.toggle("select-hide");
     this.classList.toggle("select-arrow-active");
   });
 }
 
 function closeAllSelect(elmnt) {
   /* A function that will close all select boxes in the document,
   except the current select box: */
   var x, y, i, xl, yl, arrNo = [];
   x = document.getElementsByClassName("select-items");
   y = document.getElementsByClassName("select-selected");
   xl = x.length;
   yl = y.length;
   for (i = 0; i < yl; i++) {
     if (elmnt == y[i]) {
       arrNo.push(i)
     } else {
       y[i].classList.remove("select-arrow-active");
     }
   }
   for (i = 0; i < xl; i++) {
     if (arrNo.indexOf(i)) {
       x[i].classList.add("select-hide");
     }
   }
 }
 
 /* If the user clicks anywhere outside the select box,
 then close all select boxes: */
 document.addEventListener("click", closeAllSelect);


 //////////////////////////    Multi Tab ForgotPassword    ///////////////////////////////////

var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0 || n==2 || n==3) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  console.log(n)
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "بزن بریم";
  } else {
    document.getElementById("nextBtn").innerHTML = "تایید";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("forgot-password").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}

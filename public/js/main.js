window.onscroll = function () {
  myFunction();
};

var header = document.getElementsByTagName("nav")[0];
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("fixed-top");
  } else {
    header.classList.remove("fixed-top");
  }
}

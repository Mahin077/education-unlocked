function myFunction() {
    var x = document.getElementById("moreDIV");
    var more = document.getElementById("more");
    var less = document.getElementById("less");
    x.style.fontSize="18px";
    x.style.marginTop="2%";
    x.style.marginLeft="30px";
    x.style.marginRight="5%";

    if (x.style.display === "none") {
      x.style.display = "block";
      more.style.display="none";
      less.style.display="block";
      
    } else {
      x.style.display = "none";
      less.style.display="none";
      more.style.display="block";
    }
  }
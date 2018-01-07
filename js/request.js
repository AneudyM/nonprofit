// Service Request Form
// Dynamically populate municipality field based on provinces

var provinces = document.getElementById("province-input");
provinces.addEventListener("change", sendProvince);

function sendProvince() {
  var provinceIndex = provinces.selectedIndex;
  var provinceText = provinces.item(provinceIndex).innerText;
  var req = new XMLHttpRequest();
  req.open("GET", "../app/getprovinces.php?province=" + provinceText, true);
  req.addEventListener("load", function () {
    var municipality = req.responseText;
    console.log(municipality);
    populateMunicipality(municipality);
  });
  req.send(null);
}

function populateMunicipality(municipality){
  var municipalities = document.getElementById("municipality-input");
  municipalities.innerHTML = municipality;
}
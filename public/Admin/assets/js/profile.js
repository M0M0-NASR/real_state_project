
//setting box
document.querySelector(".toggle-setting .fa-gear").onclick = function(){
  this.classList.toggle("fa-spin");
  document.querySelector(".setting-box").classList.toggle("open");
}
//toggle sections
function toggleSection(sectionId) {
  var section = document.getElementById(sectionId);
  if (section.style.display !== 'none') {
    section.style.display = 'none';
  } else {
    section.style.display = 'flex';
  }
}



//profile config

  function toggleAside(asideId) {
    var asides = document.querySelectorAll("aside");
    for (var i = 0; i < asides.length; i++) {
      if (asides[i].id !== asideId) {
        asides[i].classList.remove("open");
      }
    }
    // get the aside element we want to open
    var aside = document.getElementById(asideId);
    aside.classList.toggle("open");


  }

//add date for my-property and favorited property

  var currentDate = new Date();
  var dateString = currentDate.toLocaleDateString();
  var timeString = currentDate.toLocaleTimeString();
  
  var dateAdded = dateString + ' at ' + timeString;

  document.getElementById('date-added').innerHTML =  dateAdded;
  document.getElementById('date-added1').innerHTML =  dateAdded;
  document.getElementById('date-added2').innerHTML =  dateAdded;
  document.getElementById('date-added3').innerHTML =  dateAdded;



let prevButton = null;

const wrapper = document.getElementById("wor");

wrapper.addEventListener('click', (e) => {

  const isButton = e.target.nodeName === 'BUTTON'; 
  
  if (!isButton) {
    return;
  }
  
  e.target.classList.add('active'); // Add .active CSS Class

  if(prevButton !== null) {
    prevButton.classList.remove('active');  // Remove .active CSS Class
  }
  
  prevButton = e.target;

});
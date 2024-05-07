function getImagePreview(event) {
 var image = URL.createObjectURL(event.target.files[0]);
 var imageDiv = document.getElementById('Preview');
 var NewImage = document.createElement('img');
 imageDiv.innerHTML = '';
 NewImage.src = image;
 imageDiv.appendChild(NewImage);
  };


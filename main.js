window.URL = window.URL || window.webkitURL;
//  fileSelect = document.getElementById("fileSelect"),

var fileElem = document.getElementById("fileElem"),
    fileList = document.getElementById("fileList");

// fileSelect.addEventListener("click", function (e) {
//   if (fileElem) {
//     fileElem.click();
//   }
//   e.preventDefault(); // prevent navigation to "#"
// }, false);

function handleFiles(files) {
  if (!files.length) {
    fileList.innerHTML = "<p>No files selected!</p>";
  } else {
    // fileList.innerHTML = "";

      
      var img = document.createElement("img");
      img.src = window.URL.createObjectURL(files[0]);
      img.height = 60;
      img.onload = function() {
        window.URL.revokeObjectURL(this.src);
      }
      fileList.appendChild(img);
//       var info = document.createElement("span");
//       info.innerHTML = files[0].name + ": " + files[0].size + " bytes";
//       fileList.appendChild(info);
    }
 }
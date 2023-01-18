function triggerClick(){
    document.querySelector('#file').click();
}
function filePreview(e) {
    if (e.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.querySelector('#imagedisplay').setAttribute('src',e.target.result);
        };
        reader.readAsDataURL(e.files[0]);
    }
}

//selecting all required elements
const filterItem = document.querySelector(".items");
const filterImg = document.querySelectorAll(".gallery .image");

window.onload = ()=>{
  filterItem.onclick = (selectedItem)=>{
    if(selectedItem.target.classList.contains("item")){
      filterItem.querySelector(".active").classList.remove("active");
      selectedItem.target.classList.add("active");
      let filterName = selectedItem.target.getAttribute("data-name");
      filterImg.forEach((image) => {
        let filterImges = image.getAttribute("data-name");
        //if user selected item data-name value is equal to images data-name value
        //or user selected item data-name value is equal to "all"
        if((filterImges == filterName) || (filterName == "all")){
          image.classList.remove("hide")
          image.classList.add("show");
        }else{
          image.classList.add("hide");
          image.classList.remove("show");
        }
      });
    }
  }
  for (let i = 0; i < filterImg.length; i++) {
    filterImg[i].setAttribute("onclick", "preview(this)");
  }
}

//selecting all required elements
const previewBox = document.querySelector(".preview-box"),
categoryName = previewBox.querySelector(".title p"),
previewImg = previewBox.querySelector("img"),
closeIcon = previewBox.querySelector(".icon"),
shadow = document.querySelector(".shadow");

function preview(element){
  document.querySelector("body").style.overflow = "hidden";
  let selectedPrevImg = element.querySelector("img").src;
  let selectedImgCategory = element.getAttribute("data-name");
  previewImg.src = selectedPrevImg;
  categoryName.textContent = selectedImgCategory;
  previewBox.classList.add("show");
  shadow.classList.add("show");
  closeIcon.onclick = ()=>{
    previewBox.classList.remove("show");
    shadow.classList.remove("show");
    document.querySelector("body").style.overflow = "hidden";
  }
}

// user account dropdown menu
function menuToggle(){
  const toggleMenu = document.querySelector('.menu');
  toggleMenu.classList.toggle('active');
}

// //selecting all required elements
// const filterPlace = document.querySelector(".place-div");
// const filterdetail = document.querySelectorAll(".card-container .pcontainer");

// window.onload = ()=>{
//   filterPlace.onclick = (selectedItem)=>{
//     if(selectedItem.target.classList.contains("place-class")){
//       filterPlace.querySelector(".active").classList.remove("active");
//       selectedItem.target.classList.add("active");
//       let filterrName = selectedItem.target.getAttribute("data-target");
//       filterdetail.forEach((pcontainer) => {
//         let filterdetails = pcontainer.getAttribute("data-target");
//         //if user selected item data-name value is equal to images data-name value
//         //or user selected item data-name value is equal to "all"
//         if((filterdetails == filterrName) || (filterrName == "all")){
//           pcontainer.classList.remove("hide")
//           pcontainer.classList.add("show");
//         }else{
//           pcontainer.classList.add("hide");
//           pcontainer.classList.remove("show");
//         }
//       });
//     }
//   }
//   for (let i = 0; i < filterdetail.length; i++) {
//     filterdetail[i].setAttribute("onclick", "preview(this)");
//   }
// }
    //getting modal opening button
    var modalBtns = document.querySelectorAll(".modal-open");

    modalBtns.forEach(function(btn){
        btn.onclick = function(){
            var modal = btn.getAttribute("data-modal")

            document.getElementById(modal).style.display = "block";
        };
    });

    //getting close modal
    var closeBtns = document.querySelectorAll(".close");

    closeBtns.forEach(function(btn){
      btn.onclick = function(){
        var modal = (btn.closest(".modal-container").style.display = "none");
      };
    });

    //login and register form link
    var closeBtns = document.querySelectorAll(".modal-openn");

    closeBtns.forEach(function(btn){
      btn.onclick = function(){
        var model = (btn.closest(".modal-container").style.display = "none");
        var modal = btn.getAttribute("data-modal")

        document.getElementById(modal).style.display = "block";

      };
    });

    // When the user clicks anywhere outside of the modal, close it
    var log = document.getElementById('login');
    window.onclick = function(event) {
      if (event.target == log) {
        log.style.display = "none";
      }
    }
    var reg = document.getElementById('register');
    window.onclick = function(event) {
      if (event.target == reg) {
        reg.style.display = "none";
      }
    }

    // logging out
    function logout(){
        location.replace("ulogout.php")
    }
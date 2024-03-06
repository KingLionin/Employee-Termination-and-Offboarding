document.addEventListener("DOMContentLoaded", function(event) {

 // Declarations
 const showNavbar = (toggleId, navId, bodyId, headerId) =>{
 const toggle = document.getElementById(toggleId),
 nav = document.getElementById(navId),
 bodypd = document.getElementById(bodyId),
 headerpd = document.getElementById(headerId)
    
    // Validate variables
    if(toggle && nav && bodypd && headerpd){

     toggle.addEventListener('click', () => {
     // navbar show
     nav.classList.toggle('show')
     // dynamic icon change
     toggle.classList.toggle('bi-x')
     // increase padding to the body
     bodypd.classList.toggle('body-pd')
     // increase padding to the body
     headerpd.classList.toggle('body-pd')
     })
    }
  }

  showNavbar('header-toggle','nav-bar','body-pd','header')

    
});
(() =>{
    /* 
	function goToContent
	search the term on the content, go to then with animation
    on menu https://www.comprarmicafetera.com/molinillos/cecotec-steelmill-2000-adjust/
	*/
	goToContent = function(term) {
        const content = document.querySelector('.product-content');
            const elements = content.getElementsByTagName('h2');
        for(let i = 0; i < elements.length; i++) { 
          let text = elements[i].textContent;
          if (text.indexOf(term) > -1) {
            window.scrollTo(0, elements[i].offsetTop - 120); // 120px from header fixed
          }
        };
    }
    
    /*
    scripts to control the menu
    */
    const openNavMenu = document.querySelector(".open-nav-menu"),
    closeNavMenu = document.querySelector(".close-nav-menu"),
    navMenu = document.querySelector(".nav-menu"),
    menuOverlay = document.querySelector(".menu-overlay"),
    mediaSize = 991;
  
    openNavMenu.addEventListener("click", toggleNav);
    closeNavMenu.addEventListener("click", toggleNav);
    // close the navMenu by clicking outside
    menuOverlay.addEventListener("click", toggleNav);
  
    function toggleNav() {
        navMenu.classList.toggle("open");
        menuOverlay.classList.toggle("active");
        document.body.classList.toggle("hidden-scrolling");
    }
  
    navMenu.addEventListener("click", (event) =>{
        if(event.target.hasAttribute("data-toggle") && 
            window.innerWidth <= mediaSize){
            // prevent default anchor click behavior
            event.preventDefault();
            const menuItemHasChildren = event.target.parentElement;
          // if menuItemHasChildren is already expanded, collapse it
          if(menuItemHasChildren.classList.contains("active")){
              collapseSubMenu();
          }
          else{
            // collapse existing expanded menuItemHasChildren
            if(navMenu.querySelector(".menu-item-has-children.active")){
              collapseSubMenu();
            }
            // expand new menuItemHasChildren
            menuItemHasChildren.classList.add("active");
            const subMenu = menuItemHasChildren.querySelector(".sub-menu");
            subMenu.style.maxHeight = subMenu.scrollHeight + "px";
          }
        }
    });
    function collapseSubMenu(){
        navMenu.querySelector(".menu-item-has-children.active .sub-menu")
        .removeAttribute("style");
        navMenu.querySelector(".menu-item-has-children.active")
        .classList.remove("active");
    }
    function resizeFix(){
         // if navMenu is open ,close it
         if(navMenu.classList.contains("open")){
             toggleNav();
         }
         // if menuItemHasChildren is expanded , collapse it
         if(navMenu.querySelector(".menu-item-has-children.active")){
              collapseSubMenu();
       }
    }
  
    window.addEventListener("resize", function(){
       if(this.innerWidth > mediaSize){
           resizeFix();
       }
    });
  
})();
  

/* newsletter button click */

const subscribeBtn = document.getElementById('subscribe-btn');
const subscriberSuccessAlert = document.getElementById('subscriber-text');
const subscriberEmailInput = document.getElementById('subscribe-email-input');

const subscribeNow = () =>{

    const checkEmail = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if(checkEmail.test(String(subscriberEmailInput.value).toLowerCase())){

        subscriberSuccessAlert.style.display = 'block';
        subscriberEmailInput.value = '';
    }
    else{
        subscriberSuccessAlert.style.display = 'none';
    }
}
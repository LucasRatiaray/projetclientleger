  /* -----------------------------
          Page Loader
  ------------------------------- */
  window.addEventListener("load", () =>{
 
    document.querySelector(".page-loader").classList.add("fade-out");
    setTimeout(() =>{
        document.querySelector(".page-loader").style.display = "none";
    },700);
  });

/* --------------
    Variables 
 --------------- */
const navbar = document.querySelector('.small-header');
const menu_btn = document.querySelector('#menu-btn');
const search_btn = document.querySelector('#search-btn');
const user_btn = document.querySelector('#user-btn');
const profile = document.querySelector('.header .flex .profile');


/* --------------
    fonctions 
 --------------- */
function toggleNavBar(){
    menu_btn.classList.toggle('fa-times');
    navbar.classList.toggle('active');
    profile.classList.remove('active');
}

function removeToggle(){
    profile.classList.remove('active');
    navbar.classList.remove('active');
    menu_btn.classList.remove('fa-times');
}

function showProfil(){
    profile.classList.toggle('active');
    navbar.classList.remove('active');
}


/* -------------------
    Partie principale
 --------------------- */

user_btn.addEventListener("click",showProfil); 

menu_btn.addEventListener('click',() =>{
    toggleNavBar();

    window.addEventListener("scroll",()=>{
        removeToggle();
    });

    document.addEventListener("click",(e)=>{
        if(e.target.classList.contains("small-header")){
            removeToggle();
        }
    });
    
});
search_btn.addEventListener('click',() =>{
    toggleNavBar();

    window.addEventListener("scroll",()=>{
        removeToggle();
    });

    document.addEventListener("click",(e)=>{
        if(e.target.classList.contains("small-header")){
            removeToggle();
        }
    });
    
});


/**
 * @param {string} css_animation_class - The animation class name to be added to the element
 * @returns {void}
*/

function reveal(css_animation_class){
    
    let animation_css = document.querySelectorAll("."+css_animation_class);

    for (let i = 0; i< animation_css.length; i++){
        
        let windowHeight = window.innerHeight;
        let top = animation_css[i].getBoundingClientRect().top;
        let reveal_point = 150;

        if(top < windowHeight - reveal_point){ 
            animation_css[i].classList.add('active');
        }
    }
}

// Reveal elements on scroll
window.addEventListener('scroll', () => {
    reveal('reveal_top');
    reveal('reveal_bottom');
    reveal('reveal_left');
    reveal('reveal_right');
    reveal('reveal_fade');
    reveal('reveal_zoom');
    reveal('reveal_rotate');
});


// ********** close links ************
const linksContainer = document.querySelector('.links-container');
const links = document.querySelector('.links');
const navToggle = document.querySelector('.nav-toggle i');

navToggle.addEventListener('click',() =>{

    const containerHeight = linksContainer.getBoundingClientRect().height;
    const linksHeight = links.getBoundingClientRect().height;

    if(containerHeight === 0)
    {
        linksContainer.style.height = `${linksHeight}px`;
    }
    else{
        linksContainer.style.height = 0;
    }
  

});

// ********** fixed navbar ************
const navbar = document.getElementById('nav');
const topLink = document.querySelector('.top-link'); 
window.addEventListener('scroll',()=>{

    console.log(window.pageYOffset);

    const scrollHeight = window.pageYOffset;
    const navHeight = navbar.getBoundingClientRect().height;

    if(scrollHeight > navHeight)
    {
        navbar.classList.add('fixed-nav');
    }

    else{

        navbar.classList.remove('fixed-nav');
    }
});
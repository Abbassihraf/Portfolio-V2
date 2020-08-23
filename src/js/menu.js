
// ********** set date ************
const date = document.getElementById('date');
date.innerHTML = new Date().getFullYear();
// ********** close links ************
const linksContainer = document.querySelector('.links-container');
const links = document.querySelector('.links');
// console.log(links);
const navToggle = document.querySelector('.nav-toggle i');

navToggle.addEventListener('click',() =>{

    // linksContainer.classList.toggle('show-links');
    const containerHeight = linksContainer.getBoundingClientRect().height;
    // console.log(containerHeight);
    const linksHeight = links.getBoundingClientRect().height;
    // console.log(linksHeight);
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
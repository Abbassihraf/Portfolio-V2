//* *********** DOM ***********

const about = document.querySelector('.aboutMe')
const service = document.querySelector('.service')
const skills = document.querySelector('.skills')
const aboutBtn = document.querySelector('.aboutMe__aboutBtn')
const serviceBtn = document.querySelector('.aboutMe__serviceBtn')
const skillsBtn = document.querySelector('.aboutMe__skillsBtn')

//* *********** DOM END ***********

//* *********** EVENTS ***********

if(aboutBtn !== null)
aboutBtn.addEventListener('click',fAbout);

if(serviceBtn !== null)
serviceBtn.addEventListener('click',fService);

if(skillsBtn !== null)
skillsBtn.addEventListener('click',fSkills);



function fAbout(){
    about.style.display = 'grid'
    service.style.display ='none'
    skills.style.display ='none'
    serviceBtn.classList.remove('activeBtn')
    skillsBtn.classList.remove('activeBtn')
    aboutBtn.classList.add('activeBtn')
}

function fService(){
    about.style.display = 'none'
    service.style.display ='grid'
    skills.style.display ='none'
    serviceBtn.classList.add('activeBtn')
    skillsBtn.classList.remove('activeBtn')
    aboutBtn.classList.remove('activeBtn')
}

function fSkills(){
    about.style.display = 'none'
    service.style.display ='none'
    skills.style.display ='grid'
    serviceBtn.classList.remove('activeBtn')
    skillsBtn.classList.add('activeBtn')
    aboutBtn.classList.remove('activeBtn')
}

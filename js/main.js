// btn-up
window.addEventListener('scroll', btnUp)

function btnUp() {
    const nav = document.getElementById('nav')
if(window.scrollY > nav.offsetHeight + 2100) {
    this.document.getElementById('up').style.display = 'block';
} else {
    document.getElementById('up').style.display = 'none';
}
}

// navbar
const toggle = document.querySelector('.nav-toggle');
const links = document.querySelector('nav');

toggle.addEventListener('click', () => {
    toggle.classList.toggle('rotate');
    links.classList.toggle('active');
})

//pop-up

const open1 = document.getElementById('open-card1');
const modalContent = document.getElementById('containerModal');
const close = document.getElementById('close-card');

open1.addEventListener('click', () => {
    modalContent.classList.add('show');
});

close.addEventListener('click', () => {
    modalContent.classList.remove('show');
});

 const open2 = document.getElementById('open-card2');

 open2.addEventListener('click', () => {
     modalContent.classList.add('show');
 });

 const open3 = document.getElementById('open-card3');

 open3.addEventListener('click', () => {
     modalContent.classList.add('show');
 });

 const open4 = document.getElementById('open-card4');

 open4.addEventListener('click', () => {
     modalContent.classList.add('show');
 });

 const open5 = document.getElementById('open-card5');

 open5.addEventListener('click', () => {
     modalContent.classList.add('show');
 });

 const open6 = document.getElementById('open-card6');

 open6.addEventListener('click', () => {
     modalContent.classList.add('show');
 });

 const open = document.getElementById('open-card7');

 open.addEventListener('click', () => {
     modalContent.classList.add('show');
 });
 

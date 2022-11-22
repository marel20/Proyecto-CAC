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

const open = document.getElementById('open-card1');
const modalContent = document.getElementById('containerModal');
const close = document.getElementById('close-card');

open.addEventListener('click', () => {
    modalContent.classList.add('show');
});

close.addEventListener('click', () => {
    modalContent.classList.remove('show');
});

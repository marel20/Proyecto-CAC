// btn-up
window.addEventListener('scroll', btnUp)

function btnUp() {
if(window.scrollY > nav.offsetHeight + 750) {
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

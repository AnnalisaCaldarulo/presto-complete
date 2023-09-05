let navbar = document.querySelector('#navbar');
let navLinks = document.querySelectorAll('.nav');
let menu = document.querySelector('.menu');

window.addEventListener('scroll', () => {

    if (window.scrollY > 0) {
        navbar.style.backgroundColor = `var(--dark)`;
        navLinks.forEach(element => {
            element.style.color = `white`
        });
        // navLinks.style.color = `white`;
        // menu.style.color  = `white`;
        // menu.backgroundColor = `transparent`;



    } else {
        navbar.style.backgroundColor = `transparent`;
        navLinks.forEach(element => {
            element.style.color = `var(--dark)`
        });
        // navLinks.style.color = `var(--dark)`;
        // menu.style.color = `var(--dark)`;
        // menu.backgroundColor = `transparent`;

    }
})

// let toggle = document.querySelector("#toggle-btn");
// let open = document.querySelector('#dropdown');
// toggle.addEventListener('click', () => {
//     open.classList.toggle("open");

// })
let rectangle = document.querySelector('.rectangle');
setTimeout(() => {
    rectangle.remove();
}, 3500);



AOS.init();
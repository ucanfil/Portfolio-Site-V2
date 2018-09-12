
//======= H1 Style Solution for IE10 =======//
var doc = document.documentElement;
doc.setAttribute('data-useragent', navigator.userAgent);

//======= Smooth Scroolling =======//
// Src="https://stackoverflow.com/a/7717572"
if (navigator.appVersion.indexOf('MSIE 10') === -1) {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
}



/*
let header = document.querySelector('.intro-header');

header.innerHTML = '';
let headerText = ['Not your average web-developer.'];
let text = headerText[0].split('');

function addLetter() {
    console.log(text);
    if (header.innerHTML.length < 31) {
        header.innerHTML += text.splice(0, 1);
    }
}




let timerId = setInterval(addLetter, 150);

*/
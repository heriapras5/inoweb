function loadComponent(id, url) {
    return fetch(url)
        .then(res => res.text())
        .then(html => {
            document.getElementById(id).innerHTML = html;
        });
}

function setActiveNav(page) {
    const links = document.querySelectorAll('#mainNav .nav-link');
    links.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === page || link.getAttribute('href').includes(page)) {
            link.classList.add('active');
        }
    });
}
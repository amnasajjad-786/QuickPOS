// QuickPOS landing page – small progressive enhancements.
// The page works without JavaScript; these only improve the experience.
document.documentElement.classList.add('js');

(function () {
    const header = document.getElementById('site-header');
    const toggle = document.querySelector('.nav-toggle');
    const nav = document.getElementById('site-nav');
    if (!header || !toggle || !nav) return;

    const label = toggle.querySelector('.visually-hidden');

    function setOpen(open) {
        toggle.setAttribute('aria-expanded', String(open));
        header.classList.toggle('is-open', open);
        if (label) label.textContent = open ? 'Close menu' : 'Open menu';
    }

    toggle.addEventListener('click', function () {
        setOpen(toggle.getAttribute('aria-expanded') !== 'true');
    });

    // Close the mobile menu after choosing a link.
    nav.addEventListener('click', function (event) {
        if (event.target.closest('a')) setOpen(false);
    });

    // Close with the Escape key.
    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') setOpen(false);
    });

    // Reset the menu when the window grows to the desktop layout.
    const desktop = window.matchMedia('(min-width: 768px)');
    desktop.addEventListener('change', function (mq) {
        if (mq.matches) setOpen(false);
    });

    // Add a subtle shadow once the page is scrolled.
    function onScroll() {
        header.classList.toggle('is-scrolled', window.scrollY > 4);
    }
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
})();

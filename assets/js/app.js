(function (window, document, undefined) {

    var body = document.body;

    var mobileMenu = (function () {
        var openButton = document.querySelector('.site-header__mobile-menu-button');
        var closeButton = document.querySelector('button.mobile-menu__close-button');
        var overlay = document.getElementById('canvas-content-overlay');
        
        var openClose = function (event) {
            event.preventDefault();
            body.classList.toggle('mobile-menu-is-open');
        };

        openButton.addEventListener('click', openClose);
        openButton.addEventListener('touch', openClose);
        closeButton.addEventListener('click', openClose);
        closeButton.addEventListener('touch', openClose);
        overlay.addEventListener('click', openClose);
        overlay.addEventListener('touch', openClose);
    })();

    WebFont.load({
        google: {
            families: ['Oswald:700']
        }
    });

})(window, document);
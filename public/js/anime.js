const imagemLogo = document.querySelector('#imagemLogo');

anime({
    targets: imagemLogo,
    translateY: 50,
    duration: 3000,
    direction: 'alternate',
    loop: true,
    easing: 'easeInOutSine'
});
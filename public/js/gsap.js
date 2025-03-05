/* NAVBAR */
const navbar = document.querySelector("#navbar");
const content = document.querySelector("#content");

gsap.to(navbar, {
    y: -5,
    padding: 5,
    duration: 2,
    backgroundColor: '#FDFDFC',
    scrollTrigger: {
        trigger: content,
        start: 'top',
        end: 'top',
        scrub: true,
    }
});

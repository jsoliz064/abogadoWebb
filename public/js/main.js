const themeButton = document.getElementById('theme-button');
const darkTheme = 'dark-theme';
const iconTheme = 'uil-sun';
const selectedTheme = localStorage.getItem('selected-theme');
const selectedIcon = localStorage.getItem('selected-icon');
const getCurrentTheme = () => document.body.classList.contains(darkTheme) ? 'dark' : 'light';
const getCurrentIcon = () => themeButton.classList.contains(iconTheme) ? 'uil-moon' : 'uil-sun';
 if (selectedTheme) {
     document.body.classList[selectedTheme === 'dark' ? 'add' : 'remove'](darkTheme), 
     themeButton.classList[selectedIcon === 'uil-moon' ? 'add' : 'remove'](iconTheme)
    };

  themeButton.addEventListener('click', () => {
      document.body.classList.toggle(darkTheme), 
      themeButton.classList.toggle(iconTheme),
      localStorage.setItem('selected-theme', getCurrentTheme()), 
      localStorage.setItem('selected-icon', getCurrentIcon())
    }); 
    
  const sr = ScrollReveal({ origin: 'top', distance: '30px', duration: 2000, reset: true});
   sr.reveal(`.home_content, .home_img, .footer_content, .pack_content, .semestres_content`, {interval: 200}); function scrollUp(){const scrollUp = document.getElementById('scroll-up'); 
   if(this.scrollY >= 560) scrollUp.classList.add('show-scroll'); 
   else scrollUp.classList.remove('show-scroll')}; window.addEventListener('scroll', scrollUp); 
   new Typewriter('#typewriter', {strings: ['C. I. Sistemas', 'C. I. Informatica', 'C. I. Redes y Telecomunicaciones','Aprende +', ''], autoStart: true, loop: true, cursor: "|"}); 
   document.addEventListener('mousemove', move); 
   function move(e){this.querySelectorAll('.move').forEach(layer =>{ const speed = layer.getAttribute('data-speed'); 
   const x = (window.innerWidth - e.pageX*speed)/120; const y = (window.innerHeight - e.pageY*speed)/120
layer.style.transform = `translateX(${x}px) translateY(${y}px)`})};

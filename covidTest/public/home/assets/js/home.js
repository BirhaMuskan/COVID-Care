 document.querySelectorAll('a[href^="#"]').forEach(a=>{
      a.addEventListener('click', e=>{
        const id = a.getAttribute('href');
        if(!id || id === '#') return;
        const el = document.querySelector(id);
        if(!el) return;
        e.preventDefault();
        const y = el.getBoundingClientRect().top + window.pageYOffset - 80;
        window.scrollTo({ top: y, behavior:'smooth' });
      });
    });

 function scrollHospitals(direction) {
    const slider = document.getElementById("hospitalSlider");
    const scrollAmount = 320;
    slider.scrollBy({
      left: direction * scrollAmount,
      behavior: "smooth"
    });
  
}


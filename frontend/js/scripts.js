
    const slider = () => {
      
      const backImg = [];
      backImg[0] = "https://media.gettyimages.com/photos/salt-pond-picture-id175603484?k=6&m=175603484&s=612x612&w=0&h=H0cBJ6uM1ytpmOCtuXTdas5bkcHETSJGDWrH7Vu-fLI=";
      backImg[1] = "https://media.gettyimages.com/photos/salt-mining-in-salar-de-uyuni-picture-id118365447?k=6&m=118365447&s=612x612&w=0&h=B-UWxQXvElrWeE2Jhdlo-zknMPNKmJ3FCL0apeEM3c0=";
      backImg[2] = "https://media.gettyimages.com/photos/excavator-at-work-in-a-salt-mine-picture-id97659971?k=6&m=97659971&s=612x612&w=0&h=tIMJECJ6EO-5PD2bHHFr_P18yKeLrqAfdCFl7wR1EWw=";
      
      let i = 0;
      let x = (backImg.length) - 1;
      let int = 8000;
      let first = true;

      const showNext = () => {
        elements.slider.classList.remove('active');
        elements.btn.animated.classList.remove('btn--animated');
        (i >= x) ? i = 0 : i++;
        changeImg(i);
        elements.count.innerText = ("0" + (i + 1)).slice(-2);
      };
      
      interval = setInterval(showNext, int); // hoist?
      
      const elements = {
        slider: document.querySelector('.header'),
        btn: { 
          left: document.querySelector('.controls__arrow--prev'),
          right: document.querySelector('.controls__arrow--next'),
          animated: document.querySelector('.btn--animated')
        },
        count: document.querySelector('.count-slider__current')
      }
      
      const startInterval = () => {
         interval = setInterval(showNext, int);
      }
      
      const stopInterval = () => {
        clearInterval(interval);
      }
      
      const attachEvents = () => {
        elements.btn.left.onclick = () => { showPrevious(); };
        elements.btn.right.onclick = () => {  showNext(); };
        elements.slider.addEventListener("mouseenter", stopInterval);
        elements.slider.addEventListener("mouseleave", startInterval);
      };
      
      const changeImg = () => {
          console.log(i)
        setTimeout(() => {
            elements.slider.classList.toggle('active');
            if(first) {
                first = false;
            } else {
                elements.btn.animated.classList.toggle('btn--animated');
            }
        }, 60);
        
        elements.slider.style.backgroundImage = 'url(' + backImg[i] + ')';
      }
      
      const initialize = (() => {
        elements.count.innerText = ("0" + (i + 1)).slice(-2);
        attachEvents();
        changeImg(i);
      })();

      const showPrevious = () => {
        elements.slider.classList.remove('active');       
        elements.btn.animated.classList.remove('btn--animated');           
        (i <= 0) ? i = x : i--;
        changeImg(i);
        elements.count.innerText = ("0" + (i + 1)).slice(-2);
      };

    };

    slider();
  
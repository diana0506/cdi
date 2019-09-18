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
        count: document.querySelector('.count-slider__current'),
        textBox: document.querySelectorAll('.header__text-box')
    }

    const startInterval = () => {
        interval = setInterval(showNext, int);
    }

    const stopInterval = () => {
        clearInterval(interval);
    }

    const attachEvents = () => {
        elements.btn.left.onclick = () => { showPrevious(); };
        elements.btn.right.onclick = () => { showNext(); };
        elements.slider.addEventListener("mouseenter", stopInterval);
        elements.slider.addEventListener("mouseleave", startInterval);
    };

    const changeImg = () => {
        setTimeout(() => {
            elements.slider.classList.toggle('active');
            if (first) {
                first = false;
            } else {
                elements.btn.animated.classList.toggle('btn--animated');
            }
        }, 60);
        elements.slider.style.backgroundImage = 'url(' + backImg[i] + ')';
        arrTextBox = [...elements.textBox];
        arrTextBox.forEach(elem => {
            elem.classList.remove('active');
        });
        arrTextBox[i].classList.add('active');
    }

    const initialize = (() => {
        elements.count.innerText = ("0" + (i + 1)).slice(-2);
        attachEvents();
        changeImg(i);
    })();

    const showPrevious = () => {
        elements.slider.classList.remove('active');
        elements.btn.animated.classList.remove('btn--animated');
        (i <= 0) ? i = x: i--;
        changeImg(i);
        elements.count.innerText = ("0" + (i + 1)).slice(-2);
    };

};
slider();

function initMap() {
    var styledMapType = new google.maps.StyledMapType(
        [
    {
        "featureType": "all",
        "elementType": "geometry",
        "stylers": [
            {
                "saturation": "0"
            },
            {
                "lightness": "0"
            },
            {
                "visibility": "on"
            },
            {
                "gamma": "1"
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "saturation": 36
            },
            {
                "color": "#e0e9f2"
            },
            {
                "lightness": 40
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "visibility": "off"
            },
            {
                "color": "#000000"
            },
            {
                "lightness": "0"
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "labels.text",
        "stylers": [
            {
                "visibility": "simplified"
            },
            {
                "saturation": "-100"
            },
            {
                "lightness": "-43"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#5a5858"
            },
            {
                "lightness": "0"
            },
            {
                "visibility": "on"
            },
            {
                "weight": "1.00"
            },
            {
                "gamma": "1"
            },
            {
                "saturation": "-54"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#6a6969"
            },
            {
                "lightness": "0"
            }
        ]
    },
    {
        "featureType": "poi.attraction",
        "elementType": "geometry",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "poi.attraction",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi.attraction",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi.business",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "poi.park",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#698577"
            }
        ]
    },
    {
        "featureType": "poi.park",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "labels",
        "stylers": [
            {
                "invert_lightness": true
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            },
            {
                "saturation": "-100"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "lightness": "0"
            },
            {
                "color": "#474747"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": "0"
            },
            {
                "weight": 0.2
            },
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "invert_lightness": true
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            },
            {
                "saturation": "-100"
            }
        ]
    },
    {
        "featureType": "road.highway.controlled_access",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#a1a1a1"
            },
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road.highway.controlled_access",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "geometry",
        "stylers": [
            {
                "lightness": "0"
            },
            {
                "visibility": "on"
            },
            {
                "color": "#474747"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#454545"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "labels",
        "stylers": [
            {
                "saturation": "-80"
            },
            {
                "lightness": "42"
            },
            {
                "color": "#989898"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "labels.icon",
        "stylers": [
            {
                "saturation": "-100"
            }
        ]
    },
    {
        "featureType": "road.local",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#474747"
            },
            {
                "lightness": "0"
            }
        ]
    },
    {
        "featureType": "road.local",
        "elementType": "labels",
        "stylers": [
            {
                "lightness": "8"
            },
            {
                "color": "#909090"
            }
        ]
    },
    {
        "featureType": "road.local",
        "elementType": "labels.icon",
        "stylers": [
            {
                "saturation": "-100"
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#6d6d6d"
            },
            {
                "lightness": "0"
            },
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#616e74"
            },
            {
                "lightness": "0"
            }
        ]
    }
],
        {name: 'Styled Map'});
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 7,
    disableDefaultUI: true,
    center: {lat: 45.34994243613083, lng: 23.033166749999964}
  });

   //Associate the styled map with the MapTypeId and set it to display.
        map.mapTypes.set('styled_map', styledMapType);
        map.setMapTypeId('styled_map');

  setMarkers(map);
}

var locations = [
  ['Bucuresti', 44.4363, 26.09835, 2],
  ['Timisoara', 45.76999, 21.19844, 1]
];

function setMarkers(map) {
  // Adds markers to the map.

  // Marker sizes are expressed as a Size of X,Y where the origin of the image
  // (0,0) is located in the top left of the image.

  // Origins, anchor positions and coordinates of the marker increase in the X
  // direction to the right and in the Y direction down.
  var image = {
    url: 'img/pin.png',
    // This marker is 20 pixels wide by 32 pixels high.
    size: new google.maps.Size(100, 100),
   
  };
  // Shapes define the clickable region of the icon. The type defines an HTML
  // <area> element 'poly' which traces out a polygon as a series of X,Y points.
  // The final coordinate closes the poly by connecting to the first coordinate.
  var shape = {
    coords: [1, 1, 1, 20, 18, 20, 18, 1],
    type: 'poly'
  };
  for (var i = 0; i < locations.length; i++) {
    var location = locations[i];
    var marker = new google.maps.Marker({
      position: {lat: location[1], lng: location[2]},
      map: map,
      icon: image,
      shape: shape,
      title: location[0],
      zIndex: location[3]
    });
  }
}

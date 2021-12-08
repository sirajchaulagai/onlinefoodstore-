slider = document.querySelector('.slider_image');

slider1 = document.querySelector('.slider_image_next');

var sliderCount = 0;

var sliderState = 2;

images = [

    'assets/img/22.jpg',

    'assets/img/12.jpg',

    'assets/img/55.jpg',

];

window.onload = function () {

    setInterval(function () {

        startSlider();

    }, 3000);

}



function startSlider() {

    switch(sliderState){

        case 1:

            slider.querySelector('img').src = images[sliderCount];

            slider1.style.left = '-150%';

            break;

        case 2:

            slider1.querySelector('img').src = images[sliderCount];

            slider1.style.left = '0%';

            break;

        case 3:

            slider.querySelector('img').src = images[sliderCount];

            slider1.style.left = '150%';

            break;

        case 4:

            slider1.querySelector('img').src = images[sliderCount];

            slider1.style.left = '0%';

            break;

    }

    if(sliderState<4) sliderState++;

    else sliderState = 1;

    if (sliderCount + 1 == images.length)

        sliderCount = 0;

    else

        sliderCount++;

}
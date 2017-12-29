<!DOCTYPE html><html class=''>
<head><script src='//production-assets.codepen.io/assets/editor/live/console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/events_runner-73716630c22bbc8cff4bd0f07b135f00a0bdc5d14629260c3ec49e5606f98fdd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/css_live_reload_init-2c0dc5167d60a5af3ee189d570b1835129687ea2a61bee3513dee3a50c115a77.js'></script><meta charset='UTF-8'><meta name="robots" content="noindex"><link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" /><link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" /><link rel="canonical" href="https://codepen.io/semogs/pen/oovjdJ?limit=all&page=6&q=comercial" />
 <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css'>
<style class="cp-pen-styles">.feedback-slider-nav-dot-wrapper:hover .feedback-slider-nav-dot {
  background-color: white;
}

.slide {
  visibility: hidden;
  margin: 0 0;
}
.slide.active {
  visibility: visible;
  opacity: 1;
}
.feedback-slider-nav-dot-anim.active {
  width: 100%;
}



.nowrap {
  white-space: nowrap;
}

.section-feedback {
  position: relative;
  background-color: #666475;
}

.feedback-slider {
  position: relative;
  height: 550px;
}

.slide {
  position: absolute;
  left: 0px;
  top: 0px;
  right: 0px;
  max-height: 550px;
  min-height: 550px;
  margin-bottom: 0px;
  background-color: #666475;
  opacity: 0;
  -webkit-transition: all 600ms ease;
  transition: all 600ms ease;
}

.slide-content-wrapper {
  position: absolute;
  left: 0px;
  top: 50%;
  right: 0px;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  width: 100%;
  max-width: 1230px;
  margin-right: auto;
  margin-left: auto;
  padding-right: 15px;
  padding-left: 15px;
  -webkit-box-pack: end;
  -webkit-justify-content: flex-end;
  -ms-flex-pack: end;
  justify-content: flex-end;
  -webkit-transform: translate(0px, -50%);
  -ms-transform: translate(0px, -50%);
  transform: translate(0px, -50%);
}

.slide-text-wrapper {
  max-width: 39%;
  padding-right: 15px;
  padding-left: 40px;
}

.feedback-text {
  margin-bottom: 40px;
  padding: 0px;
  border-left: 0px none transparent;
  color: #fff;
  font-size: 1.5rem;
  line-height: 2.25rem;
  font-style: italic;
  font-weight: 400;
}

.feedback-name {
  color: #25b8cc;
  font-size: 0.9375rem;
  line-height: 1.5rem;
  font-weight: 600;
}

.feedback-job {
  font-family: "Brandon Grotesque", sans-serif;
  color: hsla(0, 0%, 100%, 0.4);
  font-size: 0.875rem;
  line-height: 1.25rem;
  font-weight: 700;
  text-transform: uppercase;
}

.feedback-image-wrapper {
  position: absolute;
  left: 0px;
  top: 0px;
  bottom: 0px;
  overflow: hidden;
  width: 58.33333333%;
  background-color: #25b8cc;
  -webkit-transform: skew(-9deg, 0deg);
  -ms-transform: skew(-9deg, 0deg);
  transform: skew(-9deg, 0deg);
  -webkit-transform-origin: 100% 0%;
  -ms-transform-origin: 100% 0%;
  transform-origin: 100% 0%;
}

.feedback-image-wrapper-mobile {
  position: absolute;
  left: 0px;
  top: 0px;
  bottom: 0px;
  display: none;
  overflow: hidden;
  width: 60%;
  background-color: #25b8cc;
  -webkit-transform: skew(-9deg, 0deg);
  -ms-transform: skew(-9deg, 0deg);
  transform: skew(-9deg, 0deg);
  -webkit-transform-origin: 100% 0%;
  -ms-transform-origin: 100% 0%;
  transform-origin: 100% 0%;
}

.feedback-slider-nav {
  position: static;
  left: 0%;
  right: 0%;
  bottom: 0px;
  display: block;
  max-width: 1230px;
  margin-right: auto;
  margin-bottom: 0px;
  margin-left: auto;
  padding-left: 0px;
  font-size: 0rem;
  line-height: 0rem;
  text-align: right;
}

.feedback-slider-nav-dot-wrapper {
  display: inline-block;
  padding: 40px 5px;
  cursor: pointer;
}

.feedback-slider-nav-wrapper {
  position: absolute;
  left: 0px;
  right: 0px;
  bottom: 0px;
}

.feedback-slider-nav-dot {
  overflow: hidden;
  width: 30px;
  height: 3px;
  background-color: hsla(0, 0%, 100%, 0.5);
  -webkit-transition: background-color 200ms
    cubic-bezier(0.455, 0.03, 0.515, 0.955);
  transition: background-color 200ms cubic-bezier(0.455, 0.03, 0.515, 0.955);
}

.feedback-image-bg {
  height: 100%;
  background-image: url("https://drive.google.com/uc?id=0B0Qk2Jm3RptGSjJOek5aclJZeVE");
  background-position: 0px 0px;
  background-size: cover;
  background-repeat: no-repeat;
  -webkit-transform: skew(9deg, 0deg);
  -ms-transform: skew(9deg, 0deg);
  transform: skew(9deg, 0deg);
  -webkit-transform-origin: 100% 0%;
  -ms-transform-origin: 100% 0%;
  transform-origin: 100% 0%;
}

.feedback-image-bg-2 {
  height: 100%;
  background-image: url("https://drive.google.com/uc?id=0B0Qk2Jm3RptGM0dTR2lOSm14R1U");
    background-position: 50% 50%;
  background-size: cover;
  background-repeat: no-repeat;
  -webkit-transform: skew(9deg, 0deg);
  -ms-transform: skew(9deg, 0deg);
  transform: skew(9deg, 0deg);
  -webkit-transform-origin: 100% 0%;
  -ms-transform-origin: 100% 0%;
  transform-origin: 100% 0%;
}

.feedback-image-bg-3 {
  height: 100%;
  background-image: url("https://drive.google.com/uc?id=0B0Qk2Jm3RptGelV6MVc4dXhDYk0");
  background-position: 50% 50%;
  background-size: cover;
  background-repeat: no-repeat;
  -webkit-transform: skew(9deg, 0deg);
  -ms-transform: skew(9deg, 0deg);
  transform: skew(9deg, 0deg);
  -webkit-transform-origin: 100% 0%;
  -ms-transform-origin: 100% 0%;
  transform-origin: 100% 0%;

}

.feedback-image-bg-4 {
  height: 100%;
  background-image: url("https://drive.google.com/uc?id=0B0Qk2Jm3RptGR1J6b1JYTUdxOW8");
  background-position: 50% 50%;
  background-size: cover;
  background-repeat: no-repeat;
  -webkit-transform: skew(9deg, 0deg);
  -ms-transform: skew(9deg, 0deg);
  transform: skew(9deg, 0deg);
  -webkit-transform-origin: 100% 0%;
  -ms-transform-origin: 100% 0%;
  transform-origin: 100% 0%;
}

.feedback-slider-nav-dot-anim {
  width: 0%;
  height: 100%;
  background-color: #389eb1;
}

@media (max-width: 991px) {
  .feedback-image-bg {
    background-position: 15% 50%;
  }
  .feedback-image-bg-2 {
    background-position: 50% 50%;
  }
  .feedback-image-bg-3 {
    background-position: 50% 50%;
  }
  .feedback-image-bg-4 {
    background-position: 50% 50%;
  }
}

@media (max-width: 767px) {
  .feedback-slider {
    height: 570px;
  }
  .slide {
    max-height: 570px;
    min-height: 570px;
  }
  .slide-content-wrapper {
    position: static;
    display: block;
    padding-top: 40px;
    padding-right: 7.5px;
    padding-left: 7.5px;
    -webkit-transform: none;
    -ms-transform: none;
    transform: none;
  }
  .slide-text-wrapper {
    max-width: 100%;
    padding-right: 7.5px;
    padding-left: 7.5px;
  }
  .feedback-text {
    max-width: 800px;
    margin-bottom: 30px;
    font-size: 1.25rem;
    line-height: 1.875rem;
  }
  .feedback-image-wrapper {
    display: none;
    width: 100%;
    background-color: transparent;
    -webkit-transform: skew(0deg, -4deg);
    -ms-transform: skew(0deg, -4deg);
    transform: skew(0deg, -4deg);
    -webkit-transform-origin: 0% 0%;
    -ms-transform-origin: 0% 0%;
    transform-origin: 0% 0%;
  }
  .feedback-image-bg {
    background-position: 50% 50%;
    -webkit-transform: skew(0deg, 10deg);
    -ms-transform: skew(0deg, 10deg);
    transform: skew(0deg, 10deg);
    -webkit-transform-origin: 0% 0%;
    -ms-transform-origin: 0% 0%;
    transform-origin: 0% 0%;
  }
  .feedback-image-wrapper-mobile {
    position: static;
    left: 0px;
    top: 0px;
    right: 0px;
    bottom: auto;
    display: block;
    width: 100%;
    height: 250px;
    background-color: transparent;
    -webkit-transform: skew(0deg, -10deg);
    -ms-transform: skew(0deg, -10deg);
    transform: skew(0deg, -10deg);
    -webkit-transform-origin: 0% 0%;
    -ms-transform-origin: 0% 0%;
    transform-origin: 0% 0%;
  }
  .feedback-slider-nav {
    text-align: center;
  }
  .feedback-slider-nav-dot-wrapper {
    padding-top: 30px;
    padding-bottom: 30px;
  }
  .feedback-image-bg-2 {
    background-position: 50% 50%;
    -webkit-transform: skew(0deg, 10deg);
    -ms-transform: skew(0deg, 10deg);
    transform: skew(0deg, 10deg);
    -webkit-transform-origin: 0% 0%;
    -ms-transform-origin: 0% 0%;
    transform-origin: 0% 0%;
  }
  .feedback-image-bg-3 {
    background-position: 50% 50%;
    -webkit-transform: skew(0deg, 10deg);
    -ms-transform: skew(0deg, 10deg);
    transform: skew(0deg, 10deg);
    -webkit-transform-origin: 0% 0%;
    -ms-transform-origin: 0% 0%;
    transform-origin: 0% 0%;
  }
  .feedback-image-bg-4 {
    background-position: 50% 50%;
    -webkit-transform: skew(0deg, 10deg);
    -ms-transform: skew(0deg, 10deg);
    transform: skew(0deg, 10deg);
    -webkit-transform-origin: 0% 0%;
    -ms-transform-origin: 0% 0%;
    transform-origin: 0% 0%;
  }

@media (max-width: 479px) {
  .feedback-text {
    margin-bottom: 30px;
    font-size: 1.125rem;
    line-height: 1.6875rem;
  }
  .feedback-image-wrapper-mobile {
    height: 200px;
  }
  .feedback-slider-nav-dot {
    height: 3px;
  }
  .icon {
    margin-right: 0px;
  }

@font-face {
  font-family: "Brandon Grotesque";
  src: url("../fonts/Brandon_bld.eot") format("embedded-opentype"),
    url("../fonts/Brandon_bld.woff") format("woff"),
    url("../fonts/Brandon_bld.ttf") format("truetype"),
    url("../fonts/Brandon_bld.otf") format("opentype");
  font-weight: 700;
  font-style: normal;
}
  
   /* calculate feedback slider navigation padding */
 @media (min-width: 768px) and (max-width: 1230px) {
  .feedback-slider-nav {
  padding-right: calc(20.83333333% - 80px); 
  }
 }
 
  @media (min-width: 1231px) {
  .feedback-slider-nav {
  padding-right: 176.25px; 
  }
 }

figure {
  margin: 0;
  margin-bottom: 10px;
}
  
  figure.slide {
    margin: 0 0;
  }

.w-hidden-main {
  display: inherit !important;
}
.w-hidden-medium {
  display: inherit !important;
}
.w-hidden-small {
  display: inherit !important;
}
.w-hidden-tiny {
  display: none !important;
}
.w-embed:before,
.w-embed:after {
  content: " ";
  display: table;
}
.w-embed:after {
  clear: both;
}
  
</style></head><body>
<body>
  <section class="section-feedback">
    <div class="feedback-slider">
      <figure class="slide">
        <div class="feedback-image-wrapper w-hidden-small w-hidden-tiny">
          <div class="feedback-image-bg"></div>
        </div>
        <div class="feedback-image-wrapper-mobile w-hidden-main w-hidden-medium">
          <div class="feedback-image-bg"></div>
        </div>
        <div class="slide-content-wrapper">
          <div class="slide-text-wrapper">
            <div class="w-embed">
              <p class="feedback-text">O PayUp é indispensável para facilitar a divisão de contas com os meus amigos!<br> Agora, quando vamos viajar &nbsp<i class="em em-minibus"></i> &nbsp já ninguém fica a arder!</p>
            </div>
            <div class="feedback-name">Sara Esteves Cardoso</div>
            <div class="feedback-job">Analista de Redes Sociais</div>
          </div>
        </div>
      </figure>
      <figure class="slide">
        <div class="feedback-image-wrapper w-hidden-small w-hidden-tiny">
          <div class="feedback-image-bg-2"></div>
        </div>
        <div class="feedback-image-wrapper-mobile w-hidden-main w-hidden-medium">
          <div class="feedback-image-bg-2"></div>
        </div>
        <div class="slide-content-wrapper">
          <div class="slide-text-wrapper">
            <div class="w-embed">
              <p class="feedback-text">Renda, luz, gás, internet... Temos um grupo para registar quem pagou o quê e fazer as contas no final do mês. Adoro &nbsp<i class="em em-pray"></i></p>
            </div>
            <div class="feedback-name">Tomé Fonseca</div>
            <div class="feedback-job">Estudante de Direito</div>
          </div>
        </div>
      </figure>
      <figure class="slide">
        <div class="feedback-image-wrapper w-hidden-small w-hidden-tiny">
          <div class="feedback-image-bg-3"></div>
        </div>
        <div class="feedback-image-wrapper-mobile w-hidden-main w-hidden-medium">
          <div class="feedback-image-bg-3"></div>
        </div>
        <div class="slide-content-wrapper">
          <div class="slide-text-wrapper">
            <div class="w-embed">
              <p class="feedback-text">Agora é fácil dividir as despesas que temos com a Luna &nbsp<i class="em em-dog"></i> <br> A Mónica esquecia-se sempre de fazer as transferências!</p>
            </div>
            <div class="feedback-name">João Onofre</div>
            <div class="feedback-job">Médico Pediatra</div>
          </div>
        </div>
      </figure>
      <figure class="slide">
        <div class="feedback-image-wrapper w-hidden-small w-hidden-tiny">
          <div class="feedback-image-bg-4"></div>
        </div>
        <div class="feedback-image-wrapper-mobile w-hidden-main w-hidden-medium">
          <div class="feedback-image-bg-4"></div>
        </div>
        <div class="slide-content-wrapper">
          <div class="slide-text-wrapper">
            <div class="w-embed">
              <p class="feedback-text">Quando um colega faz anos &nbsp<i class="em em-cake"></i> <span class="nowrap">juntamo-nos</span> para comprar um presente.<br> O PayUp facilita muito a divisão da conta e os pagamentos &nbsp<i class="em em-money_with_wings"></i></p>
            </div>
            <div class="feedback-name">Joana Azevedo</div>
            <div class="feedback-job">Comercial</div>
          </div>
        </div>
      </figure>
      <div class="feedback-slider-nav-wrapper">
        <ul id="slider-dots" class="feedback-slider-nav w-list-unstyled">
          <li class="feedback-slider-nav-dot-wrapper">
            <div class="feedback-slider-nav-dot">
              <div class="feedback-slider-nav-dot-anim"></div>
            </div>
          </li>
          <li class="feedback-slider-nav-dot-wrapper">
            <div class="feedback-slider-nav-dot">
              <div class="feedback-slider-nav-dot-anim"></div>
            </div>
          </li>
          <li class="feedback-slider-nav-dot-wrapper">
            <div class="feedback-slider-nav-dot">
              <div class="feedback-slider-nav-dot-anim"></div>
            </div>
          </li>
          <li class="feedback-slider-nav-dot-wrapper">
            <div class="feedback-slider-nav-dot">
              <div class="feedback-slider-nav-dot-anim"></div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </section>
<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>
<script >//best viewed in google-chrome
requestAnimatonFrame = requestAnimationFrame || webkitRequestAnimaitonFrame || mozRequestAnimationFrame || msRequestAnimationFrame;

// carousel 

var button = null;
var count = 0;
var counter;

carousel ();

function carousel (){
  
  var indexSlide = document.getElementsByClassName("slide");
    for (var i = 0; i < indexSlide.length; i++ ){
       indexSlide[i].classList.remove("active"); 
    };
  
  count++;
  
  if (count > indexSlide.length) {
    count = 1;
    
    indexSlide[count - 1].classList.add("active");
    } else {
    indexSlide[count - 1].classList.add("active");
  };
};

function newCarousel(button){
  
  var indexSlide = document.getElementsByClassName("slide");
    for (var i = 0; i < indexSlide.length; i++ ){
       indexSlide[i].classList.remove("active"); 
  };

  if( button !== null ) {
      indexSlide[button].classList.add("active");
  }
};


// bar - duration

var slideTime = 5; //seconds
var length = slideTime * 1000;
var progressTime = length / 100 ;



//progress bar 

  
window.onload = progressBar;

function progressBar(slideTime){ 

  var start = Date.now();

  var id =  window.setInterval(draw, progressTime);

  var target = document.getElementsByClassName("feedback-slider-nav-dot-anim")[count - 1];


  function draw() {
    var delta = 100 * (Date.now() - start) / length;

    if ( delta > 100 ){
        delta = 100;   
        target.style.width = 0 + "px";     
        clearInterval(id); 
    } else {        
      target.style.width = (Math.round(delta) + "%");    
    }
  };    
};


var reId;

function newProgressBar( slideTime, button){ 

  start = Date.now();
  
  reId =  window.setTimeout(reDraw, progressTime);
  

  var newTarget = document.getElementsByClassName("feedback-slider-nav-dot-anim")[button];
  var resetTarget = document.getElementsByClassName("feedback-slider-nav-dot-anim");

  function reDraw() {
    
    delta = 100 * (Date.now() - start) / length;
  
    if ( delta > 100 ){
      delta = 100;   
        newTarget.style.width = 0 + "px";  
        clearTimeout(reId); 
      } else {           
        for(var j = 0; j < resetTarget.length ; j++ ){          
        resetTarget[j].style.width =  0 + "%";
      }        
      newTarget.style.width = (Math.round(delta) + "%");
      requestAnimationFrame(reDraw);
      }
    };
};

// nav-dot click

function click(e) {

  if ( e.target && e.target.nodeName == 'LI' ) {
      var click = document.getElementById('slider-dots');
      for (var h = 0, len = click.children.length; h < len; h++){
        (function(button){
          click.children[h].onclick = function(){
                count = button + 1;   
                stopLoop();                          
                newCarousel(button);                 
                clearTimeout(reId);
                newProgressBar(slideTime, button);          
                loop();                     
          };   
        })(h);
      }
  };
 
};
window.document.querySelector('.feedback-slider-nav-wrapper').addEventListener( 'click', click, true);
// window.document.querySelector('.feedback-slider-nav-wrapper').removeEventListener( 'click', click, true);

var set;
function loop(){
  set = window.setTimeout( function ouy (){
      carousel();
      progressBar(slideTime);
      set = setTimeout(ouy, length);       
    },length);
  };
loop();

function stopLoop() {
    clearTimeout(set);
};
//  // get browser width
 window.addEventListener("resize", resized);
  function resized(){
    var index = document.getElementsByClassName("feedback-image-wrapper");
     if ( window.innerWidth > 1230 ){
       
         var wpicf = this.innerWidth / 2 + 102.5;
        
         for (var i = 0; i < index.length; i++ ){
            index[i].style.width = wpicf + "px";
         }
       } else {
        
         wpicf = ((this.innerWidth * 7) / 12) - 5;
       
         for ( i = 0; i < index.length; i++ ){
            index[i].style.width = wpicf + "px";
         }
       }
  }
//# sourceURL=pen.js
</script>
</body></html>
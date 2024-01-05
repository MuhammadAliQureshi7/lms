
<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.animateTyping.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/wow.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>

<script src="<?php echo base_url('assets/js/owl.carousel.min.js'); ?>"></script>

<script>
var wow = new WOW(
  {
    boxClass:     'wow',      // animated element css class (default is wow)
    animateClass: 'animated', // animation css class (default is animated)
    offset:       0,          // distance to the element when triggering the animation (default is 0)
    mobile:       true,       // trigger animations on mobile devices (default is true)
    live:         true,       // act on asynchronously loaded content (default is true)
    callback:     function(box) {
      // the callback is fired every time an animation is started
      // the argument that is passed in is the DOM node being animated
    },
    scrollContainer: null,    // optional scroll container selector, otherwise use window,
    resetAnimation: true,     // reset animation on end (default is true)
  }
);
wow.init();
</script>
<script>
        function modalextend() {
            // Get the checkbox
            var checkBox = document.getElementById("extend_form");
            // Get the output text
            var text = document.getElementById("form_extended");

            // If the checkbox is checked, display the output text
            if ($("#extend_form").is(':checked')){
                text.style.display = "block";
            } else {
                text.style.display = "none";
            }
            } 

    </script>
<script>

$('#clients').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    autoplay:100,
    dots:false,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:4
        },
        1000:{
            items:6
        }
    }
})

</script>

<script>

$(window).scroll(function() {
  var scroll = $(window).scrollTop();
  if (scroll >= 1) {
    $(".header").addClass("bg");
  } else {
    $(".header").removeClass("bg");
  }
});
</script>

<script>

function thirty_pc() {

    var height = $(window).height();

    var thirtypc = (100 * height) / 100;

    thirtypc = parseInt(thirtypc) + 'px';

    $(".bg .backdrop").css('height',thirtypc);

}

$(document).ready(function() {

    thirty_pc();

    $(window).bind('resize', thirty_pc);

});

</script>

<script>

$(".nav-trigger").click(function(){
  $(".nav-custom").addClass("show");
});
$(".nav-custom .nav button").click(function(){
  $(".nav-custom").removeClass("show");
});

</script>

<script>

        var myVar;



        function myFunction() {

        myVar = setTimeout(showPage, 3000);

        }



        function showPage() {

            document.getElementById("loader").style.opacity = "0";

            document.getElementById("loader").style.zIndex = "-1";

            document.getElementById("page").style.opacity = "1";

        }

</script>

<script>

$(document).ready(function() {



var sync1 = $("#sync1");

var sync2 = $("#sync2");

    var slidesPerPage = 4; //globaly define number of elements per page

    var syncedSecondary = true;



sync1.owlCarousel({

  items : 1,

  slideSpeed : 2000,

  nav: false,

  autoplay: true,

  dots: false,

  loop: true,

  responsiveRefreshRate : 200,

  navText: ['<svg width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>','<svg width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],

}).on('changed.owl.carousel', syncPosition);



sync2

  .on('initialized.owl.carousel', function () {

    sync2.find(".owl-item").eq(0).addClass("current");

  })

  .owlCarousel({

  items : 6,

  dots: false,

  nav: false,

  smartSpeed: 200,

  slideSpeed : 500,

  slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel

  responsiveRefreshRate : 100

}).on('changed.owl.carousel', syncPosition2);



function syncPosition(el) {

  //if you set loop to false, you have to restore this next line

  //var current = el.item.index;

  

  //if you disable loop you have to comment this block

  var count = el.item.count-1;

  var current = Math.round(el.item.index - (el.item.count/2) - .5);

  

  if(current < 0) {

    current = count;

  }

  if(current > count) {

    current = 0;

  }

  

  //end block



  sync2

    .find(".owl-item")

    .removeClass("current")

    .eq(current)

    .addClass("current");

  var onscreen = sync2.find('.owl-item.active').length - 1;

  var start = sync2.find('.owl-item.active').first().index();

  var end = sync2.find('.owl-item.active').last().index();

  

  if (current > end) {

    sync2.data('owl.carousel').to(current, 100, true);

  }

  if (current < start) {

    sync2.data('owl.carousel').to(current - onscreen, 100, true);

  }

}



function syncPosition2(el) {

  if(syncedSecondary) {

    var number = el.item.index;

    sync1.data('owl.carousel').to(number, 100, true);

  }

}



sync2.on("click", ".owl-item", function(e){

  e.preventDefault();

  var number = $(this).index();

  sync1.data('owl.carousel').to(number, 300, true);

});

});

</script>

<script>

    /*!

 * Particleground

 *

 * @author Jonathan Nicol - @mrjnicol

 * @version 1.1.0

 * @description Creates a canvas based particle system background

 *

 * Inspired by #requestlab.fr/ and #disruptivebydesign.com/

 */

!function(a,b){"use strict";function c(a){a=a||{};for(var b=1;b<arguments.length;b++){var c=arguments[b];if(c)for(var d in c)c.hasOwnProperty(d)&&("object"==typeof c[d]?deepExtend(a[d],c[d]):a[d]=c[d])}return a}function d(d,g){function h(){if(y){r=b.createElement("canvas"),r.className="pg-canvas",r.style.display="block",d.insertBefore(r,d.firstChild),s=r.getContext("2d"),i();for(var c=Math.round(r.width*r.height/g.density),e=0;c>e;e++){var f=new n;f.setStackPos(e),z.push(f)}a.addEventListener("resize",function(){k()},!1),b.addEventListener("mousemove",function(a){A=a.pageX,B=a.pageY},!1),D&&!C&&a.addEventListener("deviceorientation",function(){F=Math.min(Math.max(-event.beta,-30),30),E=Math.min(Math.max(-event.gamma,-30),30)},!0),j(),q("onInit")}}function i(){r.width=d.offsetWidth,r.height=d.offsetHeight,s.fillStyle=g.dotColor,s.strokeStyle=g.lineColor,s.lineWidth=g.lineWidth}function j(){if(y){u=a.innerWidth,v=a.innerHeight,s.clearRect(0,0,r.width,r.height);for(var b=0;b<z.length;b++)z[b].updatePosition();for(var b=0;b<z.length;b++)z[b].draw();G||(t=requestAnimationFrame(j))}}function k(){i();for(var a=d.offsetWidth,b=d.offsetHeight,c=z.length-1;c>=0;c--)(z[c].position.x>a||z[c].position.y>b)&&z.splice(c,1);var e=Math.round(r.width*r.height/g.density);if(e>z.length)for(;e>z.length;){var f=new n;z.push(f)}else e<z.length&&z.splice(e);for(c=z.length-1;c>=0;c--)z[c].setStackPos(c)}function l(){G=!0}function m(){G=!1,j()}function n(){switch(this.stackPos,this.active=!0,this.layer=Math.ceil(3*Math.random()),this.parallaxOffsetX=0,this.parallaxOffsetY=0,this.position={x:Math.ceil(Math.random()*r.width),y:Math.ceil(Math.random()*r.height)},this.speed={},g.directionX){case"left":this.speed.x=+(-g.maxSpeedX+Math.random()*g.maxSpeedX-g.minSpeedX).toFixed(2);break;case"right":this.speed.x=+(Math.random()*g.maxSpeedX+g.minSpeedX).toFixed(2);break;default:this.speed.x=+(-g.maxSpeedX/2+Math.random()*g.maxSpeedX).toFixed(2),this.speed.x+=this.speed.x>0?g.minSpeedX:-g.minSpeedX}switch(g.directionY){case"up":this.speed.y=+(-g.maxSpeedY+Math.random()*g.maxSpeedY-g.minSpeedY).toFixed(2);break;case"down":this.speed.y=+(Math.random()*g.maxSpeedY+g.minSpeedY).toFixed(2);break;default:this.speed.y=+(-g.maxSpeedY/2+Math.random()*g.maxSpeedY).toFixed(2),this.speed.x+=this.speed.y>0?g.minSpeedY:-g.minSpeedY}}function o(a,b){return b?void(g[a]=b):g[a]}function p(){console.log("destroy"),r.parentNode.removeChild(r),q("onDestroy"),f&&f(d).removeData("plugin_"+e)}function q(a){void 0!==g[a]&&g[a].call(d)}var r,s,t,u,v,w,x,y=!!b.createElement("canvas").getContext,z=[],A=0,B=0,C=!navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry|BB10|mobi|tablet|opera mini|nexus 7)/i),D=!!a.DeviceOrientationEvent,E=0,F=0,G=!1;return g=c({},a[e].defaults,g),n.prototype.draw=function(){s.beginPath(),s.arc(this.position.x+this.parallaxOffsetX,this.position.y+this.parallaxOffsetY,g.particleRadius/2,0,2*Math.PI,!0),s.closePath(),s.fill(),s.beginPath();for(var a=z.length-1;a>this.stackPos;a--){var b=z[a],c=this.position.x-b.position.x,d=this.position.y-b.position.y,e=Math.sqrt(c*c+d*d).toFixed(2);e<g.proximity&&(s.moveTo(this.position.x+this.parallaxOffsetX,this.position.y+this.parallaxOffsetY),g.curvedLines?s.quadraticCurveTo(Math.max(b.position.x,b.position.x),Math.min(b.position.y,b.position.y),b.position.x+b.parallaxOffsetX,b.position.y+b.parallaxOffsetY):s.lineTo(b.position.x+b.parallaxOffsetX,b.position.y+b.parallaxOffsetY))}s.stroke(),s.closePath()},n.prototype.updatePosition=function(){if(g.parallax){if(D&&!C){var a=(u-0)/60;w=(E- -30)*a+0;var b=(v-0)/60;x=(F- -30)*b+0}else w=A,x=B;this.parallaxTargX=(w-u/2)/(g.parallaxMultiplier*this.layer),this.parallaxOffsetX+=(this.parallaxTargX-this.parallaxOffsetX)/10,this.parallaxTargY=(x-v/2)/(g.parallaxMultiplier*this.layer),this.parallaxOffsetY+=(this.parallaxTargY-this.parallaxOffsetY)/10}var c=d.offsetWidth,e=d.offsetHeight;switch(g.directionX){case"left":this.position.x+this.speed.x+this.parallaxOffsetX<0&&(this.position.x=c-this.parallaxOffsetX);break;case"right":this.position.x+this.speed.x+this.parallaxOffsetX>c&&(this.position.x=0-this.parallaxOffsetX);break;default:(this.position.x+this.speed.x+this.parallaxOffsetX>c||this.position.x+this.speed.x+this.parallaxOffsetX<0)&&(this.speed.x=-this.speed.x)}switch(g.directionY){case"up":this.position.y+this.speed.y+this.parallaxOffsetY<0&&(this.position.y=e-this.parallaxOffsetY);break;case"down":this.position.y+this.speed.y+this.parallaxOffsetY>e&&(this.position.y=0-this.parallaxOffsetY);break;default:(this.position.y+this.speed.y+this.parallaxOffsetY>e||this.position.y+this.speed.y+this.parallaxOffsetY<0)&&(this.speed.y=-this.speed.y)}this.position.x+=this.speed.x,this.position.y+=this.speed.y},n.prototype.setStackPos=function(a){this.stackPos=a},h(),{option:o,destroy:p,start:m,pause:l}}var e="particleground",f=a.jQuery;a[e]=function(a,b){return new d(a,b)},a[e].defaults={minSpeedX:.1,maxSpeedX:.7,minSpeedY:.1,maxSpeedY:.7,directionX:"center",directionY:"center",density:1e4,dotColor:"#666666",lineColor:"#666666",particleRadius:7,lineWidth:1,curvedLines:!1,proximity:100,parallax:!0,parallaxMultiplier:5,onInit:function(){},onDestroy:function(){}},f&&(f.fn[e]=function(a){if("string"==typeof arguments[0]){var b,c=arguments[0],g=Array.prototype.slice.call(arguments,1);return this.each(function(){f.data(this,"plugin_"+e)&&"function"==typeof f.data(this,"plugin_"+e)[c]&&(b=f.data(this,"plugin_"+e)[c].apply(this,g))}),void 0!==b?b:this}return"object"!=typeof a&&a?void 0:this.each(function(){f.data(this,"plugin_"+e)||f.data(this,"plugin_"+e,new d(this,a))})})}(window,document),/**

 * requestAnimationFrame polyfill by Erik Möller. fixes from Paul Irish and Tino Zijdel

 * @see: #paulirish.com/2011/requestanimationframe-for-smart-animating/

 * @see: #my.opera.com/emoller/blog/2011/12/20/requestanimationframe-for-smart-er-animating

 * @license: MIT license

 */

function(){for(var a=0,b=["ms","moz","webkit","o"],c=0;c<b.length&&!window.requestAnimationFrame;++c)window.requestAnimationFrame=window[b[c]+"RequestAnimationFrame"],window.cancelAnimationFrame=window[b[c]+"CancelAnimationFrame"]||window[b[c]+"CancelRequestAnimationFrame"];window.requestAnimationFrame||(window.requestAnimationFrame=function(b){var c=(new Date).getTime(),d=Math.max(0,16-(c-a)),e=window.setTimeout(function(){b(c+d)},d);return a=c+d,e}),window.cancelAnimationFrame||(window.cancelAnimationFrame=function(a){clearTimeout(a)})}();





particleground(document.getElementById('particles-foreground'), {

  dotColor: 'rgba(255, 255, 255, 1)',

  lineColor: 'rgba(255, 255, 255, 0.05)',

  minSpeedX: 0.3,

  maxSpeedX: 0.6,

  minSpeedY: 0.3,

  maxSpeedY: 0.6,

  density: 50000, // One particle every n pixels

  curvedLines: false,

  proximity: 250, // How close two dots need to be before they join

  parallaxMultiplier: 10, // Lower the number is more extreme parallax

  particleRadius: 4, // Dot size

});



particleground(document.getElementById('particles-background'), {

  dotColor: 'rgba(255, 255, 255, 0.5)',

  lineColor: 'rgba(255, 255, 255, 0.05)',

  minSpeedX: 0.075,

  maxSpeedX: 0.15,

  minSpeedY: 0.075,

  maxSpeedY: 0.15,

  density: 30000, // One particle every n pixels

  curvedLines: false,

  proximity: 20, // How close two dots need to be before they join

  parallaxMultiplier: 20, // Lower the number is more extreme parallax

  particleRadius: 2, // Dot size

});



</script>
<script>
  $(".nav-trigger").click(function(){
    $(".nav-custom").addClass("show");    
  });
  $(".nav-close").click(function(){
    $(".nav-custom").removeClass("show");    
  });
</script>
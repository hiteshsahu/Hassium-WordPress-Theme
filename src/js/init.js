(function($){
  $(function(){

$(window).on('load',function(){
  $("#loading").hide();
})

// handle links with @href started with '#' only
$(document).on('click', 'a[href^="#"]', function(e) {
    // target element id
    var id = $(this).attr('href');

    // target element
    var $id = $(id);
    if ($id.length === 0) {
        return;
    }
    // prevent standard hash navigation (avoid blinking in IE)
    e.preventDefault();

    // top position relative to the document
    var pos = $id.offset().top-80;

    // animated top scrolling
    $('body, html').animate({scrollTop: pos});
});

var selectedProjectIndex = -1;
var int;
var carousel_interval = 1500;
var chartData =[
  [Date.UTC(2005,5,2),80],
  [Date.UTC(2007,5,3),83.5],
  [Date.UTC(2012,5,4),85],
  ];


  $("#tech_1").addClass("tech-stack" );
  $("#tech_2").addClass("tech-stack" );
  $("#tech_3").addClass("tech-stack" );
  $("#project_1").addClass("tech-stack" );
  $("#project_2").addClass("tech-stack" );
  $("#project_3").addClass("tech-stack" );
  $("#project_4").addClass("tech-stack" );
  $("#project_5").addClass("tech-stack" );
  $("#project_6").addClass("tech-stack" );

 // Initialize scrollfire
 	var options = [

     {selector: '#tech_1', offset: 200, callback: function(el) {
 		    $("#tech_1").addClass("fadeIn");
        $("#tech_1").removeClass("tech-stack");
     }},

     {selector: '#tech_2', offset: 200, callback: function(el) {
        $("#tech_2").delay(200).queue(function(next){
            $("#tech_2").addClass("fadeIn");
            $("#tech_2").removeClass("tech-stack");
              next();
            });
      }},

     {selector: '#tech_3', offset: 200, callback: function(el) {
          $("#tech_3").delay(400).queue(function(next){
              $("#tech_3").addClass("fadeIn");
              $("#tech_3").removeClass("tech-stack");
                next();
              });
      }},

 	   {selector: '#project_1', offset: 200, callback: function(el) {
 		   $("#project_1").addClass("fadeIn" );
       $("#project_1").removeClass("tech-stack");
       }},

 	  {selector: '#project_2', offset: 200, callback: function(el) {
 		   $("#project_2").addClass("fadeIn");
       $("#project_2").removeClass("tech-stack");
      }},

 	  {selector: '#project_3', offset: 200, callback: function(el) {
 		  $("#project_3").addClass("fadeIn");
       }},

 	  {selector: '#project_4', offset: 200, callback: function(el) {
 		   $("#project_4").addClass("fadeIn");
       }},

 	  {selector: '#project_5', offset: 200, callback: function(el) {
 		   $("#project_5").addClass("fadeIn");
       }},
 	  {selector: '#project_6', offset: 200, callback: function(el) {
 	     	$("#project_6").addClass("fadeIn" );

       }},

    //
 	 //   {selector: '#project_8', offset: 200, callback: function(el) {
 	// 	$("#project_8").addClass("slideUp" );
    //
    //    } },

    {selector: '#project_list', offset: 200, callback: function(el) {
        $("#project_list").addClass("slideRight");
       }},

    {selector: '#projects', offset: 200, callback: function(el) {
     $("#projects").addClass("slideLeft");
     run();

     } },

 	  {selector: '#container', offset: 200, callback: function(el) {

    Highcharts.chart('container', {
         chart: {
             zoomType: 'x'
         },
         title: {
             text: 'Acedamics Performance'
         },
         subtitle: {
             text: document.ontouchstart === undefined ?
                     'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
         },
         xAxis: {
             type: 'datetime'
         },
         yAxis: {
             title: {
               text: 'Grade/Percentage'
             },
         },
         legend: {
             enabled: false
         },
       tooltip: {
             formatter: function() {

               if(this.y == 80)
                 {
                return '<b>'+ "Secondary School (Xth)"  +                                Highcharts.numberFormat(this.y, 0) + " %"
                  +'</b><br/>' + " Passing year: " +
               Highcharts.dateFormat('%Y', this.x) ;

                 }else if (this.y == 83.5)
                 {
                return '<b>'+ "Higher Secondary School(XIIth) "  +                      Highcharts.numberFormat(this.y, 0) + " %"
                  +'</b><br/>'+
                     'Passing year: '+  Highcharts.dateFormat('%Y', this.x) ;
                 }else
                   {
                      return '<b>'+ "Graduation (Computer Science) "  +              Highcharts.numberFormat(this.y, 0) + " %"
                  +'</b><br/>'+
                     'Passing year: '+  Highcharts.dateFormat('%Y', this.x) ;
                   }
             }
         },
         plotOptions: {
             area: {
                 fillColor: {
                     linearGradient: {
                         x1: 0,
                         y1: 0,
                         x2: 0,
                         y2: 1
                     },
                     stops: [
                         [0, 'teal'],
                         [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                     ]
                 },
                 marker: {
                     radius: 3
                 },
                 lineWidth: 2,
                 states: {
                     hover: {
                         lineWidth: 3
                     }
                 },
                 dataLabels: {
                   enabled: true
                   },
                 threshold: null
             }
         },

         series: [{
             type: 'area',
             name: 'Score',
             data:  chartData
         }]
     });
    }},
    ];

   //Cache App
   registerServiceWorker();

    // Initialize dropdown
     $('select').material_select();
   	// Initialize collapse button
     $(".button-collapse").sideNav();
	 // Initialize parallax
     $('.parallax').parallax();
   //Chips
    $('.chips').material_chip();

	 // Initialize text area
     $('#textarea1').trigger('autoresize');
	   // Initialize collapsible
      $('.collapsible').collapsible({
        accordion: false,
        onOpen: function(ele) {
        selectedProjectIndex = $(ele).index();
        console.log('Open #' +  selectedProjectIndex);
        $('.carousel').carousel('set', $(ele).index());
      }
      });
     // Initialize carousel
    $('.carousel.carousel-slider').carousel({
       full_width: true,
       dist:0,
       shift:0,
       onCycleTo: function (ele, dragged) {
     // console.log('Slide #' +  $(ele).index());
      if(selectedProjectIndex != $(ele).index())
         {
          $('.collapsible').collapsible('open',$(ele).index());
         }
       }
     });

  $('.carousel').hover(stop, run);
  $('.collapsible').hover(stop, run);
  $('.nextSlide').hover(stop, run);
  $('.prevSlide').hover(stop, run);

  function run(){
         int = setInterval(function()
         {
             $('.carousel').carousel('next');
         }, carousel_interval);
     }

  function stop(){
     clearInterval(int);
     }



(function ($) {
	$.fn.countTo = function (options) {
		options = options || {};

		return $(this).each(function () {
			// set options for current element
			var settings = $.extend({}, $.fn.countTo.defaults, {
				from:            $(this).data('from'),
				to:              $(this).data('to'),
				speed:           $(this).data('speed'),
				refreshInterval: $(this).data('refresh-interval'),
				decimals:        $(this).data('decimals')
			}, options);

			// how many times to update the value, and how much to increment the value on each update
			var loops = Math.ceil(settings.speed / settings.refreshInterval),
				increment = (settings.to - settings.from) / loops;

			// references & variables that will change with each update
			var self = this,
				$self = $(this),
				loopCount = 0,
				value = settings.from,
				data = $self.data('countTo') || {};

			$self.data('countTo', data);

			// if an existing interval can be found, clear it first
			if (data.interval) {
				clearInterval(data.interval);
			}
			data.interval = setInterval(updateTimer, settings.refreshInterval);

			// initialize the element with the starting value
			render(value);

			function updateTimer() {
				value += increment;
				loopCount++;

				render(value);

				if (typeof(settings.onUpdate) == 'function') {
					settings.onUpdate.call(self, value);
				}

				if (loopCount >= loops) {
					// remove the interval
					$self.removeData('countTo');
					clearInterval(data.interval);
					value = settings.to;

					if (typeof(settings.onComplete) == 'function') {
						settings.onComplete.call(self, value);
					}
				}
			}

			function render(value) {
				var formattedValue = settings.formatter.call(self, value, settings);
				$self.html(formattedValue);
			}
		});
	};

	$.fn.countTo.defaults = {
		from: 0,               // the number the element should start at
		to: 0,                 // the number the element should end at
		speed: 1000,           // how long it should take to count between the target numbers
		refreshInterval: 100,  // how often the element should be updated
		decimals: 0,           // the number of decimal places to show
		formatter: formatter,  // handler for formatting the value before rendering
		onUpdate: null,        // callback method for every time the element is updated
		onComplete: null       // callback method for when the element finishes updating
	};

	function formatter(value, settings) {
		return value.toFixed(settings.decimals);
	}
}(jQuery));

jQuery(function ($) {
  // custom formatting example
  $('.count-number').data('countToOptions', {
	formatter: function (value, options) {
	  return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
	}
  });

  // start all the timers
  // use setTimeout() to execute

 setTimeout(function() {
    $('.timer').each(count);
    $("#splash-overlay").remove();
    $("#welcome").remove();
 }, 3000);

function count(options) {
	var $this = $(this);
	options = $.extend({}, options || {}, $this.data('countToOptions') || {});
	$this.countTo(options);
  }
});

	  //Match column height
	//   $('.equalHightColumn').matchHeight();
     //initalize modals
	   $('.modal').modal();
     //SetUpScollfire
    Materialize.scrollFire(options);
    /*
    * Install Service Worker
    */
    function registerServiceWorker() {
      return navigator.serviceWorker.register('./service-worker.js')
      .then(function(registration) {
        console.log('Service worker successfully registered.');
        return registration;
      })
      .catch(function(err) {
        console.error('Unable to register service worker.', err);
      });
    }


function cacheAppShell()
    {
      self.addEventListener('install', function(e) {
      e.waitUntil(
        caches.open('the-magic-cache').then(function(cache) {
          return cache.addAll([
            '/',
            '/index.html',
            '/manifest.json',
            '/assets/img/avatar.jpg',
            '/assets/img/header/head_drawer.png',
            '/assets/img/PlaceHolder/user_place_holder.png',
            '/script/init.js',
            '/js/angular.min.js',
            '/js/jquery-3.2.1.min.js',
            '/js/materialize.min.js',
            '/css/style.css',
            '/css/materialize.min.css',
            '/css/font-awesome.min.css',
          ]);
        })
      );
    });
    }


    /* ---- particles.js config ---- */

    particlesJS("particles-js", {
      "particles": {
        "number": {
          "value": 100,
          "density": {
            "enable": true,
            "value_area": 800
          }
        },
        "color": {
          "value": "#29B6F6"
        },
        "shape": {
          "type": "circle",
          "stroke": {
            "width": 1,
            "color": "#2196F3"
          },
          "polygon": {
            "nb_sides": 5
          },
          "image": {
            "src": "img/github.svg",
            "width": 100,
            "height": 100
          }
        },
        "opacity": {
          "value": 0.5,
          "random": false,
          "anim": {
            "enable": false,
            "speed": 1,
            "opacity_min": 0.1,
            "sync": false
          }
        },
        "size": {
          "value": 3,
          "random": true,
          "anim": {
            "enable": false,
            "speed": 40,
            "size_min": 0.1,
            "sync": false
          }
        },
        "line_linked": {
          "enable": true,
          "distance": 150,
          "color": "#29B6F6",
          "opacity": 0.4,
          "width": 1
        },
        "move": {
          "enable": true,
          "speed": 6,
          "direction": "none",
          "random": false,
          "straight": false,
          "out_mode": "out",
          "bounce": false,
          "attract": {
            "enable": false,
            "rotateX": 600,
            "rotateY": 1200
          }
        }
      },
      "interactivity": {
        "detect_on": "canvas",
        "events": {
          "onhover": {
            "enable": true,
            "mode": "grab"
          },
          "onclick": {
            "enable": true,
            "mode": "push"
          },
          "resize": true
        },
        "modes": {
          "grab": {
            "distance": 140,
            "line_linked": {
              "opacity": 1
            }
          },
          "bubble": {
            "distance": 400,
            "size": 40,
            "duration": 2,
            "opacity": 8,
            "speed": 3
          },
          "repulse": {
            "distance": 200,
            "duration": 0.4
          },
          "push": {
            "particles_nb": 4
          },
          "remove": {
            "particles_nb": 2
          }
        }
      },
      "retina_detect": true
    });

   //Mouse SVG animation
    var s = $("#scroll");
    var r = console.log("DONE");
    var t = new TimelineMax({
    	repeat: -1,
    	repeatDelay: .9,
    	onComplete: r,
    	ease: Expo.easeIn
    });
    t.to(s, .3, {
    	y: 10
    }).to(s, .2, {
    	opacity: 0
    }, .2).to(s, .5, {
    	y: 0
    }).to(s, .3, {
    	opacity: 1
    });


   //Glitch
    const glichTitle = document.querySelector("#title");
		charming(glichTitle);
		Array.from(glichTitle.querySelectorAll('span')).forEach(letter => {
				letter.style.opacity = 1;
				new GlitchFx(letter).glitch();
			});

    const glichSlogan = document.querySelector("#slogan");
    charming(glichSlogan);
    Array.from(glichSlogan.querySelectorAll('span')).forEach(letter => {
        letter.style.opacity = 1;
        new GlitchFx(letter).glitch();
      });


  }); // end of document ready
})(jQuery); // end of jQuery name space

function Next()
{
  $('.carousel').carousel('next');
}

function Previous()
{
  $('.carousel').carousel('prev');
}

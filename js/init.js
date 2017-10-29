(function($){
  $(function(){
	  
$(window).load(function(){
  $("#loading").hide();
})
	  
var chartData =[

[Date.UTC(2010,5,2),80],
[Date.UTC(2012,5,3),83.5],
[Date.UTC(2016,5,4),85],
];
 var body = $('#header_bg');
    var backgrounds = [
      'url(img/covers/cover_0.gif)', 
      'url(img/covers/cover_1.gif)',
	  'url(img/covers/cover_2.gif)',
	  'url(img/covers/cover_3.gif)',
	  'url(img/covers/cover_4.gif)',
	  'url(img/covers/cover_5.gif)',
	  'url(img/covers/cover_6.gif)',
	  'url(img/covers/cover_7.gif)',
	  'url(img/covers/cover_8.gif)',
	  'url(img/covers/cover_9.gif)',
	  'url(img/covers/cover_10.gif)',
	  'url(img/covers/cover_11.gif)',
	  'url(img/covers/cover_12.gif)'];
    var current = 0;

    function nextBackground() {
        body.css(
            'background',
        backgrounds[current = ++current % backgrounds.length]);

        setTimeout(nextBackground, 5000);
    }
    //setTimeout(nextBackground, 5000);
	
    body.css('background', backgrounds[0]);
	
  
   	// Initialize collapse button
      $(".button-collapse").sideNav();
	   
	// Initialize parallax
     $('.parallax').parallax();
	 
	// Initialize slider
	 $('.slider').slider();
	
	// Initialize text area
     $('#textarea1').trigger('autoresize');

	 // Initialize carousel
	 $('.carousel.carousel-slider').carousel({full_width: true,
	   dist:0,
       shift:0
	  });
	  
	  //Match column height
	  $('.equalHightColumn').matchHeight();
	  
	
	  $('.modal').modal();

	  
    // Initialize scrollfire
	   var options = [
   
      {selector: '#projects', offset: 200, callback: function(el) {
		    $("#projects").addClass("slideLeft");
		  		    
        //Materialize.toast("Please continue scrolling!", 1500 );
      } },
      {selector: '#project_1', offset: 200, callback: function(el) {
		$("#project_1").addClass("slideUp");
      } },

	  {selector: '#project_2', offset: 200, callback: function(el) {
		$("#project_2").addClass("slideUp");  
      } },
	  
	  {selector: '#project_3', offset: 200, callback: function(el) {
		$("#project_3").addClass("slideUp");
      } },
	  
	  {selector: '#project_4', offset: 200, callback: function(el) {
		$("#project_4").addClass("slideUp"); 
      } },
	  
	  {selector: '#project_5', offset: 200, callback: function(el) {
		$("#project_5").addClass("slideUp");
      
      } },
	  {selector: '#project_6', offset: 200, callback: function(el) {
		$("#project_6").addClass("slideUp" );
        
      } }, 
	  
	   {selector: '#project_7', offset: 200, callback: function(el) {
		$("#project_7").addClass("slideUp" );
        
      } }, 
	  
	   {selector: '#project_8', offset: 200, callback: function(el) {
		$("#project_8").addClass("slideUp" );
        
      } }, 
	  {selector: '#container', offset: 200, callback: function(el) {

    var chartData =[

[Date.UTC(2010,5,2),80],
[Date.UTC(2012,5,3),83.5],
[Date.UTC(2016,5,4),85],
];
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
            }
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
                    radius: 2
                },
                lineWidth: 1,
                states: {
                    hover: {
                        lineWidth: 1
                    }
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
      } }, 

    ];
    Materialize.scrollFire(options);
        
  }); // end of document ready
})(jQuery); // end of jQuery name space
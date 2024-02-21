(function($){
$(function(){
$('.button-collapse').sideNav();
$('.datepicker').pickadate({
selectMonths: true, // Creates a dropdown to control month
selectYears: 15 // Creates a dropdown of 15 years to control year
});
}); // end of document ready
})(jQuery); // end of jQuery name space
 $('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrain_width: false, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: false, // Displays dropdown below the button
      alignment: 'left' // Displays dropdown with edge aligned to the left of button
    }
  );
  $(document).ready(function(){
    $('ul.tabs').tabs();
  });
    $(document).ready(function(){
    $('.collapsible').collapsible({
      accordion : true// A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
  });
     $(document).ready(function(){
    $('.materialboxed').materialbox();
  });
     var slider = document.getElementById('test5');
  noUiSlider.create(slider, {
   start: [30, 80],
   connect: true,
   step: 1,
   range: {
     'min': 0,
     'max': 100
   },
   format: wNumb({
     decimals: 0
   })
  });
   $(document).ready(function(){
    $('.tooltipped').tooltip({delay: 50});
  });
    $('.tooltipped').tooltip('remove');
	 $('.fixed-action-btn').openFAB();
	 $('.fixed-action-btn').closeFAB();
	 $(document).ready(function(){
      $('.slider').slider({full_width: true});
    });
	 // Pause slider
$('.slider').slider('pause');
// Start slider
$('.slider').slider('start');

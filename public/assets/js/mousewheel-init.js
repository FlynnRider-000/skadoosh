


  var owl = $('.owl-carousel:first');
  owl.owlCarousel({
      loop:true,
      
      margin:10,
      
      responsive:{
        0:{
            items:1
        },            
        600:{
            items:2
        },
        800:{
            items:3
        },
        1000:{
            items:3
        }
      }
  });
  owl.on('mousewheel', '.owl-stage', function (e) {
      if (e.deltaY>0) {
          owl.trigger('next.owl');
      } else {
          owl.trigger('prev.owl');
      }
      e.preventDefault();
  });


  var owl2 = $('.owl-carousel:eq(1)');
  owl2.owlCarousel({
      loop:true,
      
      margin:10,
      
      responsive:{
        0:{
            items:1.2
        },            
        600:{
            items:2.2
        },
        800:{
            items:3.2
        },
        1000:{
            items:3.4
        }
      }
  });
   owl2.on('mousewheel', '.owl-stage', function (e) {
      if (e.deltaY>0) {
          owl2.trigger('next.owl');
      } else {
          owl2.trigger('prev.owl');
      }
      e.preventDefault();
  }); 


  var owl3 = $('.owl-carousel:eq(2)');
  owl3.owlCarousel({
      loop:true,
      
      margin:10,
      
      responsive:{
        0:{
            items:1.2
        },            
        600:{
            items:2.2
        },
        800:{
            items:3.2
        },
        1000:{
            items:3.4
        }
      }
  });
   owl3.on('mousewheel', '.owl-stage', function (e) {
      if (e.deltaY>0) {
          owl3.trigger('next.owl');
      } else {
          owl3.trigger('prev.owl');
      }
      e.preventDefault();
  }); 



  var owl4 = $('.owl-carousel:eq(3)');
  owl4.owlCarousel({
      loop:true,
      
      margin:10,
      
      responsive:{
        0:{
            items:1.2
        },            
        600:{
            items:2.2
        },
        800:{
            items:3.2
        },
        1000:{
            items:3.4
        }
      }
  });
   owl4.on('mousewheel', '.owl-stage', function (e) {
      if (e.deltaY>0) {
          owl4.trigger('next.owl');
      } else {
          owl4.trigger('prev.owl');
      }
      e.preventDefault();
  });

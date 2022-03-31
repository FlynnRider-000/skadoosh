$('.owl-carousel').owlCarousel({

  loop:false,
  margin:10,
  nav:false,
  navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
  responsiveClass:true,
  responsive:{
      0:{
          items:1.2,
      },            
      600:{
          items:2.2,
      },
      800:{
          items:3,
      },
      1000:{
          items:4,
      }
  }
})
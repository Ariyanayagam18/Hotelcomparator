// header mobile responsive start 
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
// header mobile responsive end 


$(document).ready(function(){
  // header select script start 
  

  function custom_template(obj){
    var data = $(obj.element).data();
    var text = $(obj.element).text();
    if(data && data['img_src']){
        img_src = data['img_src'];
        template = $("<div><img src=\"" + img_src + "\"  style=\"width: 30px;height: 30px;\"/><p  class='language' style=\"margin-bottom: 0px;\">" + text + "</p></div>");
        return template;
    }
  }
  var options = {
  'templateSelection': custom_template,
  'templateResult': custom_template,
  }
  $('#id_select2_example').select2(options);
  $('.select2-container--default .select2-selection--single').css({'height': 'auto'});


  function custom_template(obj){
    var data = $(obj.element).data();
    var text = $(obj.element).text();

    if(data && data['img_src']){
        img_src = data['img_src'];
        template = $("<div><img src=\"" + img_src + "\" style=\"width: 30px;height: 30px;\"/><p style=\"margin-bottom: 0px;\">" + text + "</p></div>");
        return template;
    }
  }
  var options = {
  'templateSelection': custom_template,
  'templateResult': custom_template,
  }
  $('#id_select2_examples').select2(options);
  $('.select2-container--default .select2-selection--single').css({'height': 'auto'});

  // header select script start 

  $('#sec2-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        280:{
            items:1
        },
        500:{
            items:2
        },
        768:{
          items:2
        },
        992:{
          items:3
        },
        1200:{
            items:4
        },
        1900:{
          items:5
        }
    }
})


$('#sec5-carousel').owlCarousel({     
  nav: false,
  loop:false,
  dots: true,
  pagination: false,
  margin: 15,
  autoHeight: false,
  stagePadding: 50,
  responsive:{
    0:{
      items: 1,
      stagePadding: 0,
      margin: 30,
    },
    500:{
      items: 2,
      stagePadding: 30,
    },
    768:{
      items: 3,
      stagePadding: 25,
    },
    1000:{
      items: 3,
    }
  }
})

$('#view-carousel').owlCarousel({
  nav: true,
  loop: false,
  dots: false,
  pagination: false,
  margin: 15,
  autoHeight: false,
  stagePadding: 20,
  responsive: {
    0: {
      items: 1,
      stagePadding: 0,
      margin: 30,
    },
    500: {
      items: 1.8,
      stagePadding: 30,
    },
    768: {
      items: 1.8,
      stagePadding: 25,
    },
    1000: {
      items: 1.8,
    }
  }
})

$('#Hotels , #Hotels1 , #Hotels2').owlCarousel({
  loop:true,
  margin:10,
  nav:false,
  responsive:{
      0:{
          items:1
      },
      600:{
          items:2
      },        
      1600:{
          items:3
      },
  }
})

$('#Explore').owlCarousel({
  loop:true,
  margin:10,
  nav:true,
  dots:false,
  responsive:{
      0:{
          items:1
      },
      500:{
        items:2
      },
      600:{
          items:3
      },              
      1280:{
        items:4
      }
  }
})

// pagination scritp start 

var items = $(".list-wrapper .list-item");
    var numItems = items.length;
    var perPage = 5;

    items.slice(perPage).hide();

    $('#pagination-container').pagination({
        items: numItems,
        itemsOnPage: perPage,
        prevText: "Pre",
        nextText: "Next",
        onPageClick: function (pageNumber) {
            var showFrom = perPage * (pageNumber - 1);
            var showTo = showFrom + perPage;
            items.hide().slice(showFrom, showTo).show();
        }
    });

// pagination scritp end 


$("#hotel").click(function() {  
    console.log('new')
});

//login page hide and show
$("#loginbutton").click(function() {  
  $(".login-section").toggle(); 
});

//Guestroomstoggle

$('.counter-minus').click(function(){
  quantityField = $(this).next();
  if (quantityField.val() != 0) {
     quantityField.val(parseInt(quantityField.val(), 10) - 1);
  }
});

$('.counter-plus').click(function(){
  quantityField = $(this).prev();
  quantityField.val(parseInt(quantityField.val(), 10) + 1);
});

$('#reset').click(function(){
  $('#guestrooms').val("1 Adult, 1 Room ")
  $('.adults').val(0)
  $('.Children').val(0)
  $('.Rooms').val(0)

  adults[0].dataset.value = $('.adults').val();
  Children[0].dataset.value = $('.Children').val();
  Rooms[0].dataset.value = $('.Rooms').val();
})
//end guestroom


//star
$(".Popular-Filters").click(function() {
    $(".Pop_Filter").toggle();
    $(".Popular-Filters").addClass('arrowcheck'); 
});
//star end

//search
$(".position-relative").click(function() {
  $("#list_show").toggle();
  $(".Popular-Filters").addClass('arrowcheck'); 
});
//search end

//datapicker
$(".calender-sec").click(function() {
  $(".daterangepicker").toggle();
  $(".Popular-Filters").addClass('arrowcheck'); 
});
//datapicker end

  
// datapicker scritp start 


  $('input[name="datefilter"]').daterangepicker({
    autoUpdateInput: false,
    locale: {
      cancelLabel: 'Clear'
    }
  });

  $('input[name="datefilter"]').on('apply.daterangepicker', function (ev, picker) {
    $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
  });

  $('input[name="datefilter"]').on('cancel.daterangepicker', function (ev, picker) {
    $(this).val('');
  });

  //   custom script for date picker 

  $('.available').click(function () {

    console.log('available click!!!')

    datePicker();
    if ($('.end-date').hasClass('active')) {

      getnoOfDays($('.in-range').length + 1)
    }

  })

  $('.daterangepicker').addClass('date_picker');


  $('.applyBtn').click(function () {
    console.log('count : ', $('.in-range').length + 1)
    getnoOfDays($('.in-range').length + 1)
  });


  $('.cancelBtn').click(function () {
    console.log('count : ', $('.in-range').length + 1)
    datePicker();
    $('#no_of_days').val('0 days')
  });

  const getnoOfDays = (day_count) => {
    $('#no_of_days').val(day_count + 'days')
    console.log('days choosed!!')
  }


  $('<span id="no_of_days" data-days="0">0 days</span>').insertAfter('.drp-selected')

  console.log('days : ', $('#no_of_days'))


var restrict = ["guestrooms","search_field",'popular-filter']

$("#guestrooms , #search_field").click(function(e) {
	e.stopPropagation();
});

$("body").on('click', function(e) {
	if( !(restrict.includes(e.target))) {  
    $('.auto_suggest').hasClass('open') ? $('.auto_suggest').hide() : '';
    // $('.Pop_Filter').hide();
    // $('.members').hasClass('members-open') ? $('.members').removeClass('members-open') : '';
	}
});


$('#search_field').click(function () {
  $('.auto_suggest').show();
  $('#list_show').show();
  // $('.auto_suggest').addClass('open');  
})

$('#guestrooms').click(function () {
  $('.members').show();  
})

$('#guests_ok').click(function()
{
  $('.members').hide();
})


$("input:checkbox").click(function() {
      var output = "";
      $("input:checked").each(function() {
        output = $(this).val();
      });
      $(".pop-input").val(output.trim());
});

  setTimeout(function () {
  
    // Closing the alert
    $('#errormsg').alert('close');
}, 5000);


$('#loginformid').validate({ // initialize the plugin
  rules: {
      email: {
          required: true,
          email: true
      },
      password: {
          required: true,
          minlength: 5
      }
  },
  

})

if($('#default-hotel').val() == 0) 
{
    $('#loader').attr("src","{{asset('images/notfound.gif')}}")
    $('#loader').css('display','block')
}



$(".suggest_city").click(function ()
{    
var a = $(this).attr("data-regionid");
var b = $(this).attr("value");
console.log('value',b);
$('#hidden_search_field').val(a);
$("#search_field").val(b); // here the clicked value is showing in the div name user
console.log(a);            // here the clicked value is showing in the console
});


// var suggest = document.getElementsByClassName('suggest_city')

// suggest.onclick = function(){
//   console.log('value : ',this)
// }

});
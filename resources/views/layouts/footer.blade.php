<div class="footer">
    <div class="footer-section navbar">
        <div class="footer-logo">
            <div class="foot-logo"><img src="{{asset('images/logo.svg')}}"></div>
            <div class="social-img mt-3">
                <img src="{{asset('images/fb.svg')}}">
                <img src="{{asset('images/twitter.svg')}}">
                <img src="{{asset('images/instgram.svg')}}">
                <img src="{{asset('images/linkin.svg')}}">
            </div>
        </div>
        <div class="sites">
            <div>
                <p class="site-explore">International Sites</p>
                <ul>
                    <li><a href="{{ url('locale/frFR') }}" class="sites_link"><img src="{{asset('images/Flags/france.svg')}}">France</a></li>
                    <li><a href="{{ url('locale/enUS') }}" class="sites_link"><img src="{{asset('images/Flags/india.svg')}}">India</a></li>
                    <li><a href="{{ url('locale/enUS') }}" class="sites_link"><img src="{{asset('images/Flags/usa.svg')}}">USA</a></li>
                    <li><a href="{{ url('locale/esES') }}" class="sites_link"><img src="{{asset('images/Flags/EN.svg')}}">London</a></li>
                </ul>
            </div>
        </div>
        <div class="Explore">
            <div>
                <p class="site-explore">Explore</p>
                <ul>
                    <li>Sitemap</li>
                    <li>Cookie policy</li>
                    <li>Privacy policy</li>
                    <li>Terms of service</li>
                </ul>
            </div>
        </div>
        <div class="Contact">
            <div class="contact-us">
                <p>Contact Us</p>
                <div>
                    <input type="text" placeholder="Name">
                </div>
                <div>
                    <input type="text" placeholder="Email ID">
                </div>
                <div>
                    <button type="button" class="btn btn-primary"><img src="{{asset('images/footer-arrow.svg')}}" class="mr-2">Send</button>
                </div>
            </div>
        </div>
    </div>
    <div class="scanner">
        <p class="m-0">© Skyscanner Ltd 2002-2022</p>
    </div>
</div>
<!-- Bootstrap script -->
<script src="{{asset('jquery/jquery.validate.js')}}"></script>
<script src="{{asset('popper/popper.min.js')}}"></script>
<script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/common.js')}}"></script>
<!-- select script -->
<script src="{{asset('select/js/select2.js')}}"></script>
<!-- owl script-->
<script src="{{asset('owl/js/owl.carousel.min.js')}}"></script>
<!-- Pagination script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.js"></script>

<!-- data picker script -->
<script type="text/javascript" src="{{asset('datapicker/js/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('datapicker/js/daterangepicker.min.js')}}"></script>

<script>

  var currentPageUrl  = location.href 
  console.log("currentPageUrl : ",currentPageUrl);

  $('#id_select2_example').on('change',function(){
   
    console.log('this : ',$(this))
    localStorage.setItem("locale",$(this).find('.selected').data('locale'))
    
    location.href = `&language?locale=${$(this).find('.selected').data('locale')}`
    // location.href = `${currentPageUrl}&locale=${$(this).find('.selected').data('locale')}`
  })

  $('#id_select2_examples').on('change',function(){
    console.log('currency select : ',$(this).find('.selected').data('currency'))
    localStorage.setItem("currency",$(this).find('.selected').data('currency'))
    $('a.nav-link.active').hasClass('home') ? getHotels($('a.nav-link.active')[0].outerText) : '' ;
    (window.location.pathname == '/hotelDetails') ? currencyConversion(localStorage.getItem('currency'),$('#hotel_price').val()) : '' ;
    // location.href = `language?locale=${$(this).find('.selected').data('locale')}`
    
})

var currentRequest = null;    

function suggestPlaces(search_word) {
    //  $('#list_show').addClass('loader');
    //  $('#list_show').html('');
    console.log('search_word : ',search_word)
    if(search_word != '' || search_word.length > 1)
{
currentRequest = jQuery.ajax({
    type:'GET',
    url:"/suggestPlaces",
    data:{
        search_word : search_word
    },
    beforeSend : function()    {           
        if(currentRequest != null) {
            currentRequest.abort();
        }
    },
    success: function(data) {
            if($.isEmptyObject(data.error)){
        $('#list_show').html('');
        console.log('suggested cities count : ',data.length)
        let suggest = '';
            data.map(function(item) {
            suggest += '<li class="suggest_city" value ='+item.CityName+' data-regionId='+item.RegionID+'><div><img src="{{asset('images/places.svg')}}"></div><div class="city-place"><p class="city">'+item.CityName+'</p><p class="cityplace">'+item.ProvinceName+','+item.CountryName+'</p></div></li>'
        })
        $('#list_show').append(suggest);
    }
    },
    error:function(e){
        console.log('error !!!',e);
    }

});

}

//     $.ajax({
//   type:'GET',
//   url:"/suggestPlaces",
//   data:{
//     search_word : search_word
// },
//   success:function(data){
//        if($.isEmptyObject(data.error)){
//         $('#list_show').html('');
//         console.log('suggested cities count : ',data.length)
//         let suggest = '';
//             data.map(function(item) {
//             suggest += '<li class="suggest_city" value ='+item.CityName+' data-regionId='+item.RegionID+'><div><img src="{{asset('images/places.svg')}}"></div><div class="city-place"><p class="city">'+item.CityName+'</p><p class="cityplace">'+item.ProvinceName+','+item.CountryName+'</p></div></li>'
//         })
        
//         // $('#list_show').removeClass('loader');
//         $('#list_show').append(suggest);
//        }else{
//            printErrorMsg(data.error);
//        }
//   },
//   beforeSend: function () {
//     if (request !== null) {
//         request.abort();
//     }
//     }
// });
}


$('.locale').each(function(){
  if(localStorage.getItem("locale") == $(this).data('locale'))
  {
      console.log('selected language : ',$(this).data('locale'))
      $(this).attr('selected','true')
  }
//   location.href = `language?locale=${$(this).data('locale')}`
})

$('.currency').each(function(){
  if(localStorage.getItem("currency") == $(this).data('currency'))
  {
    console.log('selected currency : ',$(this).data('currency'))
      $(this).attr('selected','true')
  }
})



</script>



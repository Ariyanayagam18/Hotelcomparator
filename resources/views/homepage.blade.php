<div class="home-page" id="homepage">
    <div class="banner-section" id="homepage" >
        <div class="banner-inner">
            <p>Book with Us and</p> 
            <mark>Enjoy your Journey</mark>
        </div>
    </div>
    <div class="all-section">
        <div class="section-1">        
            <div class="row m-0 justify-content-between">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 form-group">
                    <label>Where do you want to stay</label>
                   
                    <div class="position-relative">
                        <input type="text" placeholder="Enter Destination or Hotel Name" class="search-stay search_field" id="search_field">                   
                        <div class="auto_suggest" style="display:none;">
                            <ul id="list_show">
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-6 col-sm-6 col-12 form-group">
                    <label>Check- In & check Out</label>
                    <input type="text" class="calender-sec" name="datefilter" id="date_picker" value="06/11/2022 to 13/11/2022 "/>  
                </div>
                <div class="col-xl-2 col-lg-3 col-md-6 col-sm-6 col-12 form-group">
                    <label>Guests and Rooms</label>                   
                    <div class="position-relative">
                        <div class="guestrooms">
                            <input class="guest-input" value="1 adult, 1 Room" readonly />                      
                        </div>
                        <div class="members" style="display:none">
                                <div class="list-room">
                                    <div class="list-guest">
                                        <img src="{{asset('images/Maskgroup.svg')}}"> 
                                        <p>Adults</p>
                                    </div>
                                    <div class="handle-counter" id="handleCounter">
                                        <button class="counter-minus btn btn-primary">
                                            <img src="{{asset('images/white-arrow.svg')}}">   
                                        </button>
                                        <input type="text" class="adults" value="0">
                                        <button class="counter-plus btn btn-primary">
                                            <img src="{{asset('images/white-arrow.svg')}}">   
                                        </button>
                                    </div>
                                </div>
                                <div class="list-room">
                                    <div class="list-guest">
                                        <img src="{{asset('images/childrengroup.svg')}}"> 
                                        <p>Children</p> 
                                    </div>
                                    <div class="handle-counter" id="handleCounter">
                                        <button class="counter-minus btn btn-primary">
                                               <img src="{{asset('images/white-arrow.svg')}}">
                                        </button>
                                        <input type="text" class="adults" value="0">
                                        <button class="counter-plus btn btn-primary">
                                               <img src="{{asset('images/white-arrow.svg')}}">
                                        </button>
                                    </div>
                                </div>
                                <div class="list-room">
                                    <div class="list-guest">
                                        <img src="{{asset('images/roomgroup.svg')}}"> 
                                        <p>Rooms </p>
                                    </div>
                                    <div class="handle-counter" id="handleCounter">
                                        <button class="counter-minus btn btn-primary">
                                               <img src="{{asset('images/white-arrow.svg')}}">
                                        </button>
                                        <input type="text" class="adults" value="0">
                                        <button class="counter-plus btn btn-primary">
                                               <img src="{{asset('images/white-arrow.svg')}}">
                                        </button>
                                    </div>
                                </div>      
                                <hr>                         
                                <div class="reset-ok">
                                    <button id="reset">
                                        Reset
                                    </button>
                                    <button id="guests_ok">
                                        Done
                                    </button>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-6 col-sm-6 col-12 form-group">
                    <label>Popular Filters</label>
                    <div class="position-relative PopularFilters">
                        <div class="Popular-Filters">
                            <input class="pop-input" value="4 Stars" readonly />                      
                        </div>
                        <div class="Pop_Filter" style="display:none">
                            <div class="popular-bor">                                
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" value="3 Stars" id="customCheck27">
                                    <label class="custom-control-label" for="customCheck27">
                                        <span class="ml-3 d-flex align-items-center">3 Stars 
                                            <span class="star-multi ml-1 mr-2">
                                                <img src="{{asset('images/Star.svg')}}">
                                                <img src="{{asset('images/Star.svg')}}">
                                                <img src="{{asset('images/Star.svg')}}">
                                            </span>
                                        </span>
                                    </label>
                                </div>                                                                
                            </div> 
                            <div class="popular-bor">                                
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" value="4 Stars" id="customCheck28">
                                    <label class="custom-control-label" for="customCheck28">
                                        <span class="ml-3 d-flex align-items-center">4 Stars 
                                            <span class="star-multi ml-1 mr-2">
                                                <img src="{{asset('images/Star.svg')}}">
                                                <img src="{{asset('images/Star.svg')}}">
                                                <img src="{{asset('images/Star.svg')}}">
                                                <img src="{{asset('images/Star.svg')}}">
                                            </span>
                                        </span>
                                    </label>
                                </div>                                                                
                            </div>  
                            <div class="popular-bor">                                
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" value="Free Cancellation" id="customCheck29">
                                    <label class="custom-control-label" for="customCheck29">
                                        <span class="ml-3 d-flex align-items-center">
                                            Free Cancellation                                           
                                        </span>
                                    </label>
                                </div>                                                                
                            </div> 
                        </div>
                    </div>  
                </div>
                <div class="col-xl-2 col-lg-12 col-md-12 col-sm-12 col-12 form-group text-center text-xl-left Search-Hotels">
                    <label></label>
                    <button type="button" class="btn btn-primary" >Search Hotels</button>
                </div>
            </div>                 
        </div>
        <div class="section-2">
            <div class="Plan-Your">Plan Your <span>Next Staycatin</span></div>
            <div class="row m-0">   
                <div class="col-xl-2 col-lg-4 col-md-4 col-12">
                    <!-- Nav pills -->
                    <ul class="nav nav-pills tabs-home" role="tablist" id="staycation_cities">
        
         
                     <!-- <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="#home">Edinburgh</a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#menu1">Manchester</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#menu2">London</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#menu3">Belfast</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#menu4">Glasgow</a>
                        </li> -->
                    </ul>
                </div> 
                <div class="col-xl-10 col-lg-8 col-md-8 col-12">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="home" class="tab-pane active">
                            <div class="owl-carousel owl-theme" id="sec2-carousel">
                                <div class="item test">
                                    
                                </div>                                
                            </div>
                            <div class="view-more">View more</div>
                        </div>
                        <div id="menu1" class="tab-pane fade"><br>
                            <h3>Menu 1</h3>
                            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                        <div id="menu2" class="tab-pane fade"><br>
                            <h3>Menu 2</h3>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                        </div>
                        <div id="menu3" class="tab-pane fade"><br>
                            <h3>Menu 2</h3>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                        </div>
                        <div id="menu4" class="tab-pane fade"><br>
                            <h3>Menu 2</h3>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sec3-inner">
            <div class="section-3">
                <div class="row m-0">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                        <div class="best-price">
                            <p>Get the Best Prices from To</p>
                            <p>Hotel Provider</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                        <div class="exp-img">
                            <img src="{{asset('images/exp.svg')}}">    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sec4-inner">
            <div class="section-4">
                <div class="row m-0">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                        <div class="see-inner left-right">
                            <div class="see-img text-center"><img src="{{asset('images/img1.svg')}}"></div>
                            <div>See it All</div>
                            <p>From local hotels to global brands, discover millions of rooms all around the world.</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                        <div class="see-inner center">
                            <div class="see-img text-center"><img src="{{asset('images/img2.svg')}}"></div>
                            <div>Compare Right Here</div>
                            <p>No need to search anywhere else. The biggest names in travel are right here.</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                        <div class="see-inner left-right">
                            <div class="see-img text-center"><img src="{{asset('images/img3.svg')}}"></div>
                            <div>Get Rxclusive Rates</div>
                            <p>We’ve special deals with the world's leading hotels – and we share these savings with you.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-5">
            <div class="need-inspiration">
                <p>Need <span>Inspiration</span></p>
                <p>View our hand-picked hotel destinations</p>
            </div>
            <div>
                <div class="owl-carousel owl-theme" id="sec5-carousel">
                    <div class="item">
                        <div class="sec5-inner France-img">
                            <div>France</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="sec5-inner America-img">
                            <div>America</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="sec5-inner India-img">
                            <div>India</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="sec5-inner london-img">
                            <div>London</div>
                        </div>
                    </div>  
                    <div class="item">
                        <div class="sec5-inner France-img">
                            <div>France</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="sec5-inner America-img">
                            <div>America</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="sec5-inner India-img">
                            <div>India</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="sec5-inner london-img">
                            <div>London</div>
                        </div>
                    </div>                                        
                </div>
            </div>
        </div>
    </div>
</div>








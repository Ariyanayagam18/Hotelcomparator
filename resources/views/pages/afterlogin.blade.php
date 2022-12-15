<div class="afterlogin">
    @include('layouts/header')
    <div class="home-page">
   
        <div class="banner-section">
            
        </div>
        <div class="all-section">
            <div class="section-1">        
                <div class="row m-0 justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 form-group">
                        <label>Where do you want to stay</label>
                        <form method="post" action="{{url('hotelsearch')}}" id="search-holder">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">   
                        <div class="position-relative">
                        <input type="text" placeholder="Enter Destination or Hotel Name" name="country"  class="search-stay search_field"  value="<?php echo $inputdata['country'];?>" readonly>                   
                        <div class="auto_suggest" style="display:none;">
                            <ul id="list_show">
                       
                            </ul>
                        </div>
                    </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-6 col-sm-6 col-12 form-group">
                        <label>Check- In & check Out</label>
                        <input type="text" class="calender-sec"  value="<?php echo $inputdata['country'];?>" /> 
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-6 col-sm-6 col-12 form-group">
                        <label>Guests and Rooms</label>
                        <div class="position-relative">
                        <div class="guestrooms">
                            <input class="guest-input" value="<?php echo $inputdata['country'];?>" readonly />                      
                        </div>
                        
                        <!-- <div class="members" style="display:none">
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
                        </div> -->
                    </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-6 col-sm-6 col-12 form-group">
                        <label>Popular Filters</label>
                        <div class="position-relative PopularFilters">
                        <div class="Popular-Filters">
                            <input class="pop-input" value="<?php echo $inputdata['country'];?>" readonly />                      
                        </div>
                        <!-- <div class="Pop_Filter" style="display:none">
                            <div class="popular-bor">                                
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck27">
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
                                    <input type="checkbox" class="custom-control-input" id="customCheck28">
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
                                    <input type="checkbox" class="custom-control-input" id="customCheck29">
                                    <label class="custom-control-label" for="customCheck29">
                                        <span class="ml-3 d-flex align-items-center">
                                            Free Cancellation                                           
                                        </span>
                                    </label>
                                </div>                                                                
                            </div> 
                        </div> -->
                    </div>  
                    </div>
                    <div class="col-xl-2 col-lg-12 col-md-12 col-sm-12 col-12 form-group text-center text-xl-left Search-Hotels">
                        <label></label>
                        <button type="button" class="btn btn-primary">Search Hotels</button>
                    </div>
                </div>                 
            </div>
            <div class="section-2">
            <div class="row m-0">
                <div class="col-xl-3 col-lg-3 col-md-4 col-12">
                    <div class="filter-outer">
                        <div class="filter-sec">Filters</div>
                        <div class="filter-inner">
                            <div class="mb-4">
                                <p class="filter-title">Book with peace of mind</p>
                                <div>
                                    <div class="row mb-3">
                                        <div class="col-xl-8 col-lg-8 col-md-8 col-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1"><span class="ml-3">Free Cancellation</span></label>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                            <div class="book-right">1433</div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-xl-8 col-lg-8 col-md-8 col-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                <label class="custom-control-label" for="customCheck2"><span class="ml-3">Pay on Arrival</span></label>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                            <div class="book-right">490</div>
                                        </div>
                                    </div>                                           
                                </div>
                            </div>
                            <div class="mb-4">
                                <p class="filter-title">View price as</p>
                                <div class="filter-tabs">
                                    <!-- Nav pills -->
                                    <ul class="nav nav-pills mb-4" role="tablist">
                                        <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#PerNight">Per Night</a>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#Totalstay">Total stay</a>
                                        </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div id="PerNight" class="container tab-pane p-0 active">
                                            <div>
                                                <div class="row mb-3">
                                                    <div class="col-xl-8 col-lg-8 col-md-8 col-12">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck3" checked>
                                                            <label class="custom-control-label" for="customCheck3"><span class="ml-3">$0 - $1,150</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                                        <div class="book-right">1396</div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-xl-8 col-lg-8 col-md-8 col-12">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck4" checked>
                                                            <label class="custom-control-label" for="customCheck4"><span class="ml-3">$1,150 - $2,300</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                                        <div class="book-right">430</div>
                                                    </div>
                                                </div> 
                                                <div class="row mb-3">
                                                    <div class="col-xl-8 col-lg-8 col-md-8 col-12">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck5">
                                                            <label class="custom-control-label" for="customCheck5"><span class="ml-3">$2,300 - $3,450</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                                        <div class="book-right">93</div>
                                                    </div>
                                                </div>  
                                                <div class="row mb-3">
                                                    <div class="col-xl-8 col-lg-8 col-md-8 col-12">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck6">
                                                            <label class="custom-control-label" for="customCheck6"><span class="ml-3">$3,450 - $4,600</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                                        <div class="book-right">44</div>
                                                    </div>
                                                </div>  
                                                <div class="row mb-3">
                                                    <div class="col-xl-8 col-lg-8 col-md-8 col-12">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck7">
                                                            <label class="custom-control-label" for="customCheck7"><span class="ml-3">$4,600 - $5,750</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                                        <div class="book-right">93</div>
                                                    </div>
                                                </div>  
                                                <div class="row mb-3">
                                                    <div class="col-xl-8 col-lg-8 col-md-8 col-12">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck8">
                                                            <label class="custom-control-label" for="customCheck8"><span class="ml-3">$5,750 +</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                                        <div class="book-right">31</div>
                                                    </div>
                                                </div>                                            
                                            </div>
                                            <div class="filter-input">
                                                <div class="row mb-3">
                                                    <div class="col-xl-9 col-lg-9 col-md-9 col-9">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <input type="text" class="form-control" placeholder="$">
                                                            <span class="ml-2 mr-2">-</span>
                                                            <input type="text" class="form-control" placeholder="$">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-3 col-md-3 col-3">
                                                        <div class="text-right">
                                                            <img src="{{asset('images/filter-search.svg')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="Totalstay" class="container tab-pane p-0 fade">
                                        <h3>Menu 1</h3>
                                        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                        </div>
                                    </div>
                                </div>                                    
                            </div>
                            <div class="mb-4">
                                <p class="filter-title">Star Rating</p>
                                <div>
                                    <div class="row mb-3">
                                        <div class="col-xl-8 col-lg-8 col-md-8 col-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck9">
                                                <label class="custom-control-label" for="customCheck9"><span class="ml-3 d-flex align-items-center">5<span class="ml-1 mr-2"><img src="{{asset('images/Star.svg')}}"></span>Rating</span></label>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                            <div class="book-right">165</div>
                                        </div>
                                    </div>   
                                    <div class="row mb-3">
                                        <div class="col-xl-8 col-lg-8 col-md-8 col-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck10">
                                                <label class="custom-control-label" for="customCheck10"><span class="ml-3 d-flex align-items-center">4<span class="ml-1 mr-2"><img src="{{asset('images/Star.svg')}}"></span>Rating</span></label>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                            <div class="book-right">1659</div>
                                        </div>
                                    </div>  
                                    <div class="row mb-3">
                                        <div class="col-xl-8 col-lg-8 col-md-8 col-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck11">
                                                <label class="custom-control-label" for="customCheck11"><span class="ml-3 d-flex align-items-center">3<span class="ml-1 mr-2"><img src="{{asset('images/Star.svg')}}"></span>Rating</span></label>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                            <div class="book-right">1</div>
                                        </div>
                                    </div>  
                                    <div class="row mb-3">
                                        <div class="col-xl-8 col-lg-8 col-md-8 col-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck12">
                                                <label class="custom-control-label" for="customCheck12"><span class="ml-3 d-flex align-items-center">2<span class="ml-1 mr-2"><img src="{{asset('images/Star.svg')}}"></span>Rating</span></label>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                            <div class="book-right">0</div>
                                        </div>
                                    </div>  
                                    <div class="row mb-3">
                                        <div class="col-xl-8 col-lg-8 col-md-8 col-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck13">
                                                <label class="custom-control-label" for="customCheck13"><span class="ml-3 d-flex align-items-center">1<span class="ml-1 mr-2"><img src="{{asset('images/Star.svg')}}"></span>Rating</span></label>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                            <div class="book-right">1</div>
                                        </div>
                                    </div> 
                                    <div class="row mb-3">
                                        <div class="col-xl-8 col-lg-8 col-md-8 col-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck14">
                                                <label class="custom-control-label" for="customCheck14"><span class="ml-3 d-flex align-items-center">Unrated</label>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                            <div class="book-right">0</div>
                                        </div>
                                    </div>                                                                               
                                </div>
                            </div>
                            <div class="mb-4">
                                <p class="filter-title">Accommodation Type</p>
                                <div>
                                    <div class="row mb-3">
                                        <div class="col-xl-8 col-lg-8 col-md-8 col-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck15">
                                                <label class="custom-control-label" for="customCheck15"><span class="ml-3">Hotel</span></label>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                            <div class="book-right">1433</div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-xl-8 col-lg-8 col-md-8 col-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck16">
                                                <label class="custom-control-label" for="customCheck16"><span class="ml-3">Guest house</span></label>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                            <div class="book-right">435</div>
                                        </div>
                                    </div> 
                                    <div class="row mb-3">
                                        <div class="col-xl-8 col-lg-8 col-md-8 col-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck17">
                                                <label class="custom-control-label" for="customCheck17"><span class="ml-3">Apartment</span></label>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                            <div class="book-right">177</div>
                                        </div>
                                    </div>   
                                    <div class="row mb-3">
                                        <div class="col-xl-8 col-lg-8 col-md-8 col-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck18">
                                                <label class="custom-control-label" for="customCheck18"><span class="ml-3">Holiday Rentals</span></label>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                            <div class="book-right">68</div>
                                        </div>
                                    </div>   
                                    <div class="row mb-3">
                                        <div class="col-xl-8 col-lg-8 col-md-8 col-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck19">
                                                <label class="custom-control-label" for="customCheck19"><span class="ml-3">Resort</span></label>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                            <div class="book-right">8</div>
                                        </div>
                                    </div>   
                                    <div class="row mb-3">
                                        <div class="col-xl-8 col-lg-8 col-md-8 col-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck20">
                                                <label class="custom-control-label" for="customCheck20"><span class="ml-3">Unique stays</span></label>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                            <div class="book-right">3</div>
                                        </div>
                                    </div>                                             
                                </div>
                                <div class="SeeMore">See More</div>
                            </div>
                            <div class="mb-4">
                                <p class="filter-title">Cancellation policy</p>
                                <div>
                                    <div class="row mb-3">
                                        <div class="col-xl-8 col-lg-8 col-md-8 col-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck21">
                                                <label class="custom-control-label" for="customCheck21"><span class="ml-3">Free Cancellation</span></label>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                            <div class="book-right">1259</div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-xl-8 col-lg-8 col-md-8 col-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck22">
                                                <label class="custom-control-label" for="customCheck22"><span class="ml-3">Non refundable</span></label>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                            <div class="book-right">1322</div>
                                        </div>
                                    </div>                                           
                                </div>
                            </div>
                            <div class="mb-4">
                                <p class="filter-title">Meal plan</p>
                                <div>
                                    <div class="row mb-3">
                                        <div class="col-xl-8 col-lg-8 col-md-8 col-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck23">
                                                <label class="custom-control-label" for="customCheck23"><span class="ml-3">Breakfast included</span></label>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                            <div class="book-right">1274</div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-xl-8 col-lg-8 col-md-8 col-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck24">
                                                <label class="custom-control-label" for="customCheck24"><span class="ml-3">Meals not included</span></label>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                            <div class="book-right">1194</div>
                                        </div>
                                    </div>                                           
                                </div>
                                <div class="SeeMore">More Details</div>
                            </div>
                            <div class="mb-4">
                                <p class="filter-title">Guest rating</p>
                                <div>
                                    <div class="row mb-3">
                                        <div class="col-xl-8 col-lg-8 col-md-8 col-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck25">
                                                <label class="custom-control-label" for="customCheck25"><span class="ml-3">With honours</span></label>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                            <div class="book-right">1274</div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-xl-8 col-lg-8 col-md-8 col-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck26">
                                                <label class="custom-control-label" for="customCheck26"><span class="ml-3">Excellent</span></label>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                            <div class="book-right">1194</div>
                                        </div>
                                    </div>                                           
                                </div>
                                <div class="SeeMore">More Details</div>
                            </div>
                        </div>                           
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 col-md-8 col-12">
                    <div>
                        <div class="hotel-found">1826 hotels found in England</div>
                        <div class="row select-sort">
                            <div class="col-xl-8 col-lg-8 col-md-8 col-12">
                                <div>
                                    <span class="select-multi">
                                        <div class="cross-red"><img src="{{asset('images/red-cross.svg')}}"></div>
                                        <select class="form-control">
                                            <option>$0 - $1,150</option>
                                            <option>$1 - $1,150</option>
                                            <option>$2 - $1,150</option>
                                            <option>$3 - $1,150</option>
                                        </select>
                                    </span>
                                    <span class="select-multi">
                                        <div class="cross-red"><img src="{{asset('images/red-cross.svg')}}"></div>
                                        <select class="form-control">
                                            <option>$0 - $0,150</option>
                                            <option>$1 - $1,150</option>
                                            <option>$2 - $2,150</option>
                                            <option>$3 - $3,150</option>
                                        </select>                        
                                    </span>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                <div class="align-items-center d-flex">
                                    <div class="sort-by">Sort by</div>
                                    <div class="sort-select">
                                        <select class="form-control">
                                            <option>Best</option>
                                            <option>Best</option>
                                            <option>Best</option>
                                            <option>Best</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-wrapper">
                            
                            @foreach($hotels as $items)
                          
                            <div class="row m-0  hotel-list list-item">
                                <div class="col-xl-5 col-lg-4 col-md-4 col-sm-4 col-12 p-0">
                                    <div class="hotel-img"><img src="<?php if(isset($items->heroImage)){
                                        echo $items->heroImage;}?>" class="w-100"></div>
                                    
                                </div>
                                <div class="col-xl-7 col-lg-8 col-md-8 col-sm-8 col-12 p-0">
                                    <div class="row m-0 pt-3">
                                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-7 w-sm-400">
                                            <div class="hotel-leftside">
                                                <p class="hotel-title"><?php echo  $items->propertyName;?></p>
                                                <div class="hotel-loc">
                                                    <img src="{{asset('images/location.svg')}}">
                                                    <div><p class="m-0"><?php echo $items->country;?></p></div>
                                                </div>
                                                <div class="breakfast">
                                                    <img src="{{asset('images/break.svg')}}">
                                                    <div><p class="m-0">Breakfast Included</p></div>
                                                </div>
                                                <div class="Night-price">$133 a Night</div>
                                            </div>
                                        </div>
                                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5 w-sm-400">
                                            <div class="bor-bottom">
                                                <div>
                                                    <img src="{{asset('images/Star.svg')}}">
                                                    <img src="{{asset('images/Star.svg')}}">
                                                    <img src="{{asset('images/Star.svg')}}">
                                                    <img src="{{asset('images/Star.svg')}}">
                                                </div>
                                                <div class="Rating">Rating</div>
                                            </div>
                                            <div class="bor-bottom">
                                                <div class="Agoda">
                                                    Agoda
                                                </div>
                                                <div class="num-price">$818</div>
                                            </div>
                                            <div class="bor-bottom">
                                                <div class="Agoda">
                                                    Booking.com
                                                </div>
                                                <div class="num-price">$819</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-0 pb-3">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pr-0 w-sm-400">
                                            <div class="exp-price">                                              
                                                <div><img src="{{asset('images/exp-img.svg')}}"></div>   
                                                <div class="value-price"><?php echo $items->referencePrice_value ?></div> 
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pl-0 w-sm-400">
                                            <div class="exp-view">                                              
                                                View More
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- <div class="row m-0  hotel-list list-item">
                                <div class="col-xl-5 col-lg-4 col-md-4 col-sm-4 col-12 p-0">
                                    <div class="hotel-img"><img src="{{asset('images/room/room1.svg')}}" class="w-100"></div>
                                </div>
                                <div class="col-xl-7 col-lg-8 col-md-8 col-sm-8 col-12 p-0">
                                    <div class="row m-0 pt-3">
                                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-7 w-sm-400">
                                            <div class="hotel-leftside">
                                                <p class="hotel-title">Holiday Inn London West,an IHG Hotel</p>
                                                <div class="hotel-loc">
                                                    <img src="{{asset('images/location.svg')}}">
                                                    <div><p class="m-0">London</p></div>
                                                </div>
                                                <div class="breakfast">
                                                    <img src="{{asset('images/break.svg')}}">
                                                    <div><p class="m-0">Breakfast Included</p></div>
                                                </div>
                                                <div class="Night-price">$133 a Night</div>
                                            </div>
                                        </div>
                                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5 w-sm-400">
                                            <div class="bor-bottom">
                                                <div>
                                                    <img src="{{asset('images/Star.svg')}}">
                                                    <img src="{{asset('images/Star.svg')}}">
                                                    <img src="{{asset('images/Star.svg')}}">
                                                    <img src="{{asset('images/Star.svg')}}">
                                                </div>
                                                <div class="Rating">Rating</div>
                                            </div>
                                            <div class="bor-bottom">
                                                <div class="Agoda">
                                                    Agoda
                                                </div>
                                                <div class="num-price">$818</div>
                                            </div>
                                            <div class="bor-bottom">
                                                <div class="Agoda">
                                                    Booking.com
                                                </div>
                                                <div class="num-price">$819</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-0 pb-3">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pr-0 w-sm-400">
                                            <div class="exp-price">                                              
                                                <div><img src="{{asset('images/exp-img.svg')}}"></div>   
                                                <div class="value-price">$795</div> 
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pl-0 w-sm-400">
                                            <div class="exp-view">                                              
                                                View More
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-0  hotel-list list-item">
                                <div class="col-xl-5 col-lg-4 col-md-4 col-sm-4 col-12 p-0">
                                    <div class="hotel-img"><img src="{{asset('images/room/room2.svg')}}" class="w-100"></div>
                                </div>
                                <div class="col-xl-7 col-lg-8 col-md-8 col-sm-8 col-12 p-0">
                                    <div class="row m-0 pt-3">
                                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-7 w-sm-400">
                                            <div class="hotel-leftside">
                                                <p class="hotel-title">Holiday Inn London West,an IHG Hotel</p>
                                                <div class="hotel-loc">
                                                    <img src="{{asset('images/location.svg')}}">
                                                    <div><p class="m-0">London</p></div>
                                                </div>
                                                <div class="breakfast">
                                                    <img src="{{asset('images/break.svg')}}">
                                                    <div><p class="m-0">Breakfast Included</p></div>
                                                </div>
                                                <div class="Night-price">$133 a Night</div>
                                            </div>
                                        </div>
                                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5 w-sm-400">
                                            <div class="bor-bottom">
                                                <div>
                                                    <img src="{{asset('images/Star.svg')}}">
                                                    <img src="{{asset('images/Star.svg')}}">
                                                    <img src="{{asset('images/Star.svg')}}">
                                                    <img src="{{asset('images/Star.svg')}}">
                                                </div>
                                                <div class="Rating">Rating</div>
                                            </div>
                                            <div class="bor-bottom">
                                                <div class="Agoda">
                                                    Agoda
                                                </div>
                                                <div class="num-price">$818</div>
                                            </div>
                                            <div class="bor-bottom">
                                                <div class="Agoda">
                                                    Booking.com
                                                </div>
                                                <div class="num-price">$819</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-0 pb-3">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pr-0 w-sm-400">
                                            <div class="exp-price">                                              
                                                <div><img src="{{asset('images/exp-img.svg')}}"></div>   
                                                <div class="value-price">$795</div> 
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pl-0 w-sm-400">
                                            <div class="exp-view">                                              
                                                View More
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-0  hotel-list list-item">
                                <div class="col-xl-5 col-lg-4 col-md-4 col-sm-4 col-12 p-0">
                                    <div class="hotel-img"><img src="{{asset('images/room/room3.svg')}}" class="w-100"></div>
                                </div>
                                <div class="col-xl-7 col-lg-8 col-md-8 col-sm-8 col-12 p-0">
                                    <div class="row m-0 pt-3">
                                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-7 w-sm-400">
                                            <div class="hotel-leftside">
                                                <p class="hotel-title">Holiday Inn London West,an IHG Hotel</p>
                                                <div class="hotel-loc">
                                                    <img src="{{asset('images/location.svg')}}">
                                                    <div><p class="m-0">London</p></div>
                                                </div>
                                                <div class="breakfast">
                                                    <img src="{{asset('images/break.svg')}}">
                                                    <div><p class="m-0">Breakfast Included</p></div>
                                                </div>
                                                <div class="Night-price">$133 a Night</div>
                                            </div>
                                        </div>
                                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5 w-sm-400">
                                            <div class="bor-bottom">
                                                <div>
                                                    <img src="{{asset('images/Star.svg')}}">
                                                    <img src="{{asset('images/Star.svg')}}">
                                                    <img src="{{asset('images/Star.svg')}}">
                                                    <img src="{{asset('images/Star.svg')}}">
                                                </div>
                                                <div class="Rating">Rating</div>
                                            </div>
                                            <div class="bor-bottom">
                                                <div class="Agoda">
                                                    Agoda
                                                </div>
                                                <div class="num-price">$818</div>
                                            </div>
                                            <div class="bor-bottom">
                                                <div class="Agoda">
                                                    Booking.com
                                                </div>
                                                <div class="num-price">$819</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-0 pb-3">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pr-0 w-sm-400">
                                            <div class="exp-price">                                              
                                                <div><img src="{{asset('images/exp-img.svg')}}"></div>   
                                                <div class="value-price">$795</div> 
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pl-0 w-sm-400">
                                            <div class="exp-view">                                              
                                                View More
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-0  hotel-list list-item">
                                <div class="col-xl-5 col-lg-4 col-md-4 col-sm-4 col-12 p-0">
                                    <div class="hotel-img"><img src="{{asset('images/room/room4.svg')}}" class="w-100"></div>
                                </div>
                                <div class="col-xl-7 col-lg-8 col-md-8 col-sm-8 col-12 p-0">
                                    <div class="row m-0 pt-3">
                                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-7 w-sm-400">
                                            <div class="hotel-leftside">
                                                <p class="hotel-title">Holiday Inn London West,an IHG Hotel</p>
                                                <div class="hotel-loc">
                                                    <img src="{{asset('images/location.svg')}}">
                                                    <div><p class="m-0">London</p></div>
                                                </div>
                                                <div class="breakfast">
                                                    <img src="{{asset('images/break.svg')}}">
                                                    <div><p class="m-0">Breakfast Included</p></div>
                                                </div>
                                                <div class="Night-price">$133 a Night</div>
                                            </div>
                                        </div>
                                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5 w-sm-400">
                                            <div class="bor-bottom">
                                                <div>
                                                    <img src="{{asset('images/Star.svg')}}">
                                                    <img src="{{asset('images/Star.svg')}}">
                                                    <img src="{{asset('images/Star.svg')}}">
                                                    <img src="{{asset('images/Star.svg')}}">
                                                </div>
                                                <div class="Rating">Rating</div>
                                            </div>
                                            <div class="bor-bottom">
                                                <div class="Agoda">
                                                    Agoda
                                                </div>
                                                <div class="num-price">$818</div>
                                            </div>
                                            <div class="bor-bottom">
                                                <div class="Agoda">
                                                    Booking.com
                                                </div>
                                                <div class="num-price">$819</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-0 pb-3">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pr-0 w-sm-400">
                                            <div class="exp-price">                                              
                                                <div><img src="{{asset('images/exp-img.svg')}}"></div>   
                                                <div class="value-price">$795</div> 
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pl-0 w-sm-400">
                                            <div class="exp-view">                                              
                                                View More
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-0  hotel-list list-item">
                                <div class="col-xl-5 col-lg-4 col-md-4 col-sm-4 col-12 p-0">
                                    <div class="hotel-img"><img src="{{asset('images/room/room4.svg')}}" class="w-100"></div>
                                </div>
                                <div class="col-xl-7 col-lg-8 col-md-8 col-sm-8 col-12 p-0">
                                    <div class="row m-0 pt-3">
                                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-7 w-sm-400">
                                            <div class="hotel-leftside">
                                                <p class="hotel-title">Holiday Inn London West,an IHG Hotel</p>
                                                <div class="hotel-loc">
                                                    <img src="{{asset('images/location.svg')}}">
                                                    <div><p class="m-0">London</p></div>
                                                </div>
                                                <div class="breakfast">
                                                    <img src="{{asset('images/break.svg')}}">
                                                    <div><p class="m-0">Breakfast Included</p></div>
                                                </div>
                                                <div class="Night-price">$133 a Night</div>
                                            </div>
                                        </div>
                                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5 w-sm-400">
                                            <div class="bor-bottom">
                                                <div>
                                                    <img src="{{asset('images/Star.svg')}}">
                                                    <img src="{{asset('images/Star.svg')}}">
                                                    <img src="{{asset('images/Star.svg')}}">
                                                    <img src="{{asset('images/Star.svg')}}">
                                                </div>
                                                <div class="Rating">Rating</div>
                                            </div>
                                            <div class="bor-bottom">
                                                <div class="Agoda">
                                                    Agoda
                                                </div>
                                                <div class="num-price">$818</div>
                                            </div>
                                            <div class="bor-bottom">
                                                <div class="Agoda">
                                                    Booking.com
                                                </div>
                                                <div class="num-price">$819</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-0 pb-3">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pr-0 w-sm-400">
                                            <div class="exp-price">                                              
                                                <div><img src="{{asset('images/exp-img.svg')}}"></div>   
                                                <div class="value-price">$795</div> 
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pl-0 w-sm-400">
                                            <div class="exp-view">                                              
                                                View More
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-0  hotel-list list-item">
                                <div class="col-xl-5 col-lg-4 col-md-4 col-sm-4 col-12 p-0">
                                    <div class="hotel-img"><img src="{{asset('images/room/room3.svg')}}" class="w-100"></div>
                                </div>
                                <div class="col-xl-7 col-lg-8 col-md-8 col-sm-8 col-12 p-0">
                                    <div class="row m-0 pt-3">
                                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-7 w-sm-400">
                                            <div class="hotel-leftside">
                                                <p class="hotel-title">Holiday Inn London West,an IHG Hotel</p>
                                                <div class="hotel-loc">
                                                    <img src="{{asset('images/location.svg')}}">
                                                    <div><p class="m-0">London</p></div>
                                                </div>
                                                <div class="breakfast">
                                                    <img src="{{asset('images/break.svg')}}">
                                                    <div><p class="m-0">Breakfast Included</p></div>
                                                </div>
                                                <div class="Night-price">$133 a Night</div>
                                            </div>
                                        </div>
                                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5 w-sm-400">
                                            <div class="bor-bottom">
                                                <div>
                                                    <img src="{{asset('images/Star.svg')}}">
                                                    <img src="{{asset('images/Star.svg')}}">
                                                    <img src="{{asset('images/Star.svg')}}">
                                                    <img src="{{asset('images/Star.svg')}}">
                                                </div>
                                                <div class="Rating">Rating</div>
                                            </div>
                                            <div class="bor-bottom">
                                                <div class="Agoda">
                                                    Agoda
                                                </div>
                                                <div class="num-price">$818</div>
                                            </div>
                                            <div class="bor-bottom">
                                                <div class="Agoda">
                                                    Booking.com
                                                </div>
                                                <div class="num-price">$819</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-0 pb-3">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pr-0 w-sm-400">
                                            <div class="exp-price">                                              
                                                <div><img src="{{asset('images/exp-img.svg')}}"></div>   
                                                <div class="value-price">$795</div> 
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pl-0 w-sm-400">
                                            <div class="exp-view">                                              
                                                View More
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-0  hotel-list list-item">
                                <div class="col-xl-5 col-lg-4 col-md-4 col-sm-4 col-12 p-0">
                                    <div class="hotel-img"><img src="{{asset('images/room/room.svg')}}" class="w-100"></div>
                                </div>
                                <div class="col-xl-7 col-lg-8 col-md-8 col-sm-8 col-12 p-0">
                                    <div class="row m-0 pt-3">
                                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-7 w-sm-400">
                                            <div class="hotel-leftside">
                                                <p class="hotel-title">Holiday Inn London West,an IHG Hotel</p>
                                                <div class="hotel-loc">
                                                    <img src="{{asset('images/location.svg')}}">
                                                    <div><p class="m-0">London</p></div>
                                                </div>
                                                <div class="breakfast">
                                                    <img src="{{asset('images/break.svg')}}">
                                                    <div><p class="m-0">Breakfast Included</p></div>
                                                </div>
                                                <div class="Night-price">$133 a Night</div>
                                            </div>
                                        </div>
                                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5 w-sm-400">
                                            <div class="bor-bottom">
                                                <div>
                                                    <img src="{{asset('images/Star.svg')}}">
                                                    <img src="{{asset('images/Star.svg')}}">
                                                    <img src="{{asset('images/Star.svg')}}">
                                                    <img src="{{asset('images/Star.svg')}}">
                                                </div>
                                                <div class="Rating">Rating</div>
                                            </div>
                                            <div class="bor-bottom">
                                                <div class="Agoda">
                                                    Agoda
                                                </div>
                                                <div class="num-price">$818</div>
                                            </div>
                                            <div class="bor-bottom">
                                                <div class="Agoda">
                                                    Booking.com
                                                </div>
                                                <div class="num-price">$819</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-0 pb-3">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pr-0 w-sm-400">
                                            <div class="exp-price">                                              
                                                <div><img src="{{asset('images/exp-img.svg')}}"></div>   
                                                <div class="value-price">$795</div> 
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pl-0 w-sm-400">
                                            <div class="exp-view">                                              
                                                View More
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-0  hotel-list list-item">
                                <div class="col-xl-5 col-lg-4 col-md-4 col-sm-4 col-12 p-0">
                                    <div class="hotel-img"><img src="{{asset('images/room/room3.svg')}}" class="w-100"></div>
                                </div>
                                <div class="col-xl-7 col-lg-8 col-md-8 col-sm-8 col-12 p-0">
                                    <div class="row m-0 pt-3">
                                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-7 w-sm-400">
                                            <div class="hotel-leftside">
                                                <p class="hotel-title">Holiday Inn London West,an IHG Hotel</p>
                                                <div class="hotel-loc">
                                                    <img src="{{asset('images/location.svg')}}">
                                                    <div><p class="m-0">London</p></div>
                                                </div>
                                                <div class="breakfast">
                                                    <img src="{{asset('images/break.svg')}}">
                                                    <div><p class="m-0">Breakfast Included</p></div>
                                                </div>
                                                <div class="Night-price">$133 a Night</div>
                                            </div>
                                        </div>
                                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5 w-sm-400">
                                            <div class="bor-bottom">
                                                <div>
                                                    <img src="{{asset('images/Star.svg')}}">
                                                    <img src="{{asset('images/Star.svg')}}">
                                                    <img src="{{asset('images/Star.svg')}}">
                                                    <img src="{{asset('images/Star.svg')}}">
                                                </div>
                                                <div class="Rating">Rating</div>
                                            </div>
                                            <div class="bor-bottom">
                                                <div class="Agoda">
                                                    Agoda
                                                </div>
                                                <div class="num-price">$818</div>
                                            </div>
                                            <div class="bor-bottom">
                                                <div class="Agoda">
                                                    Booking.com
                                                </div>
                                                <div class="num-price">$819</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-0 pb-3">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pr-0 w-sm-400">
                                            <div class="exp-price">                                              
                                                <div><img src="{{asset('images/exp-img.svg')}}"></div>   
                                                <div class="value-price">$795</div> 
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pl-0 w-sm-400">
                                            <div class="exp-view">                                              
                                                View More
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            
                            <div id="pagination-container"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-3 col-md-12 col-12">
                    <iframe
                    class="gmap_iframe"
                    frameborder="0"
                    scrolling="no"
                    marginheight="0"
                    marginwidth="0"
                    src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=puducherry&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
                    ></iframe>
                </div>
            </div>
            </div>
        </div>
    </div>
</form>
    @include('layouts/footer')
</div>



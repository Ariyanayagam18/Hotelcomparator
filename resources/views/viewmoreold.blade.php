<div class="viewmore-page">
    @include('layouts/header')
    <div class="home-page">  
        <div class="section-holiday">        
            <div class="section-3">  
                <div class="row m-0">            
                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                        <div>
                            <ul class="home-list">
                                
                                <li><a href="#">Home</li></a>
                                <li><a href="#">{{ $_GET['propertyType_name'] }} </li></a>
                                <li><a href="#">@if(!empty($search[0]->province)) {{ $search[0]->province }} @endif</li></a>
                                <li><a href="#">@if(!empty($search[0]->country)) {{ $search[0]->country }} @endif</li></a>
                                <li><a href="#">{{ $_GET['property_Name'] }} </li></a>
                            </ul>
                            <p class="hotel-name">{{ $_GET['property_Name'] }} </p>
                            <div class="address-sec">
                                <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                                    <img src="{{asset('images/location.svg')}}" style="width: 12px;margin-right: 0.5rem;">
                                    <!-- <span class="address-way">4 Portal Way, Gypsy Corner/ A40, London, W3 6RT, United Kingdom</span> -->
                                    <span class="address-way">
                                        @if(!empty($search[0]->address1)) {{ $search[0]->address1 }} @endif,
                                        @if(!empty($search[0]->address2))
                                        {{ $search[0]->address2 }},
                                        @endif
                                        @if(!empty($search[0]->city)) {{ $search[0]->city }} @endif-
                                        @if(!empty($search[0]->postalCode)) {{ $search[0]->postalCode }} @endif,
                                        @if(!empty($search[0]->province)) {{ $search[0]->province }} @endif,
                                        @if(!empty($search[0]->country)) {{ $search[0]->country }} @endif
                                   </span>
                                </div>                                
                                <div class="mt-3 mt-sm-0"><img src="{{asset('images/share.svg')}}" style="width: 36px;height: 36px;margin-left: 1rem;"></div>
                            </div>
                        </div>
                    </div> 
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                        <div class="rating-right">
                            <p class="price-value" id="price-value">$ {{ $_GET['price'] }} </p>
                            <input type="hidden" id="hotel_price" value="<?php echo $_GET['price'];?>">
                            <div class="rating-star">
                                <div>
                                    Rating {{ $_GET['rating']}}
                                    <span>
                                        <img src="{{asset('images/Star.svg')}}">
                                        <img src="{{asset('images/Star.svg')}}">
                                        <img src="{{asset('images/Star.svg')}}">
                                        <img src="{{asset('images/Star.svg')}}">
                                    </span>
                                </div>
                            </div>
                            <div class="favorite-sec">
                                <div><img src="{{asset('images/heart.svg')}}"></div>
                                <div>Favortie</div>
                            </div>
                        </div>
                    </div>            
                </div>
            </div>  
            <div class="owl-carousel owl-theme" id="view-carousel">
                <div class="item">
                    <div class="view-inner">
                        <div><img src="{{asset('images/view-img.svg')}}" class="single-img"></div>
                    </div>
                </div> 
                <div class="item">
                    <div class="view-inner">
                        <div class="row m-0 carousel-view-img">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-6 mb-4">
                                <img src="{{asset('images/view-img1.svg')}}">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-6 mb-4">
                                <img src="{{asset('images/view-img.svg')}}">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                <img src="{{asset('images/view-img.svg')}}">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                <img src="{{asset('images/view-img1.svg')}}">
                            </div>
                        </div>
                    </div>
                </div>  
                <div class="item">
                    <div class="view-inner">
                        <div><img src="{{asset('images/view-img.svg')}}" class="single-img"></div>
                    </div>
                </div> 
                <div class="item">
                    <div class="view-inner">
                        <div><img src="{{asset('images/view-img.svg')}}" class="single-img"></div>
                    </div>
                </div> 
                <div class="item">
                    <div class="view-inner">
                        <div><img src="{{asset('images/view-img.svg')}}" class="single-img"></div>
                    </div>
                </div> 
                <div class="item">
                    <div class="view-inner">
                        <div><img src="{{asset('images/view-img.svg')}}" class="single-img"></div>
                    </div>
                </div> 
                <div class="item">
                    <div class="view-inner">
                        <div><img src="{{asset('images/view-img.svg')}}" class="single-img"></div>
                    </div>
                </div>                                                   
            </div>
            <div class="section-4">
                <div class="row m-0">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div>
                            <div class="d-flex mb-4">                                
                                <div class="mr-4"><img src="{{asset('images/computer.svg')}}"></div>
                                <div>
                                    <p class="title-list">Description</p>
                                    <div class="descrption-list">
                                   
                                        @if(!empty($search[0]->areaDescription)) {{ $search[0]->areaDescription }} @endif
                                        <br></br>
                                        @if(!empty($search[0]->propertyDescription)) {{ $search[0]->propertyDescription }} @endif
                                    </div>
                                </div>

                            </div>
                            <div class="d-flex mb-4">                                
                                <div class="mr-4"><img src="{{asset('images/clock.svg')}}"></div>
                                <div>
                                    <p class="title-list">Check in and check out</p>
                                    <div class="d-block d-md-flex">
                                        <div class="mr-5">
                                            <p class="mb-2 descrption-list">Check in from:</p>
                                            <p>14:00</p>
                                        </div>
                                        <div>
                                            <p class="mb-2 descrption-list">Check out before:</p>
                                            <p>12:00</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="d-flex mb-4">                                
                                <div class="mr-4"><img src="{{asset('images/bluid.svg')}}"></div>
                                <div>
                                    <p class="title-list">Most Popular Facilities</p>
                                    <div class="d-block d-md-flex popular-sec mt-4">
                                        <ul>
                                            <li><img src="{{asset('images/popular/popular-img1.svg')}}">Free WIFI</li>
                                            <li><img src="{{asset('images/popular/popular-img2.svg')}}">Conditioned Air</li>
                                            <li><img src="{{asset('images/popular/popular-img3.svg')}}">Restaurant</li>
                                            <li><img src="{{asset('images/popular/popular-img4.svg')}}">Disabled Access</li>
                                        </ul>
                                        <ul>
                                            <li><img src="{{asset('images/popular/popular-img5.svg')}}">Parking</li>
                                            <li><img src="{{asset('images/popular/popular-img6.svg')}}">Pet Friendly</li>
                                            <li><img src="{{asset('images/popular/popular-img7.svg')}}">Gym Centre</li>
                                            <li><img src="{{asset('images/popular/popular-img8.svg')}}">Sap & Wellness Centre</li>
                                        </ul>                                        
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex mb-4">                                
                                <div class="mr-4"><img src="{{asset('images/bell.svg')}}"></div>
                                <div>
                                    <p class="title-list">Others Facilities</p>
                                    <div class="d-block d-md-flex Facilities-sec mt-4">
                                        <ul>
                                            <li><img src="{{asset('images/Facilities.svg')}}">Meeting Rooms</li>                                           
                                            <li><img src="{{asset('images/Facilities.svg')}}">Lift</li>
                                            <li><img src="{{asset('images/Facilities.svg')}}">concierge Service</li>
                                            <li><img src="{{asset('images/Facilities.svg')}}">Non-smoking floor</li>
                                            <li><img src="{{asset('images/Facilities.svg')}}">Tor desk</li>
                                            <li><img src="{{asset('images/Facilities.svg')}}">Game room</li>
                                            <li><img src="{{asset('images/Facilities.svg')}}">Multilingual staff</li>
                                            <li><img src="{{asset('images/Facilities.svg')}}">Beverage Vending Machine</li>
                                            <li><img src="{{asset('images/Facilities.svg')}}">Completely non-smoking property</li>
                                        </ul>
                                        <ul>
                                            <li><img src="{{asset('images/Facilities.svg')}}">Heating</li>
                                            <li><img src="{{asset('images/Facilities.svg')}}">Car Rental</li>
                                            <li><img src="{{asset('images/Facilities.svg')}}">Safe deposit box</li>
                                            <li><img src="{{asset('images/Facilities.svg')}}">Availability of Family Rooms</li>
                                            <li><img src="{{asset('images/Facilities.svg')}}">Non -Smoking Rooms</li>
                                            <li><img src="{{asset('images/Facilities.svg')}}">Room Service</li>
                                            <li><img src="{{asset('images/Facilities.svg')}}">Cash Machine</li>
                                            <li><img src="{{asset('images/Facilities.svg')}}">Express check-in</li>
                                            <li><img src="{{asset('images/Facilities.svg')}}">Front desk 24 hour</li>
                                        </ul>                                        
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex mb-4">                                
                                <div class="mr-4"><img src="{{asset('images/bluid.svg')}}"></div>
                                <div>
                                    <p class="title-list">Compare Rooms and Prices</p>
                                    <div class="price-compare">We compare 100s of sites to get you the best deal</div>
                                    <div class="d-flex price-compare-img">
                                        <img src="{{asset('images/price/Prices-img1.svg')}}">
                                        <img src="{{asset('images/price/Prices-img2.svg')}}">
                                        <img src="{{asset('images/price/Prices-img3.svg')}}">
                                        <img src="{{asset('images/price/Prices-img4.svg')}}">
                                        <img src="{{asset('images/price/Prices-img5.svg')}}">
                                        <img src="{{asset('images/price/Prices-img6.svg')}}">
                                        <img src="{{asset('images/price/Prices-img7.svg')}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div>
                            <div class="mb-4">
                                <iframe
                                class="gmap_iframe"
                                frameborder="0"
                                scrolling="no"
                                marginheight="0"
                                marginwidth="0"
                                style="height: 470px;"
                                src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=puducherry&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
                                ></iframe>
                            </div>
                            <div class="mb-4">
                                <p class="title-list">Very Good Locations</p>
                                <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                                    <img src="{{asset('images/location.svg')}}" style="width: 12px;margin-right: 0.5rem;">
                                    <span class="address-way">4 Portal Way, Gypsy Corner/ A40, London, W3 6RT, United Kingdom</span>
                                </div> 
                            </div>
                            <div class="mb-4">
                                <div class="d-block d-md-flex align-items-center">
                                    <p class="title-list m-0">Hotel Rating</p>
                                    <div class="rat-star">
                                        <p class="m-0 mr-2">4.5</p>
                                        <div class="star-rating">
                                            <img src="{{asset('images/Star.svg')}}">
                                            <img src="{{asset('images/Star.svg')}}">
                                            <img src="{{asset('images/Star.svg')}}">
                                            <img src="{{asset('images/Star.svg')}}">
                                            <img src="{{asset('images/Star.svg')}}">
                                        </div>
                                    </div>
                                </div>                               
                                <div class="address-way">1,271 reviews</div>   
                                <div class="mt-4">  
                                    <div class="progress">
                                        <div class="progress-bar blue" style="width:80%"></div>                                    
                                    </div>     
                                    <div class="progress-value">
                                        <div>Cleaniliness</div>
                                        <div>4.5</div>
                                    </div> 
                                </div>   
                                <div class="mt-4">  
                                    <div class="progress">
                                        <div class="progress-bar red" style="width:50%"></div>                                    
                                    </div>     
                                    <div class="progress-value">
                                        <div>Location</div>
                                        <div>4.0</div>
                                    </div> 
                                </div> 
                                <div class="mt-4">  
                                    <div class="progress">
                                        <div class="progress-bar green" style="width:80%"></div>                                    
                                    </div>     
                                    <div class="progress-value">
                                        <div>Service</div>
                                        <div>4.0</div>
                                    </div> 
                                </div> 
                                <div class="mt-4">  
                                    <div class="progress">
                                        <div class="progress-bar yellow" style="width:80%"></div>                                    
                                    </div>     
                                    <div class="progress-value">
                                        <div>Rooms</div>
                                        <div>4.0</div>
                                    </div> 
                                </div>                    
                            </div>
                            <div class="mb-4">
                                <div class="trip">
                                    <img src="{{asset('images/trip.svg')}}">
                                    <div>369 reviews</div>
                                </div>
                            </div>
                            <div class="d-flex mb-4">                                
                                <div class="mr-4"><img src="{{asset('images/empty-person.svg')}}"></div>
                                <div>
                                    <div class="mb-4">
                                        <p class="m-0">Anonymous traveller</p>
                                        <div class="d-block d-md-flex">
                                            <div>
                                                <img src="{{asset('images/Star.svg')}}">
                                                <img src="{{asset('images/Star.svg')}}">
                                                <img src="{{asset('images/Star.svg')}}">
                                                <img src="{{asset('images/Star.svg')}}">
                                                <img src="{{asset('images/Star.svg')}}">
                                            </div>
                                            <div class="year-text">
                                                2 Oct  2022
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="hotel-great">Great Hotel - Great staff - Feeling like at home</p>
                                        <p class="room-descrption">
                                            Hotel - Room - Lobby - Dinning room maintained in the best way.Staff - Polites. do the best to help, 
                                            provideng the best that they can do.Location - Very good.From the few hotels that do not suffer from 
                                            Post Corona and providing the best. Congartulation to all the staff.
                                        </p>
                                        <p class="red-like"><img src="{{asset('images/red-heart.svg')}}"><span>Like</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex mb-4">                                
                                <div class="mr-4"><img src="{{asset('images/empty-person.svg')}}"></div>
                                <div>
                                    <div class="mb-4">
                                        <p class="m-0">Anonymous traveller</p>
                                        <div class="d-block d-md-flex">
                                            <div>
                                                <img src="{{asset('images/Star.svg')}}">
                                                <img src="{{asset('images/Star.svg')}}">
                                                <img src="{{asset('images/Star.svg')}}">
                                                <img src="{{asset('images/Star.svg')}}">
                                                <img src="{{asset('images/Star.svg')}}">
                                            </div>
                                            <div class="year-text">
                                                2 Oct  2022
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="hotel-great">Excellent choice when in London</p>
                                        <p class="room-descrption">
                                        I have had the most wonderful stay at this IHG hotel, conveniently located just a short walk from the North Acton tube station. <a href="#">Read More</a> 
                                        </p>
                                        <p class="red-like"><img src="{{asset('images/red-heart.svg')}}"><span>Like</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex mb-4">                                
                                <div class="mr-4"><img src="{{asset('images/empty-person.svg')}}"></div>
                                <div>
                                    <div class="mb-4">
                                        <p class="m-0">Anonymous traveller</p>
                                        <div class="d-block d-md-flex">
                                            <div>
                                                <img src="{{asset('images/Star.svg')}}">
                                                <img src="{{asset('images/Star.svg')}}">
                                                <img src="{{asset('images/Star.svg')}}">
                                                <img src="{{asset('images/Star.svg')}}">
                                                <img src="{{asset('images/Star.svg')}}">
                                            </div>
                                            <div class="year-text">
                                                2 Oct  2022
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="hotel-great">Excellent choice when in London</p>
                                        <p class="room-descrption">
                                        I have had the most wonderful stay at this IHG hotel, conveniently located just a short walk from the North Acton tube station. <a href="#">Read More</a> 
                                        </p>
                                        <p class="red-like"><img src="{{asset('images/red-heart.svg')}}"><span>Like</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex mb-4">                                
                                <div class="mr-4"><img src="{{asset('images/empty-person.svg')}}"></div>
                                <div>
                                    <div class="mb-4">
                                        <p class="m-0">Anonymous traveller</p>
                                        <div class="d-block d-md-flex">
                                            <div>
                                                <img src="{{asset('images/Star.svg')}}">
                                                <img src="{{asset('images/Star.svg')}}">
                                                <img src="{{asset('images/Star.svg')}}">
                                                <img src="{{asset('images/Star.svg')}}">
                                                <img src="{{asset('images/Star.svg')}}">
                                            </div>
                                            <div class="year-text">
                                                2 Oct  2022
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="hotel-great">Excellent choice when in London</p>
                                        <p class="room-descrption">
                                        I have had the most wonderful stay at this IHG hotel, conveniently located just a short walk from the North Acton tube station. <a href="#">Read More</a> 
                                        </p>
                                        <p class="red-like"><img src="{{asset('images/red-heart.svg')}}"><span>Like</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex mb-4">                                
                                <div class="mr-4"><img src="{{asset('images/empty-person.svg')}}"></div>
                                <div>
                                    <div class="mb-4">
                                        <p class="m-0">Anonymous traveller</p>
                                        <div class="d-block d-md-flex">
                                            <div>
                                                <img src="{{asset('images/Star.svg')}}">
                                                <img src="{{asset('images/Star.svg')}}">
                                                <img src="{{asset('images/Star.svg')}}">
                                                <img src="{{asset('images/Star.svg')}}">
                                                <img src="{{asset('images/Star.svg')}}">
                                            </div>
                                            <div class="year-text">
                                                2 Oct  2022
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="hotel-great">Excellent choice when in London</p>
                                        <p class="room-descrption">
                                        I have had the most wonderful stay at this IHG hotel, conveniently located just a short walk from the North Acton tube station. <a href="#">Read More</a> 
                                        </p>
                                        <p class="red-like"><img src="{{asset('images/red-heart.svg')}}"><span>Like</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="Show-more-Results">
                                <button>Show more Results</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>             
        <div class="section-inout">
            <div class="section-1">        
                <div class="row m-0 justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 form-group">
                        <label>Where do you want to stay</label>
                        <input type="text" placeholder="Enter Destination or Hotel Name" class="search-stay">
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-6 col-sm-6 col-12 form-group">
                        <label>Check- In & check Out</label>
                        <input type="text" class="calender-sec">
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-6 col-sm-6 col-12 form-group">
                        <label>Guests and Rooms</label>
                        <select class="form-control">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-6 col-sm-6 col-12 form-group">
                        <label>Popular Filters</label>
                        <select class="form-control">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                    </div>
                    <div class="col-xl-2 col-lg-12 col-md-12 col-sm-12 col-12 form-group text-center text-xl-left Search-Hotels">
                        <label></label>
                        <button type="button" class="btn btn-primary">Search Hotels</button>
                    </div>
                </div>                 
            </div>            
        </div>
    </div>
    @include('layouts/footer')
</div>
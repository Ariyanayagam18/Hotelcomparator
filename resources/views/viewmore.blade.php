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
                                <li><a href="#">@if(!empty($search->propertyType_name)) {{ $search->propertyType_name }} @endif </li></a>
                                <li><a href="#">@if(!empty($search->province)) {{ $search->province }} @endif</li></a>
                                <li><a href="#">@if(!empty($search->country)) {{ $search->country }} @endif</li></a>
                                <li><a href="#">@if(!empty($search->propertyName)) {{ $search->propertyName }} @endif  </li></a>
                            </ul>
                            <p class="hotel-name"> @if(!empty($search->propertyName)) {{ $search->propertyName }} @endif </p>
                            <div class="address-sec">
                                <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                                    <img src="{{asset('images/location.svg')}}" style="width: 12px;margin-right: 0.5rem;">
                                    <span class="address-way">
                                    @if(!empty($search->address1)) {{ $search->address1 }} @endif,
                                        @if(!empty($search->address2))
                                        {{ $search->address2 }},
                                        @endif
                                        @if(!empty($search->city)) {{ $search->city }} @endif-
                                        @if(!empty($search->postalCode)) {{ $search->postalCode }} @endif,
                                        @if(!empty($search->province)) {{ $search->province }} @endif,
                                        @if(!empty($search->country)) {{ $search->country }} @endif
                                    </span>
                                </div>                                
                                <div class="mt-3 mt-sm-0"><img src="{{asset('images/share.svg')}}" style="width: 36px;height: 36px;margin-left: 1rem;"></div>
                            </div>
                        </div>
                    </div> 
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                        <div class="rating-right">
                            <p class="price-value" id="price-value">$ @if(!empty($search->referencePrice_value)) {{ $search->referencePrice_value }} @endif </p>
                            <input type="hidden" id="hotel_price" value="<?php echo $_GET['price'];?>">
                            <input type="hidden" id="propertyId" value="<?php echo $_GET['expediaId'];?>">
                            <div class="rating-star">
                                <div>
                                    Rating @if(!empty($search->rating)) {{ $search->rating }} @endif
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
           
           
            <?php
            if(isset($images) && !empty($images))
            {
            // foreach ($images as $key=>$img)
            // {
            //     echo "img : ".$img->title."<br/>";
            //     echo "link : ".$img->link."<br/>";
            // }
            // }
            // echo "Images count : ".count($images);
            // $splice_images = array_slice($images,2);
            $images_part1 = array_slice($images,0,4);
            //    echo "<pre> Images : ";print_r($images); 
            $images_part2 = array_slice($images,4);
            // echo "images_part1 count: ".count($images_part1)."<br/>";
            // echo "images_part2  count: ".count($images_part2)."<br/>";
            // echo "<pre> images: ";print_r($images);die; 
            // echo "<pre> images_part2 : ";print_r($images_part2);die; 
            }
            ?>
            
            <div class="owl-carousel owl-theme" id="view-carousel">

                <div class="item">
                    <div class="view-inner">
                        <div>

                        @if(!empty($search->hero_link))
                        <img src="<?php echo $search->hero_link;?>" title="<?php echo $search->hero_title;?>" class="single-img">
                       @endif
                        </div>
                    </div>

                </div> 
                
              
                <!-- <div class="item">

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

                </div> -->
                <div class="item">
              
<div class="view-inner">

    <div class="row m-0 carousel-view-img">
          
          <?php 
            if(isset($images_part1) && !empty($images_part1))
            {
                foreach ($images_part1 as $key=>$img)
                { ?>

                <div class="col-xl-6 col-lg-6 col-md-6 col-6 mb-4">
                    <img src="{{ $img->link }}" title="{{ $img->title }}">
                </div>

                <?php 

                    }  
                } 
                ?>

           </div>
               </div>
            </div>
           

            <?php 
            if(isset($images_part2) && !empty($images_part2))
            {
            foreach ($images_part2 as $key=>$img)
            { ?>
            <div class="item">
                <div class="view-inner">
                    <div><img src="{{ $img->link }}" title="{{ $img->title }}" class="single-img"></div>
                </div>
            </div> 
            <?php } 
            }
            ?>
              <!--  <div class="item">
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
                </div>   -->

            </div>

            <div class="section-4">
                <div class="row m-0">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div>
                            <div class="d-flex mb-4">                                
                                <div class="mr-4"><img class="title-image" src="{{asset('images/computer.svg')}}"></div>
                                <div>
                                    <p class="title-list">Description</p>
                                    <div class="descrption-list">
                                   
                                        @if(!empty($search->areaDescription)) {{ $search->areaDescription }} @endif
                                        <br></br>
                                        @if(!empty($search->propertyDescription)) {{ $search->propertyDescription }} @endif
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex mb-4">                                
                                <div class="mr-4"><img class="title-image" src="{{asset('images/clock.svg')}}"></div>
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
                                <div class="mr-4"><img class="title-image" src="{{asset('images/bluid.svg')}}"></div>
                                <div>
                                    <p class="title-list">Most Popular Facilities</p>
                                    <div class="d-block d-md-flex popular-sec mt-4">

                                        <!-- <ul>
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
                                        </ul> -->
                                        <ul>
                                        <?php 
                                            if(isset($search)) { 
                                            $facilities = json_decode($search->popularAmenities);
                                            $other_facilities = json_decode($search->propertyAmenities);
                                            // echo "<pre>";print_r($other_facilities);exit;
                                            foreach($facilities as $popularAmenities) { ?>
                                            <li><img src="{{asset('images/popular/popular-img1.svg')}}"><?php echo $popularAmenities."<br/>";?></li> 
                                         <?php
                                            }
                                        } 
                                         ?>
                                         </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex mb-4">                                
                                <div class="mr-4"><img class="title-image" src="{{asset('images/bell.svg')}}"></div>
                                <div>
                                    <p class="title-list">Others Facilities</p>
                                    <div class="d-block d-md-flex Facilities-sec mt-4">
                                        <!-- <ul>
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
                                        </ul> -->
                                       <?php if(isset($other_facilities->ACCESSIBILITY)) { ?>
                                        <ul>
                                            <?php foreach($other_facilities->ACCESSIBILITY as $other_facilities) { ?>
                                            <li><img src="{{asset('images/Facilities.svg')}}">{{ $other_facilities }} </li>
                                            <?php }  ?>
                                        </ul>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                            <div class="d-flex mb-4">                                
                                <div class="mr-4"><img class="title-image" src="{{asset('images/bluid.svg')}}"></div>
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
                            <div class="compare-room mb-4">
                                <div class="section-1">        
                                    <div class="row m-0 justify-content-between">
                                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 form-group">
                                            <label>Where do you want to stay</label>
                                            <input type="text" placeholder="Enter Destination or Hotel Name" class="search-stay">
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 form-group">
                                            <label>Check- In & check Out</label>
                                            <input type="text" class="calender-sec">
                                        </div>
                                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 form-group">
                                            <label>Guests and Rooms</label>
                                            <select class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                            </select>
                                        </div>                                                                               
                                    </div>     
                                    <div class="Filter-by">
                                        <div>Filter by</div>
                                        <button>Free cancellation</button>
                                        <button>Breakfast Included</button>
                                        <button class="active">Pay on Arrival</button>
                                    </div>    
                                    <div>
                                        <div class="row room-selection">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                                <div class="room-selection-left">
                                                    <p class="stand-double">Double room</p>
                                                    <div><img src="{{asset('images/exp-img.svg')}}"></div> 
                                                    <p class="refundable">Non Refundable - Meals not included</p>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                                <div class="d-block d-md-flex justify-content-md-end room-selection-right">
                                                    <div class="text-center text-md-right">
                                                        <p class="lowest-price">Lowest price</p>
                                                        <p class="compare-value">$795</p>
                                                        <p class="day-night">a Night</p>
                                                        <p class="taxes-fee">Taxes and frees not included</p>
                                                    </div>
                                                    <div class="Go-to-Site">
                                                    <button> <a href="" id="expedia_link" target="_blank">Go to Site</a> </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row room-selection">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                                <div class="room-selection-left">
                                                    <p class="stand-double">Standard Room</p>
                                                    <div><img src="{{asset('images/hotels.svg')}}" style="width:79px;height:24px;"></div> 
                                                    <p class="refundable">Non Refundable</p>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                                <div class="d-block d-md-flex justify-content-md-end room-selection-right">
                                                    <div class="text-center text-md-right">
                                                        <p class="lowest-price">Lowest price</p>
                                                        <p class="compare-value">$963</p>
                                                        <p class="day-night">a Night</p>
                                                        <p class="taxes-fee">Taxes and frees not included</p>
                                                    </div>
                                                    <div class="Go-to-Site">
                                                    <button> <a href="" id="hcom_link" target="_blank">Go to Site</a> </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>        
                                </div>                                 
                            </div>
                            <div class="d-flex mb-4">                                
                                <div class="mr-4"><img class="title-image" src="{{asset('images/bluid.svg')}}"></div>
                                <div>
                                    <p class="title-list">Other Recommended Hotels</p>                                    
                                </div>                                
                            </div>
                            <div class="recommended-hotels mb-4">
                                <!-- Nav pills -->
                                <ul class="nav nav-pills" role="tablist">
                                    <li class="nav-item">
                                    <a class="nav-link similar-section active" data-toggle="pill" href="#Similar">Similar Hotels Nearby</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link Recommended-section" data-toggle="pill" href="#Recommended">Recommended Hotels</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link Popular-section" data-toggle="pill" href="#Popular">Popular hotels</a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div id="Similar" class="container tab-pane p-0 active">
                                        <div>
                                            <div class="owl-carousel owl-theme" id="Hotels">
                                                <div class="item">
                                                    <div class="inner-carousel">
                                                        <div class="main-img">
                                                            <img src="{{asset('images/similar.svg')}}">
                                                            <img class="star-white" src="{{asset('images/star-white.svg')}}">
                                                        </div>
                                                        <div class="star-per">
                                                            <div class="mb-1">                                                               
                                                                <p class="address-text">Radisson Blu EdwardianRadisson Blu Edwardian</p>
                                                                <div class="loc-left d-block">                                                                    
                                                                    <div class="d-flex m-0">
                                                                        <img src="{{asset('images/location.svg')}}">
                                                                        <p class="ml-2 mb-0">350 Oxford Street, City of Westminster,</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                                                   <div class="rating-review">
                                                                    <button>4.0</button>   
                                                                    <div class="reviews-hotal">
                                                                        <img src="{{asset('images/eye-green.svg')}}">
                                                                        <p>2611 reviews</p>
                                                                    </div>                                                                
                                                                   </div>
                                                                </div>
                                                                <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                                                    <p class="recommended-hotels-price">$863</p>
                                                                    <p class="recommended-hotels-night">a Night</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="item">
                                                    <div class="inner-carousel">
                                                        <div class="main-img">
                                                            <img src="{{asset('images/similar.svg')}}">
                                                            <img class="star-white" src="{{asset('images/star-white.svg')}}">
                                                        </div>
                                                        <div class="star-per">
                                                            <div class="mb-1">                                                               
                                                                <p class="address-text">Radisson Blu EdwardianRadisson Blu Edwardian</p>
                                                                <div class="loc-left d-block">                                                                    
                                                                    <div class="d-flex m-0">
                                                                        <img src="{{asset('images/location.svg')}}">
                                                                        <p class="ml-2 mb-0">350 Oxford Street, City of Westminster,</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                                                   <div class="rating-review">
                                                                    <button>4.0</button>   
                                                                    <div class="reviews-hotal">
                                                                        <img src="{{asset('images/eye-green.svg')}}">
                                                                        <p>2611 reviews</p>
                                                                    </div>                                                                
                                                                   </div>
                                                                </div>
                                                                <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                                                    <p class="recommended-hotels-price">$863</p>
                                                                    <p class="recommended-hotels-night">a Night</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="inner-carousel">
                                                        <div class="main-img">
                                                            <img src="{{asset('images/similar.svg')}}">
                                                            <img class="star-white" src="{{asset('images/star-white.svg')}}">
                                                        </div>
                                                        <div class="star-per">
                                                            <div class="mb-1">                                                               
                                                                <p class="address-text">Radisson Blu EdwardianRadisson Blu Edwardian</p>
                                                                <div class="loc-left d-block">                                                                    
                                                                    <div class="d-flex m-0">
                                                                        <img src="{{asset('images/location.svg')}}">
                                                                        <p class="ml-2 mb-0">350 Oxford Street, City of Westminster,</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                                                   <div class="rating-review">
                                                                    <button>4.0</button>   
                                                                    <div class="reviews-hotal">
                                                                        <img src="{{asset('images/eye-green.svg')}}">
                                                                        <p>2611 reviews</p>
                                                                    </div>                                                                
                                                                   </div>
                                                                </div>
                                                                <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                                                    <p class="recommended-hotels-price">$863</p>
                                                                    <p class="recommended-hotels-night">a Night</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="inner-carousel">
                                                        <div class="main-img">
                                                            <img src="{{asset('images/similar.svg')}}">
                                                            <img class="star-white" src="{{asset('images/star-white.svg')}}">
                                                        </div>
                                                        <div class="star-per">
                                                            <div class="mb-1">                                                               
                                                                <p class="address-text">Radisson Blu EdwardianRadisson Blu Edwardian</p>
                                                                <div class="loc-left d-block">                                                                    
                                                                    <div class="d-flex m-0">
                                                                        <img src="{{asset('images/location.svg')}}">
                                                                        <p class="ml-2 mb-0">350 Oxford Street, City of Westminster,</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                                                   <div class="rating-review">
                                                                    <button>4.0</button>   
                                                                    <div class="reviews-hotal">
                                                                        <img src="{{asset('images/eye-green.svg')}}">
                                                                        <p>2611 reviews</p>
                                                                    </div>                                                                
                                                                   </div>
                                                                </div>
                                                                <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                                                    <p class="recommended-hotels-price">$863</p>
                                                                    <p class="recommended-hotels-night">a Night</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="inner-carousel">
                                                        <div class="main-img">
                                                            <img src="{{asset('images/similar.svg')}}">
                                                            <img class="star-white" src="{{asset('images/star-white.svg')}}">
                                                        </div>
                                                        <div class="star-per">
                                                            <div class="mb-1">                                                               
                                                                <p class="address-text">Radisson Blu EdwardianRadisson Blu Edwardian</p>
                                                                <div class="loc-left d-block">                                                                    
                                                                    <div class="d-flex m-0">
                                                                        <img src="{{asset('images/location.svg')}}">
                                                                        <p class="ml-2 mb-0">350 Oxford Street, City of Westminster,</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                                                   <div class="rating-review">
                                                                    <button>4.0</button>   
                                                                    <div class="reviews-hotal">
                                                                        <img src="{{asset('images/eye-green.svg')}}">
                                                                        <p>2611 reviews</p>
                                                                    </div>                                                                
                                                                   </div>
                                                                </div>
                                                                <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                                                    <p class="recommended-hotels-price">$863</p>
                                                                    <p class="recommended-hotels-night">a Night</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                                              
                                            </div>
                                        </div>
                                    </div>
                                    <div id="Recommended" class="container tab-pane fade">
                                        <div>
                                            <div class="owl-carousel owl-theme" id="Hotels1">
                                                <div class="item">
                                                    <div class="inner-carousel">
                                                        <div class="main-img">
                                                            <img src="{{asset('images/similar.svg')}}">
                                                            <img class="star-white" src="{{asset('images/star-white.svg')}}">
                                                        </div>
                                                        <div class="star-per">
                                                            <div class="mb-1">                                                               
                                                                <p class="address-text">Radisson Blu EdwardianRadisson Blu Edwardian</p>
                                                                <div class="loc-left d-block">                                                                    
                                                                    <div class="d-flex m-0">
                                                                        <img src="{{asset('images/location.svg')}}">
                                                                        <p class="ml-2 mb-0">350 Oxford Street, City of Westminster,</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                                                   <div class="rating-review">
                                                                    <button>4.0</button>   
                                                                    <div class="reviews-hotal">
                                                                        <img src="{{asset('images/eye-green.svg')}}">
                                                                        <p>2611 reviews</p>
                                                                    </div>                                                                
                                                                   </div>
                                                                </div>
                                                                <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                                                    <p class="recommended-hotels-price">$863</p>
                                                                    <p class="recommended-hotels-night">a Night</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="item">
                                                    <div class="inner-carousel">
                                                        <div class="main-img">
                                                            <img src="{{asset('images/similar.svg')}}">
                                                            <img class="star-white" src="{{asset('images/star-white.svg')}}">
                                                        </div>
                                                        <div class="star-per">
                                                            <div class="mb-1">                                                               
                                                                <p class="address-text">Radisson Blu EdwardianRadisson Blu Edwardian</p>
                                                                <div class="loc-left d-block">                                                                    
                                                                    <div class="d-flex m-0">
                                                                        <img src="{{asset('images/location.svg')}}">
                                                                        <p class="ml-2 mb-0">350 Oxford Street, City of Westminster,</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                                                   <div class="rating-review">
                                                                    <button>4.0</button>   
                                                                    <div class="reviews-hotal">
                                                                        <img src="{{asset('images/eye-green.svg')}}">
                                                                        <p>2611 reviews</p>
                                                                    </div>                                                                
                                                                   </div>
                                                                </div>
                                                                <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                                                    <p class="recommended-hotels-price">$863</p>
                                                                    <p class="recommended-hotels-night">a Night</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="inner-carousel">
                                                        <div class="main-img">
                                                            <img src="{{asset('images/similar.svg')}}">
                                                            <img class="star-white" src="{{asset('images/star-white.svg')}}">
                                                        </div>
                                                        <div class="star-per">
                                                            <div class="mb-1">                                                               
                                                                <p class="address-text">Radisson Blu EdwardianRadisson Blu Edwardian</p>
                                                                <div class="loc-left d-block">                                                                    
                                                                    <div class="d-flex m-0">
                                                                        <img src="{{asset('images/location.svg')}}">
                                                                        <p class="ml-2 mb-0">350 Oxford Street, City of Westminster,</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                                                   <div class="rating-review">
                                                                    <button>4.0</button>   
                                                                    <div class="reviews-hotal">
                                                                        <img src="{{asset('images/eye-green.svg')}}">
                                                                        <p>2611 reviews</p>
                                                                    </div>                                                                
                                                                   </div>
                                                                </div>
                                                                <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                                                    <p class="recommended-hotels-price">$863</p>
                                                                    <p class="recommended-hotels-night">a Night</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="inner-carousel">
                                                        <div class="main-img">
                                                            <img src="{{asset('images/similar.svg')}}">
                                                            <img class="star-white" src="{{asset('images/star-white.svg')}}">
                                                        </div>
                                                        <div class="star-per">
                                                            <div class="mb-1">                                                               
                                                                <p class="address-text">Radisson Blu EdwardianRadisson Blu Edwardian</p>
                                                                <div class="loc-left d-block">                                                                    
                                                                    <div class="d-flex m-0">
                                                                        <img src="{{asset('images/location.svg')}}">
                                                                        <p class="ml-2 mb-0">350 Oxford Street, City of Westminster,</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                                                   <div class="rating-review">
                                                                    <button>4.0</button>   
                                                                    <div class="reviews-hotal">
                                                                        <img src="{{asset('images/eye-green.svg')}}">
                                                                        <p>2611 reviews</p>
                                                                    </div>                                                                
                                                                   </div>
                                                                </div>
                                                                <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                                                    <p class="recommended-hotels-price">$863</p>
                                                                    <p class="recommended-hotels-night">a Night</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="inner-carousel">
                                                        <div class="main-img">
                                                            <img src="{{asset('images/similar.svg')}}">
                                                            <img class="star-white" src="{{asset('images/star-white.svg')}}">
                                                        </div>
                                                        <div class="star-per">
                                                            <div class="mb-1">                                                               
                                                                <p class="address-text">Radisson Blu EdwardianRadisson Blu Edwardian</p>
                                                                <div class="loc-left d-block">                                                                    
                                                                    <div class="d-flex m-0">
                                                                        <img src="{{asset('images/location.svg')}}">
                                                                        <p class="ml-2 mb-0">350 Oxford Street, City of Westminster,</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                                                   <div class="rating-review">
                                                                    <button>4.0</button>   
                                                                    <div class="reviews-hotal">
                                                                        <img src="{{asset('images/eye-green.svg')}}">
                                                                        <p>2611 reviews</p>
                                                                    </div>                                                                
                                                                   </div>
                                                                </div>
                                                                <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                                                    <p class="recommended-hotels-price">$863</p>
                                                                    <p class="recommended-hotels-night">a Night</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                                              
                                            </div>
                                        </div>
                                    </div>
                                    <div id="Popular" class="container tab-pane fade">
                                        <div>
                                            <div class="owl-carousel owl-theme" id="Hotels2">
                                                <div class="item">
                                                    <div class="inner-carousel">
                                                        <div class="main-img">
                                                            <img src="{{asset('images/similar.svg')}}">
                                                            <img class="star-white" src="{{asset('images/star-white.svg')}}">
                                                        </div>
                                                        <div class="star-per">
                                                            <div class="mb-1">                                                               
                                                                <p class="address-text">Radisson Blu EdwardianRadisson Blu Edwardian</p>
                                                                <div class="loc-left d-block">                                                                    
                                                                    <div class="d-flex m-0">
                                                                        <img src="{{asset('images/location.svg')}}">
                                                                        <p class="ml-2 mb-0">350 Oxford Street, City of Westminster,</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                                                   <div class="rating-review">
                                                                    <button>4.0</button>   
                                                                    <div class="reviews-hotal">
                                                                        <img src="{{asset('images/eye-green.svg')}}">
                                                                        <p>2611 reviews</p>
                                                                    </div>                                                                
                                                                   </div>
                                                                </div>
                                                                <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                                                    <p class="recommended-hotels-price">$863</p>
                                                                    <p class="recommended-hotels-night">a Night</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="item">
                                                    <div class="inner-carousel">
                                                        <div class="main-img">
                                                            <img src="{{asset('images/similar.svg')}}">
                                                            <img class="star-white" src="{{asset('images/star-white.svg')}}">
                                                        </div>
                                                        <div class="star-per">
                                                            <div class="mb-1">                                                               
                                                                <p class="address-text">Radisson Blu EdwardianRadisson Blu Edwardian</p>
                                                                <div class="loc-left d-block">                                                                    
                                                                    <div class="d-flex m-0">
                                                                        <img src="{{asset('images/location.svg')}}">
                                                                        <p class="ml-2 mb-0">350 Oxford Street, City of Westminster,</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                                                   <div class="rating-review">
                                                                    <button>4.0</button>   
                                                                    <div class="reviews-hotal">
                                                                        <img src="{{asset('images/eye-green.svg')}}">
                                                                        <p>2611 reviews</p>
                                                                    </div>                                                                
                                                                   </div>
                                                                </div>
                                                                <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                                                    <p class="recommended-hotels-price">$863</p>
                                                                    <p class="recommended-hotels-night">a Night</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="inner-carousel">
                                                        <div class="main-img">
                                                            <img src="{{asset('images/similar.svg')}}">
                                                            <img class="star-white" src="{{asset('images/star-white.svg')}}">
                                                        </div>
                                                        <div class="star-per">
                                                            <div class="mb-1">                                                               
                                                                <p class="address-text">Radisson Blu EdwardianRadisson Blu Edwardian</p>
                                                                <div class="loc-left d-block">                                                                    
                                                                    <div class="d-flex m-0">
                                                                        <img src="{{asset('images/location.svg')}}">
                                                                        <p class="ml-2 mb-0">350 Oxford Street, City of Westminster,</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                                                   <div class="rating-review">
                                                                    <button>4.0</button>   
                                                                    <div class="reviews-hotal">
                                                                        <img src="{{asset('images/eye-green.svg')}}">
                                                                        <p>2611 reviews</p>
                                                                    </div>                                                                
                                                                   </div>
                                                                </div>
                                                                <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                                                    <p class="recommended-hotels-price">$863</p>
                                                                    <p class="recommended-hotels-night">a Night</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="inner-carousel">
                                                        <div class="main-img">
                                                            <img src="{{asset('images/similar.svg')}}">
                                                            <img class="star-white" src="{{asset('images/star-white.svg')}}">
                                                        </div>
                                                        <div class="star-per">
                                                            <div class="mb-1">                                                               
                                                                <p class="address-text">Radisson Blu EdwardianRadisson Blu Edwardian</p>
                                                                <div class="loc-left d-block">                                                                    
                                                                    <div class="d-flex m-0">
                                                                        <img src="{{asset('images/location.svg')}}">
                                                                        <p class="ml-2 mb-0">350 Oxford Street, City of Westminster,</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                                                   <div class="rating-review">
                                                                    <button>4.0</button>   
                                                                    <div class="reviews-hotal">
                                                                        <img src="{{asset('images/eye-green.svg')}}">
                                                                        <p>2611 reviews</p>
                                                                    </div>                                                                
                                                                   </div>
                                                                </div>
                                                                <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                                                    <p class="recommended-hotels-price">$863</p>
                                                                    <p class="recommended-hotels-night">a Night</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="inner-carousel">
                                                        <div class="main-img">
                                                            <img src="{{asset('images/similar.svg')}}">
                                                            <img class="star-white" src="{{asset('images/star-white.svg')}}">
                                                        </div>
                                                        <div class="star-per">
                                                            <div class="mb-1">                                                               
                                                                <p class="address-text">Radisson Blu EdwardianRadisson Blu Edwardian</p>
                                                                <div class="loc-left d-block">                                                                    
                                                                    <div class="d-flex m-0">
                                                                        <img src="{{asset('images/location.svg')}}">
                                                                        <p class="ml-2 mb-0">350 Oxford Street, City of Westminster,</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                                                   <div class="rating-review">
                                                                    <button>4.0</button>   
                                                                    <div class="reviews-hotal">
                                                                        <img src="{{asset('images/eye-green.svg')}}">
                                                                        <p>2611 reviews</p>
                                                                    </div>                                                                
                                                                   </div>
                                                                </div>
                                                                <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                                                    <p class="recommended-hotels-price">$863</p>
                                                                    <p class="recommended-hotels-night">a Night</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>                                    
                            </div>
                            <div class="d-flex mb-4">                                
                                <div class="mr-4"><img class="title-image" src="{{asset('images/direction.svg')}}"></div>
                                <div>
                                    <p class="title-list">Explore Other Options</p>                                    
                                </div>                                
                            </div>
                            <div class="explore-section">
                                <div class="owl-carousel owl-theme" id="Explore">
                                    <div class="item">
                                        <div class="explore-land">
                                            <img src="{{asset('images/explor-img1.svg')}}">
                                            <div>
                                                <span>Landmark</span>
                                                <p class="place-eye">The London Eye</p>
                                                <p class="place-price">Prices from € 20</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="explore-land">
                                            <img src="{{asset('images/explor-img1.svg')}}">
                                            <div>
                                                <span>Landmark</span>
                                                <p class="place-eye">King's Cross Station</p>
                                                <p class="place-price">Prices from € 20</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="explore-land">
                                            <img src="{{asset('images/explor-img1.svg')}}">
                                            <div>
                                                <span>Entertainment</span>
                                                <p class="place-eye">Battersea Park Child</p>
                                                <p class="place-price">Prices from € 20</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="explore-land">
                                            <img src="{{asset('images/explor-img4.svg')}}">
                                            <div>
                                                <span>Landmark</span>
                                                <p class="place-eye">Spa at The Landmark</p>
                                                <p class="place-price">Prices from € 20</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item"><h4>5</h4></div>
                                    <div class="item"><h4>6</h4></div>
                                    <div class="item"><h4>7</h4></div>
                                    <div class="item"><h4>8</h4></div>
                                    <div class="item"><h4>9</h4></div>
                                    <div class="item"><h4>10</h4></div>
                                    <div class="item"><h4>11</h4></div>
                                    <div class="item"><h4>12</h4></div>
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
                                   
                                    <span class="address-way">
                                        @if(!empty($search->address1)) {{ $search->address1 }} @endif,
                                        @if(!empty($search->address2))
                                        {{ $search->address2 }},
                                        @endif
                                        @if(!empty($search->city)) {{ $search->city }} @endif
                                        @if(!empty($search->postalCode)) - {{ $search->postalCode }} @endif,
                                        @if(!empty($search->province)) {{ $search->province }} @endif,
                                        @if(!empty($search->country)) {{ $search->country }} @endif
                                    </span>

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

                            <?php
                                if(isset($search->guestReviews)) {
                                $reviews = json_decode($search->guestReviews);
                                // dd($reviews);
                                $review_count = 0;
                                foreach($reviews as $key=>$guest_reviews)
                                {   
                                    // echo "<pre>";var_dump($guest_reviews->reviewerName);die;
                                    // if(isset($guest_reviews->reviewerName))
                                    // {
                                    //     echo "reviewer name : ".$guest_reviews->reviewerName."<br/>";
                                    // }
                                    ?>
                                <div class="d-flex mb-4">                                
                                <div class="mr-4"><img src="{{asset('images/empty-person.svg')}}"></div>
                                <div>
                                    <div class="mb-4">
                                        <p class="m-0"><?php  echo isset($guest_reviews->reviewerName) ? $guest_reviews->reviewerName."<br/>" : 'Anonymous traveller <br/>'; ?></p>
                                        <div class="d-block d-md-flex">
                                            <div>
                                                <img src="{{asset('images/Star.svg')}}">
                                                <img src="{{asset('images/Star.svg')}}">
                                                <img src="{{asset('images/Star.svg')}}">
                                                <img src="{{asset('images/Star.svg')}}">
                                                <img src="{{asset('images/Star.svg')}}">
                                            </div>
                                            <div class="year-text">
                                            <?php  echo isset($guest_reviews-> creationDate) ? $guest_reviews-> creationDate."<br/>" : ' creationDate <br/>'; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="hotel-great">Excellent choice when in London</p>
                                        <p class="room-descrption">
                                        <?php  echo isset($guest_reviews-> reviewText) ? $guest_reviews-> reviewText."<br/>" : ' reviewText <br/>'; ?> <a href="#">Read More</a> 
                                        </p>
                                        <p class="red-like"><img src="{{asset('images/red-heart.svg')}}"><span>Like</span></p>
                                    </div>
                                </div>
                            </div>
                               <?php
                                if($review_count == 4)
                                {
                                    break;
                                }
                               $review_count++;
                                   // echo "reviewer name : ".$guest_reviews->reviewerName."<br/>";
                                 }
                              }
                            ?>
                           

<!--                             
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
                            </div> -->

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



<script>

currencyConversion(localStorage.getItem('currency'),'<?php echo $_GET['price']?>')

function currencyConversion(curr,price)
{
//    console.log('local storage : ',curr);
   var symbol = (curr == 'EUR') ? ' € ' : (curr == 'INR') ? ' ₹ ' : (curr == 'GBP') ? '£' : (curr == 'USD')  ? ' $ ' : '';
//    console.log('curr symbol ',symbol)
    $.ajax({
    type:'GET',
    url:"/getExchangedCurrency",
    data:{
        currency : curr,
        price : price
    },
    success:function(data){
        if($.isEmptyObject(data.error)){
            $('#price-value').text(`${symbol} ${data}`)
            console.log(`converted price : ${symbol} ${data}`)
            // console.log('price val : ', );
        }else{
            printErrorMsg(data.error);
        }
    }
    });

}

setTimeout(() => {
    partnerLink()
},4000);


function partnerLink()
{
   var locale = (localStorage.getItem('locale') == 'frFR') ? ' FR ' : (localStorage.getItem('locale') == 'esES') ? ' UK ' : 'US';
   $.ajax({
    type:'GET',
    url:"/partnerLink",
    data:{
        locale : locale,
        propertyId : $('#propertyId').val()
    },
    success:function(data){
        if($.isEmptyObject(data.error))
        {   
            $('#expedia_link').attr('href',data[0])
            $('#hcom_link').attr('href',data[1])
            console.log('expedia_link url : ',data[0]);
            console.log('hcom link url : ',data[1]);
        }
        else{
            printErrorMsg(data.error);
        }
    }
    });

}


</script>

<style>
    a#expedia_link,a#hcom_link
    {
        color : #fff !important;
    }
</style>
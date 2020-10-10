@include('searchDoctors.nav')
@include('searchDoctors.header')
<!-- Products Section        -->
<div class="products">
   <div class="container">
      <div class="search-products">
         <form method="post" action="{{url('/search')}}">
            @csrf
            <input type="text" placeholder="Search" name="search" id="search" >
            <button> <img src="{{url('/')}}/design/assets/imgs/search.svg" alt=""></button>
         </form>
      </div>
      <div class="shuffle-btns-content">
      <!-- categories -->
        <div>
              @if(session()->has('message'))
                  <div class="alert alert-success">
                      {{ session()->get('message') }}
                  </div>
              @endif
        </div>
      </div>
      <div class="row" id="Container">
           @php
           $i=0;
           @endphp
           @foreach ($doctors as $doctors)
           <div class="col-lg-4 col-md-6 col-sm-12 mix">
              <div class="product-box">
                 <div class="product-img">
                    
                    <img class="img-fluid" src="{{url('/')}}/design/assets/imgs/doctor.jpg" alt="">
                 </div>
                 <div class="product-details-overlay">
                    <div class="product-name">
                       <h5>{{$doctors->name}}</h5>
                       <p>{{$doctors->description}}</p>
                    </div>
                    <div class="product-details">
                       <!-- Modal for details-->
                       <div class="product-details-btn"><span>
                          <a href="#" data-toggle="modal" data-target="#largeModal{{ $i}}"><img src=""/> show details </a>
                          <i class="fa fa-long-arrow-right">  </i></span>
                       </div>
                       <div class="modal fade" id="largeModal{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                             <div class="modal-content">
                                <div class="modal-header">
                                   <h5 class="modal-title " id="myModalLabel">{{$doctors->name}}</h5>
                                   <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i>
                                   </button>
                                </div>
                                <div class="modal-body">
                                   <div class="container">
                                      <div class="row">
                                        <div class="col-md-12">
                                          <div class="product-img">
                                            <div class="carousel slide" id="carouselExampleControls" data-ride="carousel">
                                              @php 
                                              $count = count($doctors->timetables);
                                              $eachCol = $count /4 ;
                                              $global = 0;
                                              @endphp
                                             
                                              <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                  <div class="row">
                                                    <!-- today -->
                                                    <!-- <div class="col"></div> -->
                                                    
                                                    <div class="col">
                                                      @for($x= 0 ; $x < $eachCol ; $x++ )
                                                      <div class="card">
                                                        <div> 
                                                         <span style="color: red;"> Date : </span>  
                                                         {{$doctors->timetables[$x]->time->toDateString()}}
                                                        </div>
                                                        <div> 
                                                         <span style="color: red"> Time : </span>  {{$doctors->timetables[$x]->time->format('h:i a')}}
                                                        </div>
                                                        <a href="{{url('/book/'.$doctors->timetables[$x]->time.'/'.$doctors->name.'/'.$doctors->id)}}">Boock Now</a>
                                                      </div>
                                                        @php
                                                          $global++ ;
                                                        @endphp 
                                                      @endfor
                                                    </div>
                                                    
                                                    <!-- tomorrow -->
                                                    
                                                    <div class="col">
                                                      @for($x= $global ; $x < $eachCol*2 ; $x++ )
                                                      <div class="card">
                                                        <div> 
                                                         <span style="color: red;"> Date : </span>  {{$doctors->timetables[$x]->time->toDateString()}}
                                                        </div>
                                                        <div> 
                                                         <span style="color: red"> Time : </span>  {{$doctors->timetables[$x]->time->format('h:i a')}}
                                                        </div>
                                                        <a href="{{url('/book/'.$doctors->timetables[$x]->time.'/'.$doctors->name.'/'.$doctors->id)}}">Boock Now</a>
                                                      </div>
                                                        @php
                                                          $global++ ;
                                                        @endphp
                                                      @endfor
                                                    </div>
                                                    
                                                    <!-- the day next tomorrow -->
                                                    
                                                    <div class="col">
                                                      @for($x= $global ; $x < $eachCol*3 ; $x++ )
                                                      <div class="card">
                                                        <div> 
                                                         <span style="color: red;"> Date : </span>  {{$doctors->timetables[$x]->time->toDateString()}}
                                                        </div>
                                                        <div> 
                                                         <span style="color: red"> Time : </span>  {{$doctors->timetables[$x]->time->format('h:i a')}}
                                                        </div>
                                                        <a href="{{url('/book/'.$doctors->timetables[$x]->time.'/'.$doctors->name.'/'.$doctors->id)}}">Boock Now</a>
                                                      </div>
                                                        @php
                                                          $global++ ;
                                                        @endphp
                                                      @endfor
                                                    </div>
                                                    
                                                    <!-- the day next tomorrow -->
                                                    
                                                    <div class="col">
                                                      @for($x= $global ; $x < $count ; $x++ )
                                                      <div class="card">
                                                        <div> 
                                                         <span style="color: red;"> Date : </span>  {{$doctors->timetables[$x]->time->toDateString()}}
                                                        </div>
                                                        <div> 
                                                         <span style="color: red"> Time : </span>  {{$doctors->timetables[$x]->time->format('h:i a')}}
                                                        </div>
                                                        <a href="{{url('/book/'.$doctors->timetables[$x]->time.'/'.$doctors->name.'/'.$doctors->id)}}">Boock Now</a>
                                                      </div>
                                                        @php
                                                          $global++;
                                                        @endphp
                                                      @endfor
                                                    </div>

                                                    <!-- <div class="modal fade" id="largeModal{{$global}}" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                                                     <div class="modal-dialog modal-lg">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <h1>Registration</h1>
                                                        </div>
                                                        <div class="modal-body">
                                                          <div class="container">
                                                            <div class="row">
                                                              <form>
                                                                <input type="text" name="name">
                                                                <input type="text" name="email">
                                                                
                                                                
                                                              </form>
                                                            </div>  
                                                          </div>  
                                                        </div>   
                                                      </div>  
                                                     </div> 
                                                    </div> --> 
                                                    
                                                  </div>
                                                </div>
                                                
                                                <!-- <div class="carousel-item">
                                                  <h1>two</h1>
                                                </div>
                                                <div class="carousel-item">
                                                  <h1>three</h1>
                                                </div> -->
                                              </div>
                                            
                                              <!-- <a class="carousel-control-prev" style="background: blue;" href="#carouselExampleControls{{$i}}" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next"style="background: blue;" href="#carouselExampleControls{{$i}}" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span></a> -->
                                            </div>
                                          </div>
                                        </div>
                                        <!-- <div class="col-md-12">
                                          <div class="product-desc">
                                            <h6>Description</h6>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                          </div> -->
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
           @php
           $i++;
           @endphp
           @endforeach 
       </div>
      </div>
   </div>
</div>
</div>
</div>
@include('searchDoctors.footer')  
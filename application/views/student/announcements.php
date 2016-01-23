<div class="container">
<div class="row">
                    <div class="col-md-12" data-wow-delay="0.2s">
                        <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                            <!-- Bottom Carousel Indicators -->
                           

                            <!-- Carousel Slides / Quotes -->
                            <div class="carousel-inner text-center">

                                <!-- Quote 1 -->


                                <div class="item active">
                        
                                        <div class="row">
                                            <div class="col-sm-8 col-sm-offset-2">
                                                <h4>{{ announcements[0].title }}</h4>
                                                <p>{{ announcements[0].content }}</p>
                                            </div>
                                        </div>
                               
                                </div>
                                <!-- Quote 2 -->


                                <div class="item" ng-repeat="announcement in announcements">
                           
                                        <div class="row" ng-if="announcement.announcement_id != 1">
                                            <div class="col-sm-8 col-sm-offset-2">
                                                    <h4>{{ announcement.title }}</h4>
                                                    <p>{{ announcement.content }}</p>
                                           
                                            </div>
                                        </div>
                                

                                  <!-- Carousel Buttons Next/Prev -->
                            <div style="margin-top: -200px">
                            <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="glyphicon glyphicon-chevron-left"></i></a>
                            <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="glyphicon glyphicon-chevron-right"></i></a>
                                </div>
                                
                            </div>

                           

                         


                        </div>
                    </div>
                </div>
</div>
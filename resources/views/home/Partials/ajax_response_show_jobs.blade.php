@forelse($data['business_detail']->jobs as $job)

    <div class="row no-gutters">

        <div class="col-lg-9 col-md-8 col-sm-12 pad-5px">
            <div class="row no-gutters">
                <!--progress-->
                <div class="progress-bar-main">
                    <ul class="breadcrumb2">
                        <li><a href="#">open</a></li>
                        <li><a href="#">assigned</a></li>
                        <li><a href="#">inprogress</a></li>
                        <li><a href="#">completed</a></li>
                        <li><a href="#">reviewed</a></li>
                        <li><a href="#"></a></li>
                    </ul>
                </div>

                <a href="#" class="p-pic-right-text"></a>
            </div>
            <div class="row no-gutters">
                <div class="col-12">
                      <span class="col-left-pera">{{$job->task}}
                          <a href="#">Read More</a></span>
                </div>

            </div>
            <div class="work-links-div2">
                @foreach($job->fauTags as $tag)
                    <a href="#">{{$tag->name}}</a>
                @endforeach
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-12 pad-5px">
            <div class="p-pic-last-sec">
                <span class="company-name-text">
                    <a href="#"><i class="far fa-heart"></i></a>

                    Rs {{$job->budget}}</span>
                <div class="p-pic-sec3">
                    <span class="posted-by-text"><strong>Posted</strong>{{$job->created_by}}</span>
                    <span class="posted-by-text"><strong>Task Location</strong>{{$job->city->name}}</span>
                    <span class="posted-by-text"><strong>Task Type</strong>{{$job->type}}</span>
                    <span class="posted-by-text"><strong>Due Date</strong>{{$job->date}}</span>
                    <span class="posted-by-text"><strong>Total Person</strong>{{$job->number_of_people}}</span>
                    <span class="posted-by-text"><strong>Task Time</strong>{{$job->date}}</span>
                    <span class="posted-by-text"><strong>Categories</strong>


                        @foreach($job->categories as $cateogory)
                            @if($loop->last)
                                {{$cateogory->name}}
                            @else
                                {{$cateogory->name}},
                            @endif
                        @endforeach
                    </span>
                </div>
                <ul class="supplier-btn-ul">
                    <li><a href="#">Apply</a></li>
                    <li><a href="#">Similar Jobs</a></li>
                </ul>

            </div>
        </div>
    </div>

@endforeach
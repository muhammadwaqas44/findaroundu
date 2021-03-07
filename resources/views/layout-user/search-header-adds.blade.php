<div class="fix-header2">
    <div class="custom-container">
        <ul class="range-ul">
            <li class="dropdown">
                <a href="#" type="button" data-toggle="dropdown"><i  class="fas fa-dollar-sign"></i> Price Range</a>
                <form action="{{route('user.front-adds')}}" method="get" id="form_search">
                    <input type="hidden" name="posted_by_me" id="posted_by_me">
                    <input type="hidden" name="sort_by" id="sort_by">
                    <input type="hidden" name="type" id="type">
                    <input type="hidden" name="near_me" id="near_me">


                <ul class="dropdown-menu menu-drop2">

                    <li>
                        <div class="bg-clr clearfix active-div">
                            <div class="leftdoller"><i class="fas fa-dollar-sign"></i></div>
                            <div class="righttext">Cheap</div>
                        </div>
                    </li>
                    <li>
                        <div class="bg-clr clearfix">
                            <div class="leftdoller"><i class="fas fa-dollar-sign"></i><i class="fas fa-dollar-sign"></i>
                            </div>
                            <div class="righttext">Moderate</div>
                        </div>
                    </li>
                    <li>
                        <div class="bg-clr clearfix">
                            <div class="leftdoller"><i class="fas fa-dollar-sign"></i><i class="fas fa-dollar-sign"></i><i
                                        class="fas fa-dollar-sign"></i></div>
                            <div class="righttext">Expensive</div>
                        </div>
                    </li>
                    <li>
                        <div class="bg-clr clearfix">
                            <div class="leftdoller"><i class="fas fa-dollar-sign"></i><i class="fas fa-dollar-sign"></i><i
                                        class="fas fa-dollar-sign"></i><i class="fas fa-dollar-sign"></i></div>
                            <div class="righttext">Ultra</div>
                        </div>
                    </li>
                    <li><span class="reset"><i class="fas fa-power-off"></i> reset</span></li>
                </ul>


            </li>
            <li><a href="#" onclick="submitFunction('near_me',null)"><i class="fas fa-map-marker-alt"></i> Near Me</a></li>

            @if(Auth::check())
                <li>
                    <a href="#" onclick="submitFunction('posted_by_me',null)"
                       @if(app('request')->input('posted_by')== "me") style="border:1px solid #aaaaaa" @endif> Posted By Me</a>
                </li> @endif
            <li class="dropdown">
                <a href="#" type="button" data-toggle="dropdown"><i class="fas fa-bars"></i> Sort By</a>

                <ul class="dropdown-menu menu-drop3">
                    <li>
                        <span class="icons-left"><i class="far fa-calendar-alt" title="Sort by date"></i></span>
                        <div class="orderby-item">
                            <a href="#" onclick="submitFunction('newer',null)">
                                Newer
                            </a>

                        </div>
                        <span class="divider">or</span>
                        <div class="orderby-item">
                            <a href="#" onclick="submitFunction('older',null)">
                                Older
                            </a>
                        </div>
                    </li>
                    <li>
                        <span class="icons-left"><i class="fas fa-dollar-sign" title="Sort by Price"></i></span>
                        <div class="orderby-item">
                            <a href="#" onclick="submitFunction('a-z',null)">
                                A-Z
                            </a>
                        </div>
                        <span class="divider">or</span>
                        <div class="orderby-item">
                            <a href="#" onclick="submitFunction('z-a',null)">
                                Z-A
                            </a>
                        </div>
                    </li>


                    <li>
                        <span class="icons-left"><i class="fas fa-dollar-sign" title="Sort by Price"></i></span>
                        <div class="orderby-item">
                            <a href="#" onclick="submitFunction('highest-lowest','hourly')">
                                Highest-Lowest(Hourly)
                            </a>
                        </div>
                        <span class="divider">or</span>
                        <div class="orderby-item">
                            <a href="#" onclick="submitFunction('highest-lowest','project')">
                                Highest-Lowest(Project)
                            </a>
                        </div>
                    </li>

                    <li>
                        <span class="icons-left"><i class="fas fa-dollar-sign" title="Sort by Price"></i></span>
                        <div class="orderby-item">
                            <a href="#" onclick="submitFunction('lowest-highest','hourly')">
                                Lowest-Highest(Hourly)
                            </a>
                        </div>
                        <span class="divider">or</span>
                        <div class="orderby-item">
                            <a href="#" onclick="submitFunction('lowest-highest','project')">
                                Lowest-Highest(Project)
                            </a>
                        </div>
                    </li>
                </ul>
            </li>
        </form>
            <li class="dropdown">
                <a href="#" class="show-menu-drop">More Filters <i class="fas fa-plus-circle"></i></a>
                <div class="menu-drop4">
                    <h2 class="amenities">Amenities</h2>
                    <div class="check-box-div">
                        <label class="remember-me-btn">
                            <input type="checkbox">baby toilet<span></span>
                        </label>
                    </div>
                    <div class="check-box-div">
                        <label class="remember-me-btn">
                            <input type="checkbox">baby toilet<span></span>
                        </label>

                    </div>
                    <div class="check-box-div">
                        <label class="remember-me-btn">
                            <input type="checkbox">baby toilet<span></span>
                        </label>
                    </div>
                    <div class="check-box-div">
                        <label class="remember-me-btn">
                            <input type="checkbox">baby toilet<span></span>
                        </label>
                    </div>
                    <div class="check-box-div">
                        <label class="remember-me-btn">
                            <input type="checkbox">baby toilet<span></span>
                        </label>
                    </div>
                    <div class="check-box-div">
                        <label class="remember-me-btn">
                            <input type="checkbox">baby toilet<span></span>
                        </label>
                    </div>
                    <div class="check-box-div">
                        <label class="remember-me-btn">
                            <input type="checkbox">baby toilet<span></span>
                        </label>
                    </div>
                    <div class="check-box-div">
                        <label class="remember-me-btn">
                            <input type="checkbox">baby toilet<span></span>
                        </label>
                    </div>
                    <div class="check-box-div">
                        <label class="remember-me-btn">
                            <input type="checkbox">baby toilet<span></span>
                        </label>
                    </div>
                    <div class="check-box-div">
                        <label class="remember-me-btn">
                            <input type="checkbox">baby toilet<span></span>
                        </label>
                    </div>
                    <div class="check-box-div">
                        <label class="remember-me-btn">
                            <input type="checkbox">baby toilet<span></span>
                        </label>
                    </div>
                    <div class="check-box-div">
                        <label class="remember-me-btn">
                            <input type="checkbox">baby toilet<span></span>
                        </label>
                    </div>
                    <div class="check-box-div">
                        <label class="remember-me-btn">
                            <input type="checkbox">baby toilet<span></span>
                        </label>
                    </div>
                    <div class="check-box-div">
                        <label class="remember-me-btn">
                            <input type="checkbox">baby toilet<span></span>
                        </label>
                    </div>
                    <div class="check-box-div">
                        <label class="remember-me-btn">
                            <input type="checkbox">baby toilet<span></span>
                        </label>
                    </div>
                    <div class="margin-top">
                        <h2 class="amenities">Tags</h2>
                        <div class="check-box-div">
                            <label class="remember-me-btn">
                                <input type="checkbox">bar<span></span>
                            </label>
                        </div>
                        <div class="check-box-div">
                            <label class="remember-me-btn">
                                <input type="checkbox">beach<span></span>
                            </label>
                        </div>
                        <div class="check-box-div">
                            <label class="remember-me-btn">
                                <input type="checkbox">beauity<span></span>
                            </label>
                        </div>
                        <div class="check-box-div">
                            <label class="remember-me-btn">
                                <input type="checkbox">bar<span></span>
                            </label>
                        </div>
                        <div class="check-box-div">
                            <label class="remember-me-btn">
                                <input type="checkbox">beach<span></span>
                            </label>
                        </div>
                        <div class="check-box-div">
                            <label class="remember-me-btn">
                                <input type="checkbox">beauity<span></span>
                            </label>
                        </div>
                        <div class="check-box-div">
                            <label class="remember-me-btn">
                                <input type="checkbox">bar<span></span>
                            </label>
                        </div>
                        <div class="check-box-div">
                            <label class="remember-me-btn">
                                <input type="checkbox">beach<span></span>
                            </label>
                        </div>
                        <div class="check-box-div">
                            <label class="remember-me-btn">
                                <input type="checkbox">beauity<span></span>
                            </label>
                        </div>
                        <div class="check-box-div">
                            <label class="remember-me-btn">
                                <input type="checkbox">bar<span></span>
                            </label>
                        </div>
                        <div class="check-box-div">
                            <label class="remember-me-btn">
                                <input type="checkbox">beach<span></span>
                            </label>
                        </div>
                        <div class="check-box-div">
                            <label class="remember-me-btn">
                                <input type="checkbox">beauity<span></span>
                            </label>
                        </div>
                        <div class="check-box-div">
                            <label class="remember-me-btn">
                                <input type="checkbox">bar<span></span>
                            </label>
                        </div>
                        <div class="check-box-div">
                            <label class="remember-me-btn">
                                <input type="checkbox">beach<span></span>
                            </label>
                        </div>

                    </div>
                </div>
            </li>
            <li><a href="{{route('user.front-adds')}}"><i class="fas fa-redo"></i></a></li>

            <li><a href="{{route('user.new-add')}}">Post Add</a></li>

        </ul>
        <a href="#" type="button" onclick="loadScript(mapResult)" data-toggle="dropdown" class="show-map dropdown">Show Map <i
                    class="fas fa-map-signs"></i></a>

    </div>
</div>



<style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #map {
        height: 100%;
    }

    /* Optional: Makes the sample page fill the window. */
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    /* The popup bubble styling. */
    .popup-bubble {
        /* Position the bubble centred-above its parent. */
        position: absolute;
        top: 0;
        left: 0;
        transform: translate(-50%, -100%);
        /* Style the bubble. */
        background-color: white;
        padding: 5px;
        border-radius: 5px;
        font-family: sans-serif;
        overflow-y: auto;
        max-height: 60px;
        box-shadow: 0px 2px 10px 1px rgba(0, 0, 0, 0.5);
    }

    /* The parent of the bubble. A zero-height div at the top of the tip. */
    .popup-bubble-anchor {
        /* Position the div a fixed distance above the tip. */
        position: absolute;
        width: 100%;
        bottom: /* TIP_HEIGHT= */ 8px;
        left: 0;
    }

    /* This element draws the tip. */
    .popup-bubble-anchor::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        /* Center the tip horizontally. */
        transform: translate(-50%, 0);
        /* The tip is a https://css-tricks.com/snippets/css/css-triangle/ */
        width: 0;
        height: 0;
        /* The tip is 8px high, and 12px wide. */
        border-left: 6px solid transparent;
        border-right: 6px solid transparent;
        border-top: /* TIP_HEIGHT= */ 8px solid white;
    }

    /* JavaScript will position this div at the bottom of the popup tip. */
    .popup-container {
        cursor: auto;
        height: 0;
        position: absolute;
        /* The max width of the info window. */
        width: 200px;
    }
</style>








<script>

        function submitFunction(value, type) {


            @if(isset($_GET['sort_by']) != '')
                $('#sort_by').val('{{$_GET['sort_by']}}');
            @endif

            @if(isset($_GET['posted_by_me']) != '')
                $('#posted_by_me').val('{{$_GET['posted_by_me']}}');
            @endif

            @if(isset($_GET['near_me']) != '')
                $('#near_me').val('{{$_GET['near_me']}}');
            @endif



            if (value == 'posted_by_me') {
                $('#posted_by_me').val('me');
            }

            if (value == 'newer' || value == 'older' || value == 'a-z' || value == 'z-a' || value == 'highest-lowest' || value == 'lowest-highest') {
                $('#sort_by').val(value);
                $('#type').val(type);
            }

            if (value == 'near_me') {
                $('#near_me').val(value);
            }


            document.getElementById("form_search").submit();
        }



</script>

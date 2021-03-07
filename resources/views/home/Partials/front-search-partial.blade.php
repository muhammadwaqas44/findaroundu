<div class="location-input-banner4 dropdown">
    <form method="get"
          action="@if(Route::currentRouteName() == 'user.front-business') {{route('user.front-business')}} @elseif(Route::currentRouteName() == 'user.front-services') {{route('user.front-business')}} @endif">
        <input name="category_id" id="business-hidden" type="hidden">
        <input name="for_redirect" id="for_redirect" type="hidden">
        <a href="javascript:void(0)" class="need-drop-down" data-toggle="dropdown"><span id="business-cat">

                @if(Route::currentRouteName() == 'user.front-business')
                    Business Directory
                @elseif(Route::currentRouteName() == 'user.front-services')
                    Profesional / Services
                @else
                    Profesional / Services
                @endif

            </span> <i
                    class="fas fa-angle-down"></i>
        </a>
        <ul class="dropdown-menu need-toggle-drop drop-down-menu-right">
            <li><a href="javascript:void(0)"
                   onclick="valueReplace('Tasks / Jobs / Work',null,null,null,'parent')"><i
                            class="fas fa-user-graduate"></i> Tasks / Jobs / Work</a></li>
            <li><a href="javascript:void(0)"
                   onclick="valueReplace('Professional / Services',null,null,null,'parent')">Professional
                    /
                    Services</a></li>
            <li><a href="javascript:void(0)"
                   onclick="valueReplace('Business Directory',null,null,null,'parent')">Business
                    Directory</a>
            </li>
            <li><a href="javascript:void(0)" onclick="valueReplace('Classified',null,null,null,'parent')">Classified</a>
            </li>
            <li><a href="javascript:void(0)" onclick="valueReplace('Shopping',null,null,null,'parent')">Shopping</a>
            </li>
        </ul>

        <div class="select-category-drop3">
            <div class="cat-select3">
                <a href="#" style="color: #30373b;"><i class="fas fa-bars"></i>

                    @if(!empty($data['category_name']))

                        <span id="sub-category-text">      {{$data['category_name']}}</span>
                    @else
                      <span id="sub-category-text">  Categories </span>
                    @endif


                    <i class="fas fa-angle-down angle-dwn"></i>
                </a>
                <div class="mega-cat-main2" style="display: none;">
                    <div>

                        {{\App\Helpers\SetupsHelper::topBarHelper('Business')}}

                    </div>
                </div>
            </div>
            <div class="search-right-main-index2">
             <span class="country-drop-down2">
             <select>
                 <option>Lahore</option>
                 <option>Karachi</option>
                 <option>Peshwar</option>
             </select>
        </span>
                <span class="input-calc-width2">
             <input type="search" placeholder="Location...." class="search-here3">
        </span>

                <button type="submit" class="message-btn3"><i class="fas fa-search"></i></button>

            </div>


        </div>
    </form>
</div>

<script>
    $('.cat-select3').click(function () {
        $('.mega-cat-main2').show(50);
    });
    $('.cat-select3').hover(function () {
        $('.mega-cat-main2').show(50);
    }, function () {
        $('.mega-cat-main2').hide(50);
    });

</script>

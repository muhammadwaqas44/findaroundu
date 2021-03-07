<form method="post" action="{{route('agent.edit-customer',[$data['user_detail']->id])}}">
    @csrf
    <div class="first-tab-form-main">
        <div class="border-box">
        <span class="holiday-text">Personal Information</span>

        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <div class="row">
                    <div class="col-5">
                        <span class="primary-doctor-text">First Name<sup>*</sup></span>
                    </div>
                    <div class="col-7">
                        <input name="first_name" class="enter-text-field" value="{{$data['user_detail']->userInfo->first_name}}" >
                    </div>
                </div>

                <div class="row">
                    <div class="col-5">
                        <span class="primary-doctor-text">Country<sup>*</sup></span>
                    </div>
                    <div class="col-7">
                        <span class="search-drop-down5">
                            <select class="form-control enter-text-field" name="main_country_id">
                                @foreach($data['countries'] as $country)
                                    <option value="{{$country['id']}}" {{$country['id']== $data['user_detail']->address->main_country_id ? 'selected':'' }}>{{$country['name']}}</option>
                                @endforeach
                            </select>
                        </span>

                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <span class="primary-doctor-text">State<sup>*</sup></span>
                    </div>
                    <div class="col-7">
                        <span class="search-drop-down5">
                            <select class="form-control" name="main_state_id">
                                @foreach($data['states'] as $state)
                                    <option value="{{$state['id']}}" {{$state['id'] == $data['user_detail']->address->main_state_id ? 'selected':''}}>{{$state['name']}}</option>
                                @endforeach
                            </select>
                        </span>
                    </div>
                </div>



            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="row">
                    <div class="col-5">
                        <span class="primary-doctor-text">Last Name<sup>*</sup></span>
                    </div>
                    <div class="col-7">
                        <input name="last_name" class="enter-text-field" value="{{$data['user_detail']->userInfo->last_name}}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-5">
                        <span class="primary-doctor-text">City<sup>*</sup></span>
                    </div>
                    <div class="col-7">
                        <span class="search-drop-down5">
                            <select class="form-control" name="main_city_id">
                                @foreach($data['cities'] as $city)

                                <option value="{{$city['id']}}" {{$city['id']== $data['user_detail']->address->main_city_id ? 'selected':'' }}>{{$city['name']}}</option>
                                @endforeach
                            </select>
                        </span>

                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <span class="primary-doctor-text">Address<sup>*</sup></span>
                    </div>
                    <div class="col-7">
                        <input type="text" id="address" name="address" placeholder="Enter Address"
                                    class="enter-text-field"  autocomplete="off" value="{{$data['user_detail']->address->address }}" required>
                    </div>
                </div>


            </div>
        </div>

    </div>

        <div class="save-form-main5">
            <a href="#" class="create-btn-new" data-toggle="modal" data-target="#create-popup">Create new employee</a>
            <ul class="save-form-ul2">
                <li><button type="submit" style="background:#7266ba;">Save General</button></li>
            </ul>
        </div>
    </div>
</form>



<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuUN0YrQ-AAXx0SHcea3nN_aD25M28AGw&libraries=places&callback=initAutocomplete"
        async defer></script>
<script>
    var placeSearch, autocomplete;
    var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
    };
</script>


<script>
    var placeSearch, autocomplete;
    var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
    };

    function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        $(function () {
            var input = document.getElementById("address");
            autocomplete = new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */(document.getElementById('address')),
                {types: ['geocode']});

        });

    }
</script>
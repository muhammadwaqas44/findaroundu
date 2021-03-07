<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">

<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script>


    function changeStatus(id,value) {
        if (value == "all-users") {
            baseUrl = "{{url('admin/change-status/user/')}}" + "/" + id;
            load = "all-users";
        }
        else if(value == "all-individuals-categories"){
            baseUrl = "{{url('admin/change-status/category/')}}" + "/" + id;
            load = "all-individuals-categories";
        }else if(value == "all-company-categories"){
            baseUrl = "{{url('admin/change-status/category/')}}" + "/" + id;
            load = "all-company-categories";
        }else if(value == "all-adds"){
            baseUrl = "{{url('admin/change-status/add/')}}" + "/" + id;
            load = "all-adds";
        }else if(value == "all-services"){
            baseUrl = "{{url('admin/change-status/service/')}}" + "/" + id;
            load = "all-services";
        }
        $.get(baseUrl, function (data, status) {
            //  alert("Data: " + data + "\nStatus: " + status);
        });
        getSetupsData(load);
    }

    function approveStatus(id,value) {
        if(value == "all-adds"){
            baseUrl = "{{url('admin/approve-status/add/')}}" + "/" + id;
            load = "all-adds";
        }
        else if(value == "all-services"){
            baseUrl = "{{url('admin/approve-status/service/')}}" + "/" + id;
            load = "all-services";
        }
        $.get(baseUrl, function (data, status) {
              alert("Data: " + data + "\nStatus: " + status);
        });
        getSetupsData(load);
    }

    function getSetupsData(value) {
        var xhttp = new XMLHttpRequest();
        baseUrl = "{{route('get-setups')}}" +"?setup="+ value;


        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                data = this.responseText;

                data = JSON.parse(data);
                document.getElementById('setup-table').innerHTML = data.html_menu;

                loadData(value);
            }
        }
        xhttp.open("GET", baseUrl, true);
        xhttp.send();
    }


    function getColumns(value){
        if (value == "all-users" ) {

            columns = [
                {data: 'id', name: 'id'},
                {
                    data: 'profile_image', "render": function (data, type, row) {
                    return '<img style="max-width:100px;" class="img-responsive" src="' + data + '" />';
                }
                },
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'status', name: 'status'},
                {data: 'current_plan', name: 'current_plan'},
                {data: 'action', name: 'action'},

                {data: 'created_at', name: 'created_at'}

            ];
            return columns;
        }
        else if(value == "all-individuals-categories" ){
            columns = [
                {data: 'id', name: 'id'},
                {
                    data: 'profile_image', "render": function (data, type, row) {
                    return '<img style="max-width:100px;" class="img-responsive" src="' + data + '" />';
                }
                },
                {data: 'name', name: 'name'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action'},
                {data: 'created_at', name: 'created_at'}

            ];


            return columns;
        }
        else if(value == "all-company-categories" ){
            columns = [
                {data: 'id', name: 'id'},
                {
                    data: 'profile_image', "render": function (data, type, row) {
                    return '<img style="max-width:100px;" class="img-responsive" src="' + data + '" />';
                }
                },
                {data: 'name', name: 'name'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action'},
                {data: 'created_at', name: 'created_at'}

            ];
            return columns;
        }
        else if(value == 'all-adds'){
            columns = [
                {data: 'id', name: 'id'},
                {
                    data: 'profile_image', "render": function (data, type, row) {
                    return '<img style="max-width:100px;" class="img-responsive" src="' + data + '" />';
                }
                },
                {data: 'title', name: 'title'},

                {data: 'price', name: 'price'},
                {data: 'condition', name: 'condition'},
                {data: 'categories', name: 'categories'},
                {data: 'country', name: 'country'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action'},
                {data: 'created_at', name: 'created_at'}

            ];
            return columns;
        }
        else if(value == 'all-services'){
            columns = [
                {data: 'id', name: 'id'},
                {
                    data: 'profile_image', "render": function (data, type, row) {
                    return '<img style="max-width:100px;" class="img-responsive" src="' + data + '" />';
                }
                },
                {data: 'title', name: 'title'},

                {data: 'rate', name: 'rate'},
                {data: 'categories', name: 'categories'},
                {data: 'country', name: 'country'},

                {data: 'is_approve', name: 'is_approve'},
                {data: 'action', name: 'action'},
                {data: 'created_at', name: 'created_at'}

            ];
            return columns;
        }
    }

    function loadData(value){
        $(function () {
            var baseUrl;
            if (value == "all-users") {
                //document.getElementById('sub-menu-countries-profile').style.fontWeight = "100";
                //document.getElementById('sub-menu-languages-profile').style.fontWeight = "100";
                //document.getElementById('sub-menu-skills-profile').style.fontWeight = "100";
                //document.getElementById('sub-menu-companies-profile').style.fontWeight = "900";
                baseUrl = "{{route('get.all-users.data')}}";
            }else if(value == "all-individuals-categories"){
                baseUrl = "{{route('get.all-individuals-categories.data')}}";
            }else if(value == "all-company-categories"){
                baseUrl = "{{route('get.all-company-categories.data')}}";
            }else if(value == "all-adds"){
                baseUrl = "{{route('user.all-adds.data')}}";
            }else if(value == "all-services"){
                baseUrl = "{{route('admin.all-services.data')}}";
            }else if(value == "all-adds"){
                baseUrl = "{{route('admin.all-adds.data')}}";
            }

            var columns = getColumns(value);



            table = $('#setups-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: baseUrl,
                columns: columns
            });

        });
    }
</script>
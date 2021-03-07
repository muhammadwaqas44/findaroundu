@extends('layout-admin.app')

@section('content')
    <div class="body-container" style="background-color: white;">
        <div class="right-rable-main">
            <h5 class="m-3"> <a href="{{route('admin.import-categories')}}" style="color:blue;"><i class="fa fa-arrow-left" style="color:blue;"></i>  Back To Imoprt Page</a>
            </h5>
            <h2 class="text-primary m-3">Report Of Importing Categories</h2>
            <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <table class="table table-bordered mb-0">
                    <thead class="thead-dark">
                    <tr class="text-center">
                        <th >Id</th>
                        <th >Category</th>
                        <th >Status</th>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach($data['record'] as $valu)

                        <tr >
                            <td class="text-center">{{$valu["id"]}}</td>
                            @if($valu["status"] == 'already added')
                                <td><i class="fa fa-circle" style="color:blue;"></i>  {{$valu['name']}}</td>
                            @elseif($valu["status"]== 'add')
                                <td><i class="fa fa-circle" style="color:green;"></i>  {{$valu['name']}}</td>
                            @else
                                <td><i class="fa fa-circle" style="color:greenyellow;"></i>  {{$valu['name']}}</td>
                            @endif
                            <td class="text-center">
                                @if($valu["status"]== 'already added')
                                    <i class="fa fa-check" style="color:blue;"></i>
                                @else
                                    <i class="fa fa-check" style="color:green;"></i>

                                @endif
                            </td>
                        </tr>
                    @endforeach


                </table>
            </div>
            <br>
            <hr>


            <div class="m-3">
                <h5><i class="fa fa-circle mr-2" style="color:green;" ></i>  Added Categories. Not Available in DB.</h5>
                <h5><i class="fa fa-circle mr-2" style="color:blue;"></i>  Aready Exist Categories. Available in DB.</h5>
                <h5><i class="fa fa-check" style="color:green;"></i>  Added Successful.</h5>
                <h5><i class="fa fa-check" style="color:blue;"></i> Aready Added In Database.</h5>
                <hr>
                <h5> <a href="{{route('admin.import-categories')}}" style="color:blue;"><i class="fa fa-arrow-left mr-3" style="color:blue;"></i>  Back To Imoprt Page</a>
                </h5>
            </div>
        </div>
    </div>
@endsection
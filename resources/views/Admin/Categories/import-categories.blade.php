@extends('layout-admin.app')

@section('content')

    <div class="body-container" style="background-color: white;">

        <div class="right-rable-main">
            <div class="container" style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;">
                <a class="btn btn-warning" href="{{ route('admin.export-categories') }}">Sample Categories Data Formate</a>
                <hr>
                <form  action="{{ route('admin.importing-categories') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                    @csrf

                    <select class="form-control col-4" name="type" required>
                        <option value="Adds">Adds</option>
                        <option value="Business">Business</option>
                        <option value="Professionals">Professionals</option>
                        <option value="Shopping">Shopping</option>
                        <option value="Tags">Tags</option>
                    </select>

                    <hr>
                    <input type="file" name="import_file" required/>
                    <button class="btn btn-primary">Import File</button>
                </form>

            </div>

            {{--For Tree View Of All Type OF Categories--}}
            <div class="container"  style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;">

                {{--For Adds--}}

                <ul id="myUL" >
                    <li><span class="caret"> Adds ({{$data['adds']->count()}})</span>
                        <ul class="nested">
                            @foreach(  $data['adds_cat'] as $item)
                                 <li>

                                    <span class="caret">{{ $item->name }}   (
                                        {{$item['children']->count()}} )</span>

                                     <a href="{{route('admin.delete-import-category',[$item->id])}}">Delete Category</a>
                                     <a href="{{route('admin.edit-category',[$item->id])}}">Edit Category</a>

                                     <ul class="nested">
                                        @foreach($item->children()->orderBy('name', 'Asc')->get() as $child)
                                            <li>{{ $child->name }}
                                                <a href="{{route('admin.delete-import-category',[$child->id])}}">Delete Category</a>
                                                <a href="{{route('admin.edit-category',[$child->id])}}">Edit Category</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
                {{--For Business--}}

                <ul id="myUL">
                    <li><span class="caret"> Business ({{$data['business']->count()}})</span>
                        <ul class="nested">
                            @foreach($data['business_cat'] as $item)

                                <li><span class="caret">{{ $item->name }} (
                                        {{$item['children']->count()}} )</span>
                                    <a href="{{route('admin.delete-import-category',[$item->id])}}">Delete Category</a>
                                    <a href="{{route('admin.edit-category',[$item->id])}}">Edit Category</a>
                                    <ul class="nested">
                                        @foreach($item->children()->orderBy('name', 'Asc')->get() as $child)
                                            <li>{{ $child->name }}
                                                <a href="{{route('admin.delete-import-category',[$child->id])}}">Delete Category</a>
                                                <a href="{{route('admin.edit-category',[$child->id])}}">Edit Category</a>

                                            </li>
                                        @endforeach
                                    </ul>
                                </li>

                            @endforeach
                        </ul>
                    </li>
                </ul>

                {{--For Professionals--}}

                <ul id="myUL">
                    <li><span class="caret"> Professionals ({{$data['professionals']->count()}})</span>
                        <ul class="nested">
                            @foreach($data['professionals_cat'] as $item)

                                <li><span class="caret">{{ $item->name }} (
                                        {{$item->children->count()}} )</span>
                                    <a href="{{route('admin.delete-import-category',[$item->id])}}">Delete Category</a>
                                    <a href="{{route('admin.edit-category',[$item->id])}}">Edit Category</a>
                                    <ul class="nested">
                                        @foreach($item->children()->orderBy('name', 'Asc')->get() as $child)
                                            <li>{{ $child->name }}
                                                <a href="{{route('admin.delete-import-category',[$child->id])}}">Delete Category</a>
                                                <a href="{{route('admin.edit-category',[$child->id])}}">Edit Category</a>

                                            </li>
                                        @endforeach
                                    </ul>
                                </li>

                            @endforeach
                        </ul>
                    </li>
                </ul>



                {{--For Shopping--}}

                <ul id="myUL" >
                    <li><span class="caret"> Shopping ({{$data['shopping'] ->count()}})</span>
                        <ul class="nested">
                            @foreach( $data['shopping_cat'] as $item)

                                <li><span class="caret">{{ $item->name }} (
                                        {{$item['children']->count()}} )</span>
                                    <a href="{{route('admin.delete-import-category',[$item->id])}}">Delete Category</a>
                                    <a href="{{route('admin.edit-category',[$item->id])}}">Edit Category</a>
                                    <ul class="nested">
                                        @foreach($item->children()->orderBy('name', 'Asc')->get() as $child)
                                            <li>{{ $child->name }}
                                                <a href="{{route('admin.delete-import-category',[$child->id])}}">Delete Category</a>
                                                <a href="{{route('admin.edit-category',[$child->id])}}">Edit Category</a>

                                            </li>
                                        @endforeach
                                    </ul>
                                </li>

                            @endforeach
                        </ul>
                    </li>
                </ul>

                {{--For Tags--}}

                <ul id="myUL" >
                    <li><span class="caret"> Tags ({{$data['tags']->count()}}) </span>
                        <ul class="nested">
                            @foreach( $data['tags'] as $item)
                                <li>
                                    {{ $item->name }}
                                </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

<script type="text/javascript">
    var toggler = document.getElementsByClassName("caret");
    var i;

    for (i = 0; i < toggler.length; i++) {
        toggler[i].addEventListener("click", function() {
            this.parentElement.querySelector(".nested").classList.toggle("active");
            this.classList.toggle("caret-down");
        });
    }
</script>


@endsection
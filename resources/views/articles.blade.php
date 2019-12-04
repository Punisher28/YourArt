@include('layouts.head')
@include('layouts.header')
<div class="container">
    <hr>
        <div class="row">
        <div class="side col-md-3">
            @include('layouts.filters')
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col">
                    <div class="grid">
                        <div class="grid-sizer"></div>
                        @foreach($products as $key=>$item)
                            <div class="col grid-item d-flex ">
                                <img src="@foreach($item->image as $image){{$image->name}}@endforeach"/>
                                <div class="card-items  card-img-overlay d-flex align-content-between flex-wrap">
                                    <h6>{{$item->name}}</h6>
                                    <div>
                                        <p>{{$item->description}}</p>
                                        <a href="{{route('item',$item->id)}}" class="btn btn-secondary btn-sm btn-block">{{$item->price}} грн.</a>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col d-flex justify-content-center " style="margin-top: 15px">
                    {{$products->appends($_GET)->links()}}
                </div>
            </div>

        </div>
    </div>
</div>
@include('layouts.footer')

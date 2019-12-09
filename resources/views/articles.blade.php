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
                @foreach($products as $key=>$item)
                    <div class="col-4">
                        <div class="card" style="">
                            @foreach($item->image as $image)
                                @if ($loop->first)
                                    <img src="{{$image->name}}" class="card-img-top" alt="">
                                @endif
                            @endforeach
                            <div class="card-body">
                                <h5 class="card-title">{{$item->name}}</h5>
                                <p class="card-text">{{str_limit($item->description , $limit = 150, $end = '...')}}</p>
                                <a href="{{route('item',$item->id)}}"
                                   class="btn btn-secondary btn-sm btn-block">{{$item->price}} грн.</a>
                            </div>
                        </div>
                    </div>
                @endforeach
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

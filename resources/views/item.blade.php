@include('layouts.head')
@include('layouts.header')
<div class="container">
    <hr>
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"><a href="/">Головна</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="/articles/{{$product->category_id}}">{{$category->name}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="/articles/{{$product->category_id}}">{{$product->category->name}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>

                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col">
                    <img class="img-fluid" alt="{{$product->name}}"
                         src="@foreach($product->image as $item){{$item->name}}@endforeach">
                </div>
            </div>
            <div class="row">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        {{-- @foreach($product->chunk(3) as $item)
                          @foreach ($item->image as $count => $items)
                             <div class="carousel-item {!!$count == 0 ? 'active' : ' '  !!}">
                                 <div class="row">
                                     @foreach ($items as $img)
                                         <div class="col">{!!$img !!}</div>
                                     @endforeach
                                 </div>
                             </div>
                         @endforeach
                             @endforeach--}}

                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="d-flex justify-content-end">
                <span class="badge badge-secondary badge-pill">Код товару: {{$product->id}}</span>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <h3>{{$product->name}}</h3>
                </div>

            </div>
            <hr>
            <div class="row">
                <div class="col"><br/>
                    <div class="desc shadow-lg p-3 mb-5 bg-white rounded">
                        <h4>Характеристики:</h4>
                        <p>{{$product->description}}</p>
                    </div>
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col">
                    @if($product->status==1)
                    <div class="alert alert-success" role="alert">
                        Є в наявності
                    </div>
                    @else
                        <div class="alert alert-danger" role="alert">
                            Товар відсутній на складі
                        </div>
                    @endif
                    <div class="row">
                        <div class="col text-center">
                           <h2> {{$product->price}} грн.</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <a href="{{route('addcart',['id'=> $product->id])}}" class="btn btn-secondary btn-block  " {{$product->status==0 ? "disabled" : "" }}>До корзини</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="card" style="">
                                <div class="card-header text-center">
                                    Доставка
                                </div>
                                <ul class="list-group list-group-flush ">
                                    <li class="list-group-item d-flex  justify-content-between">Кур'єром<span class="badge badge-secondary badge-pill">55грн.</span></li>
                                    <li class="list-group-item d-flex  justify-content-between">Самовивіз<span class="badge badge-secondary badge-pill">Бесплатно</span></li>
                                    <li class="list-group-item d-flex  justify-content-between">Нова пошта<span class="badge badge-secondary badge-pill">65грн.</span></li>
                                    <li class="list-group-item d-flex  justify-content-between">Укрпошта<span class="badge badge-secondary badge-pill">35грн.</span></li>
                                    <li class="list-group-item d-flex  justify-content-between">Justin<span class="badge badge-secondary badge-pill">25грн.</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
            <div class="row">
                <div class="col">
                    <br/>

                </div>
            </div>
        </div>
    </div>


</div>
@include('layouts.footer')

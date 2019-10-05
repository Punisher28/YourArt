<div class="col">
    <h3>Фільтр:</h3>
    <form action="articles" method="get">
        @if(request()->has('category'))
            <input type="hidden" name="category" value="{{request()->category}}"/>
        @endif
        @if(request()->has('search'))
            <input type="hidden" name="search" value="{{request()->search}}"/>
        @endif
        <div class="card">
            <article class="card-group-item">
                <div class="card-header">
                    <h6 class="title">Сортувати </h6>
                </div>
                <div class="filter-content">
                    <div class="card-body">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio1" value="asc" name="priceRadio" class="custom-control-input" {{request()->priceRadio == "asc" ? "checked" : ""}}>
                            <label class="custom-control-label" for="customRadio1">По зростаню ціни</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio2" value="desc" name="priceRadio" {{request()->priceRadio == "desc" ? "checked" : ""}} class="custom-control-input">
                            <label class="custom-control-label" for="customRadio2">По спаданню ціни</label>
                        </div>
                    </div> <!-- card-body.// -->
                </div>
                <div class="card-footer">
                    <button class="btn btn-secondary btn-block" type="submit">Задіяти</button>
                </div>
            </article>
            <article class="card-group-item">

                <div class="card-header">
                    <h6 class="title">Ціна </h6>
                </div>
                <div class="filter-content">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Min</label>
                                <input type="number" name="min" value="{{request()->min}}" class="form-control"
                                       id="inputEmail4" placeholder="$0">
                            </div>
                            <div class="form-group col-md-6 text-right">
                                <label>Max</label>
                                <input type="number" name="max" value="{{request()->max}}" class="form-control"
                                       placeholder="$1,0000">
                            </div>
                        </div>
                    </div> <!-- card-body.// -->
                </div>
                <div class="card-footer">
                    <button class="btn btn-secondary btn-block" type="submit">Задіяти</button>
                </div>
            </article> <!-- card-group-item.// -->
        </div>
    </form>
    <div class="card">
        <article class="card-group-item">
            <header class="card-header"><h6 class="title">Категорії</h6></header>
            <div class="list-group">
                @foreach($categories as $key=> $category)
                    <li
                        class="d-flex justify-content-between align-items-center list-group-item list-group-item-action"
                        data-toggle="collapse" data-target="#demo{{$key}}">
                        {{ $category->name }}
                        <span class="badge badge-secondary badge-pill">{{count($category->childs)}}</span>
                    </li>
                    @if(count($category->childs))
                        <div id="demo{{$key}}" class="collapse">
                            @foreach($category->childs as $child)

                                <a href="articles?category={{$child->id}}"
                                   class="list-group-item list-group-item-action list-group-item-light">
                                    {{ $child->name }}</a>
                            @endforeach
                        </div>
                    @endif

                @endforeach
            </div>
        </article> <!-- card-group-item.// -->
    </div>

</div>

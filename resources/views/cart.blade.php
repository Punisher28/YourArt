@include('layouts.head')
@include('layouts.header')
<div class="container">
    @if(Session::has('cart'))
    <div class="row">
        <div class="col">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Total</th>
                    <th> </th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $key=> $product)

                <tr>
                    <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <div class="media-body">
                                <h6 class="media-heading"><a href="#">{{$product['item']['name']}}</a></h6>
                            </div>
                        </div>
                    </td>
                    <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="email" class="form-control" id="exampleInputEmail1" value={{$product['qty']}}>
                    </td>
                    <td class="col-sm-1 col-md-1 text-center"><strong>{{$product['item']['price']}}</strong></td>
                    <td class="col-sm-1 col-md-1 text-center"><strong>{{$product['price']}}</strong></td>
                    <td class="col-sm-1 col-md-1">
                        {{--<a href="dellcart/{{$product['item']['id']}}" type="button" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> Remove
                        </a>--}}
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td>  </td>
                    <td>  </td>
                    <td>  </td>
                    <td><h4>Total</h4></td>
                    <td class="text-right"><h4><strong>{{$totalPrice}}</strong></h4></td>
                </tr>
                <tr>
                    <td>  </td>
                    <td>  </td>
                    <td>  </td>
                    <td>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                            Оформити
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
        @else
    @endif
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Оформлення замовлення:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Номер телефону</label>
                        <input type="tel" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Країна</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Область</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Місто</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">П.І.Б</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div><h4 class="text-danger">До оплати: {{$totalPrice}} грн.</h4></div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Відмінити</button>
                <a href="/dellcart" class="btn btn-primary">Оформити</a>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')

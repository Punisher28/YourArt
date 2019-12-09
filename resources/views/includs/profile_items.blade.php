<div class="row" style="padding-bottom: 10px">
    <div class="col">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Add Item
        </button>
    </div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('addItem')}}" enctype="multipart/form-data" id="addItem" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input class="form-control" name="title" type="text" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                                              rows="3"
                                              placeholder="Description"></textarea>
                                </div>
                                <div class="form-group">
                                    <select class="custom-select custom-select-sm" name="category">
                                        <option selected>Select Category</option>
                                       @foreach ($category as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <input class="form-control" type="text" name="width" placeholder="Width"></div>
                                    <div class="col">
                                        <input class="form-control" type="text" name="height" placeholder="Height">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" name="price" placeholder="Price">
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="row">
                                    <div class="imgUp">
                                        <div class="imagePreview">
                                            <div class="shadow-input">
                                                <label class="img-input"><i class="fas fa-upload"></i>
                                                    <input type="file" name="image[]" class="uploadFile img"
                                                           value="Upload Photo"
                                                           style="width: 0px;height: 0px;overflow: hidden;">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <i class="fas fa-plus imgAdd"></i>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="form-check">
                        <input class="form-check-input" name="chekAuck" form="addItem" type="checkbox" value="1"
                               id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            Set Lot
                        </label>
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" form="addItem" class="btn btn-primary">Add Item</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">-</th>
            </tr>
            </thead>
            <tbody>
            @if($items)
                @foreach($items as $key=>$item)
                <tr>
                    <th scope="row">{{$key}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->price}}</td>
                    <td><a href="{{route('dellItem',['user_id'=>$item->user_id,'id_item'=>$item->id])}}" class="btn btn-danger"><i class="fas fa-times"></i></a></td>
                </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>


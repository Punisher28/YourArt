@include('layouts.head')
@include('layouts.header')
<form action="{{route('storage')}}" method="post" enctype="multipart/form-data">
    @csrf
    <br>
    <div class="container">
        <div class="row">
            <div class="imgUp">
                <div class="imagePreview">
                    <div class="shadow-input">
                        <label class="img-input"><i class="fas fa-upload"></i>
                            <input type="file" name="image[]" class="uploadFile img" value="Upload Photo"
                                   style="width: 0px;height: 0px;overflow: hidden;">
                        </label>
                    </div>
                </div>
            </div>
            <i class="fas fa-plus imgAdd"></i>
        </div>
        <!-- row -->
        <button type="submit">Test</button>
    </div>

</form>


@include('layouts.footer')

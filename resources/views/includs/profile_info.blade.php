<div class="row">
    <div class="col">
        <div class="row">
            <div class="col">
                <div class="h2">Khas Yaroslav Romanovych</div>
            </div>
        </div>
        <div class="row">
            <div class="col ">
                <small>Логін</small>
                <div class="h5 text-muted">{{$info->login}}</div>
                <small>Група</small>
                <div class="h6 text-muted">{{$info->role->full_name}}</div>
                <small>Дата народження</small>
                <div class="h6" style="color: red">{{$info->birthday}}</div>
                <small>Місто</small>
                <div class="h6 text-muted">
                    @if (!$info->location)
                        -
                    @else {{$info->location}}
                    @endif
                </div>
            </div>
            <div class="col">
                <small>Email</small>
                <div class="h5 text-muted">{{$info->email}}</div>
                <small>Номер телефону</small>
                <div class="h5 text-muted">
                    @if (!$info->tel_number)
                        -
                    @else {{$info->tel_number}}
                    @endif
                </div>
                <small>Перевірка особи</small>
                <div class="h6 text-muted">
                    @if (!$info->person_verified)
                        <a data-toggle="pill" aria-selected="true" href="#tab-security">Підтвердіть
                            данні</a>
                    @else
                        Перевірено
                    @endif
                </div>
                <small>Перевірка оплати</small>
                <div class="h6 text-muted">
                    @if (!$info->person_verified)
                        <a href="#tab-security">Підтвердіть данні</a>
                    @else Перевірено
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-4 d-flex align-items-center flex-column">
        <img class="rounded-circle img-thumbnail mx-auto d-block"
             style="height: 200px; width: 200px;object-fit: cover;"
             src="{{ (!$image ? '/storage/default-avatar.png' : $image->name)  }}"
             alt="">
        <form method="POST" action="{{route('changeImg')}}" enctype="multipart/form-data">
            @csrf
            <label class="btn btn-info" style="width: 100px"> Змінити
                <input type="file" onchange="this.form.submit()" name="userImg"
                       style="width: 0px;height: 0px;overflow: hidden;">
            </label>
        </form>

    </div>
</div>

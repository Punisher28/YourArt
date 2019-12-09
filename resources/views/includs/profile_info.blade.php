<div class="row">
    <div class="col">
        <div class="row">
            <div class="col">
                <div class="h2">Khas Yaroslav Romanovych</div>
            </div>
        </div>
        <div id="errors">
        </div>
        <div class="row">
            <div class="col ">
                <small>Login</small>
                <div class="h5 text-muted">{{$info->login}}</div>
                <small>Role</small>
                <div class="h6 text-muted">{{$info->role->full_name}}</div>
                <small>Birthday</small>
                <div class="row">
                    <div class="col">
                        <div id="info-birthday" class="h6">
                            @if (!$info->birthday)
                                - @else {{$info->birthday}}
                            @endif
                        </div>
                        <div id="form-birthday" style="">
                            <form action="{{route('changeBirthday')}}" id="changeBirthday">
                                <div class="input-group mb-1">
                                    <input id="date" type="date" name="birthday">
                                    <div class="input-group-append">
                                        <button class="btn-submit btn btn-secondary">
                                            <i class="far fa-check-circle"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-2">
                        <i id="icon-form-birthday" class="fas fa-pen"></i>
                        <i id="close-form-birthday" class="fas fa-times"></i>
                    </div>
                </div>

                <small>City</small>
                <div class="row">
                    <div class="col">
                        <div id="info-city" class="h6">
                            @if (!$info->location)
                                - @else {{$info->location}}
                            @endif
                        </div>
                        <div id="form-city" style="">
                            <form action="{{route('changeCity')}}"id="changeCity">
                                <div class="input-group mb-1">
                                    <input type="text" class="form-control" name="city" placeholder="City">
                                    <div class="input-group-append">
                                        <button class="btn-submit btn btn-secondary">
                                            <i class="far fa-check-circle"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-2">
                        <i id="icon-form-city" class="fas fa-pen"></i>
                        <i id="close-form-city" class="fas fa-times"></i>
                    </div>
                </div>
            </div>
            <div class="col">
                <small>Email</small>
                <div class="h5 text-muted">{{$info->email}}</div>
                <small>Tel-number</small>
                <div class="row">
                    <div class="col">
                        <div id="info-tel" class="h6">
                            @if (!$info->tel_number)
                                - @else {{$info->tel_number}}
                            @endif
                        </div>
                        <div id="form-tel" style="">
                            <form action="{{route('changeTel')}}" id="changeTel">
                                <div class="input-group mb-1">
                                    <input type="number" class="form-control" name="tel" placeholder="Tel">
                                    <div class="input-group-append">
                                        <button class="btn-submit btn btn-secondary">
                                            <i class="far fa-check-circle"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-2">
                        <i id="icon-form-tel" class="fas fa-pen"></i>
                        <i id="close-form-tel" class="fas fa-times"></i>
                    </div>
                </div>
                <small>Check Person</small>
                <div class="h6 text-muted">
                    @if (!$info->person_verified)
                        <a data-toggle="pill" aria-selected="true" href="#tab-security">Confirm person</a>
                    @else
                        Confirmed
                    @endif
                </div>
                <small>Check Payment</small>
                <div class="h6 text-muted">
                    @if (!$info->person_verified)
                        <a href="#tab-security">Confirm Payment</a>
                    @else Confirmed
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
            <label class="btn btn-info" style="width: 100px"> Change
                <input type="file" onchange="this.form.submit()" name="image"
                       style="width: 0px;height: 0px;overflow: hidden;">
            </label>
        </form>

    </div>
</div>

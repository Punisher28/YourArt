@include('layouts.head')
@include('layouts.header')
<div class="container">
    <hr>
    <div class="row">
        <div class="side col-sm-3">
            <br>
            <div class="nav  flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link list-group-item" id="v-pills-home-tab" data-toggle="pill" href="#tab-profile"
                   role="tab"
                   aria-controls="v-pills-home" aria-selected="true">Profile</a>
                <a class="nav-link list-group-item" id="v-pills-profile-tab" data-toggle="pill" href="#tab-security"
                   role="tab"
                   aria-controls="v-pills-profile" aria-selected="false">Security</a>
                <a class="nav-link list-group-item" id="v-pills-messages-tab" data-toggle="pill" href="#tab-orders"
                   role="tab"
                   aria-controls="v-pills-messages" aria-selected="false">Buy list</a>
                <a class="nav-link list-group-item" id="v-pills-settings-tab" data-toggle="pill" href="#tab-list"
                   role="tab"
                   aria-controls="v-pills-settings" aria-selected="false">My Lots</a>
            </div>
        </div>
        <div class="col-sm">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="tab-profile" role="tabpanel" aria-labelledby="tab-profile">
                    @include('includs.profile_info')
                </div>
                <div class="tab-pane fade" id="tab-security" role="tabpanel" aria-labelledby="tab-security">
                    @include('includs.profile_security')
                </div>
                <div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders">
                    @include('includs.profile_orders')
                </div>
                <div class="tab-pane fade" id="tab-list" role="tabpanel" aria-labelledby="tab-list">
                @include('includs.profile_items')
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')

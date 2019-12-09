@include('layouts.head')
@include('layouts.header')
<div class="container">
    <hr>
    <div class="row">
        <div class="side col-sm-3">
            <h3>Category:</h3>
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
            <a href="/articles" class="text-muted"><h3>All Items -></h3></a>
        </div>
        <div class="col-sm">
            <div id="carouselExampleFade" class="carousel carousel-fade slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" style="height: 450px;">
                        <img src="{{asset('storage/test1.png')}}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item" style="height: 450px;">
                        <img src="{{asset('storage/test2.png')}}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item" style="height: 450px;">
                        <img src="{{asset('storage/test3.png')}}" class="d-block w-100" alt="...">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h3>About:</h3>
    <div class="row popular">
        <div class="col">
            <hr>
            <p class="text-desc">
                With fascinating objects up for bid in more than 50 countries—instantly translated to your language and
                currency—YourArt is a worldwide marketplace with treasures waiting to be discovered, whether
                you're an avid collector or first-time visitor.

                By hosting thousands of auctions in real time via the Internet, the site allows unprecedented access to
                remote sales, and savvy bidders can often land desired items at very desirable prices. Leave an absentee
                bid, or fully engage in the live-auction action—it's up to you. All bidding takes place via a secure
                bidder network, which keeps your maximum bids for upcoming sales private until the item is opened on the
                day of the sale.

                YourArt revolutionized the industry from the start. In 2002, the NYC-based company formed a
                marketing partnership with eBay to introduce eBay Live Auctions. This alliance of YourArt and
                eBay enabled auction houses worldwide to go online with their live sales—a development that changed the
                auction business forever. In 2009, the debut of YourArt' iPhone and Android apps, with
                live-bidding capabilities, opened up a new mobile pipeline to bid anytime, from anywhere, with complete
                anonymity. Since then, YourArt has been the first to engage bidders with live streaming video,
                easy online payments, personalized search alerts, and more.

                Now in its second decade, YourArt is the Web's leading auction-related site, with millions of
                qualified bidders. YourArt also provides a constant stream of industry intelligence to
                auctioneers, collectors, museums, appraisers, consignors and more via:

                The easy-to-use Auction Results Database, a vast database with more than 21 million results that offers
                keyword-search access to verified auction outcomes, recent to historical. The updated archive is the #1
                free online resource for the trade, appraisers, collectors, designers, art institutions, estate
                officers, journalists, students and others on the research trail;
                Auction Central News, the global destination for the latest auction headlines, mixing timely industry
                news with feature articles by experts on all things design;
                The YourArt Consignment Hub, an easy way for interested consignors to share their property for
                review and evaluation with thousands of auction houses in one spot.
                There are many ways to get started as a collector. You can browse curated auctions, find auctions near
                you, set up keyword search alerts, search, bid and win.
            </p>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($chunks->chunk(4) as $count => $chunk)
                        <div class="carousel-item {!!$count == 0 ? 'active' : ' '  !!}">
                            <div class="row">
                                @foreach ($chunk as $item)
                                    <div class="col">
                                        <div class="card" style="width: 18rem;">
                                            @foreach($item->image as $image)
                                                @if ($loop->first)
                                                    <img src="{{$image->name}}" class="card-img-top" alt="">
                                                @endif
                                            @endforeach
                                            <div class="card-body">
                                                <p class="card-text">{{$item->name}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

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
    <hr>

</div>
@include('layouts.footer')

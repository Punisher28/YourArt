@include('layouts.head')
@include('layouts.header')
<div class="container">
    <hr>
    <div class="row">
        <div class="side col-sm-3">
            <h3>Категорії</h3>
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
        </div>

        <div class="col-sm">
            <div id="carouselExampleFade" class="carousel carousel-fade slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" style="height: 450px;">
                        <img src="{{asset('storage/test1.jpg')}}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item" style="height: 450px;">
                        <img src="{{asset('storage/test2.jpg')}}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item" style="height: 450px;">
                        <img src="{{asset('storage/test3.jpg')}}" class="d-block w-100" alt="...">
                    </div>

                </div>

            </div>
        </div>
    </div>
    <hr>
    <h3>Про компанію</h3>
    <div class="row popular">
        <div class="col">
            <hr>
            <p class="text-desc">
                Компанія «Техніка для бізнесу» вже понад 20 років працює на IT-ринку України. Засноване у 1997 році
                товариство починало свою діяльність з продажу комп’ютерної і офісної техніки невеликим підприємствам та
                іншим комп’ютерним компаніям.

                Ми першими відкрили напрямок системної інтеграції у західноукраїнському регіоні, а зараз — це
                пріоритетна галузь діяльності компанії, запорукою успішного розвитку якої є високий фаховий рівень та
                досвід наших працівників. Сьогодні ж ТзОВ «Техніка для бізнесу» — це професійна реалізація комплексних
                ІТ-проектів, сертифіковане виробництво ПК та власна дистрибуція провідних виробників комп`ютерної,
                цифрової та офісної техніки. Ми надаємо послуги з аудиту та консалтингу, проектування та впровадження,
                сервісні послуги.

                «Техніка для бізнесу» спеціалізується на втіленні комплексних ІТ- проектів на базі:

                Інженерної інфраструктури;
                Інформаційної інфраструктури;
                Комплексних програмних рішень;
                Мультимедійних рішень;
                Систем друку та обробки зображень;
                Організації та автоматизації робочих місць.
                Наші клієнти – державні та комерційні організації, що здійснюють свою діяльність у сферах освіти,
                медицини, фінансів, промисловості, обслуговування та торгівлі тощо. Ми здійснюємо ґрунтовну інформаційну
                підтримку, ознайомлюючи з новітніми ІТ-рішеннями, проводимо різнопланові тренінги, семінари, конференції
                як в Україні, так і закордоном за участю представників світових виробників.

                Наші партнери - лідери ІТ-ринку, з якими ми підтримуємо тісні професійні взаємини, тож багаторічний
                успішний досвід підтверджується статусами, сертифікатами й нагородами, наданими «Техніці для бізнесу».

                Напрямки діяльності
                Системна інтеграція;
                Власна дистрибуція комп'ютерної, цифрової та офісної техніки;
                Сертифіковане виробництво комп'ютерів.
                Наші цінності:
                Відповідальність за результат. Докладаємо максимум зусиль, щоб виконати усі поставлені завдання якісно,
                вчасно і надійно, керуючись принципами та нормами професійної етики. Довіра клієнтів — ось фундамент
                нашого лідерства.

                Комплексність обслуговування. Надаємо повний спектр послуг у сфері інформаційних технологій.

                Інноваційність. Постійно стежимо за розвитком інформаційних технологій та пропонуємо сучасні та
                інноваційні рішення. Втілюємо нові ідеї, які підвищують ефективність бізнес-процесів наших клієнтів.

                Амбітність. Ми переконані у власних силах і готові до вирішення найскладніших завдань. Наша команда
                реалізувала значну кількість проектів різного рівня складності і саме це дозволяє брати на себе
                зобов’язання, гарантуючи позитивний результат.

                "Надійні рішення - гарантований успіх!"
                - саме це гасло є визначальним у діяльності "Техніки для бізнесу"!
            </p>
            {{--<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($chunks->chunk(4) as $count => $chunk)
                        <div class="carousel-item {!!$count == 0 ? 'active' : ' '  !!}">
                            <div class="row">
                                @foreach ($chunk as $product)
                                    <div class="col">{!!$product !!}</div>
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
            </div>--}}
        </div>

    </div>
    <hr>

</div>
@include('layouts.footer')

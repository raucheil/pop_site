@extends('layouts.app')
@section('content')
<div class="container">
<h1>Add New Code</h1>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div id="list-group" class="list-group">
                            <div data-id="1" class="list-group-item col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="badge">
                                    <div class="badge_img">
                                        <img src="{{ asset('img/data.png') }}" alt="">
                                    </div>
                                    <div class="badge_text">
                                        <div class="badge_text_title">in questo momento ci sono</div>
                                        <div class="badge_text_1">[n° random, > 100] visitatori sul sito</div>
                                        <div class="col-sm-12">
                                            <button type="button" class="btn btn-sm btn-toggle active" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                <div class="handle"></div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div data-id="2" class="list-group-item col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="badge">
                                    <div class="badge_img">
                                        <img src="{{ asset('img/calendar.png') }}" alt="">
                                    </div>
                                    <div class="badge_text">
                                        <div class="badge_text_title">in data [data odierna] </div>
                                        <div class="badge_text_1">rimangono soltanto [n° random < 10] prodotti <br/> a prezzo scontato.</div>
                                            <div class="col-sm-12">
                                                <button type="button" class="btn btn-sm btn-toggle active" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                    <div class="handle"></div>
                                                </button>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div data-id="3" class="list-group-item col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="badge">
                                    <div class="badge_img">
                                        <img src="{{ asset('img/calendar.png') }}" alt="">
                                    </div>
                                    <div class="badge_text">
                                        <div class="badge_text_title">data di scadenza della promozione online: </div>
                                        <div class="badge_text_1">[data odierna]</div>
                                        <div class="col-sm-12">
                                            <button type="button" class="btn btn-sm btn-toggle active" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                <div class="handle"></div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div data-id="4" class="list-group-item col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="badge">
                                    <div class="badge_img">
                                        <img src="{{ asset('img/calendar.png') }}" alt="">
                                    </div>
                                    <div class="badge_text">
                                        <div class="badge_text_title">il [data odierna]</div>
                                        <div class="badge_text_1">hanno acquistato [n° random > 30]</div>
                                        <div class="col-sm-12">
                                            <button type="button" class="btn btn-sm btn-toggle active" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                <div class="handle"></div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div data-id="5" class="list-group-item col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="badge">
                                    <div class="badge_img">
                                        <img src="{{ asset('img/check.png') }}" alt="">
                                    </div>
                                    <div class="badge_text">
                                        <div class="badge_text_title">un ordine è appena stato effettuato da </div>
                                        <div class="badge_text_1">[città random italiana]</div>
                                        <div class="col-sm-12">
                                            <button type="button" class="btn btn-sm btn-toggle active" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                <div class="handle"></div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div data-id="6" class="list-group-item col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="badge">
                                    <div class="badge_img">
                                        <img src="{{ asset('img/count.png') }}" alt="">
                                    </div>
                                    <div class="badge_text">
                                        <div class="badge_text_title">alla scadenza della promozione di oggi mancano</div>
                                        <div class="badge_text_1">[countdown, qualche ora,
                                            <12h]</div>
                                                <div class="col-sm-12">
                                                    <button type="button" class="btn btn-sm btn-toggle active" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                        <div class="handle"></div>
                                                    </button>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <form action="/pops" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                        <label for="title">Pops Title</label>
                        <input type="text" class="form-control" id="popTitle"  name="title" placeholder="your title" value={{old('title')}}>
                        </div>
                        <div class="form-group">
                        <label for="description">Pops url</label>
                        <input type="text" class="form-control" id="popurl" name="url">
                        </div>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                        </div>
                        @endif
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        <!-- <br>
                        <h4 class="title"><b>HOW TO</b></h4>
                        <b> Genera la combinazione delle slide:</b>
                        <p> 1 - DRAG & DROP per ordinare le slide</p>
                        <p> 2 - ON/OFF per disattivare le slide</p>
                        <p> 3 - genere il codice e segui le istruzioni per inserirlo nel sito</p>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-offsett-12">
                                <button type="button" class="btn btn-block btn-success btn-make">genera codice</button>
                                <pre id="js"></pre>
                                <pre id="css"></pre>

                                <button type="button" class="btn btn-sm btn-danger" disabled="disabled">reset</button>
                                <!-- <button type="button" class="btn btn-sm btn-primary btn-copy" disabled="disabled">copia</button> -->
                                <!-- <br>
                                <br>
                                <a class="btn btn-sm btn-info" href="http://www.danielecolpo.it/newwp/" role="button">guarda un esempio</a> -->
                                
                            </div>
                        </div>
                    </div>
                </div>       
                </div>
            </div>
        </div>
</div>
@endsection
@section('scripts')
<script>
    var el = document.getElementById('list-group');
    var sortable = new Sortable(el, {
        // group: "name",  // or { name: "...", pull: [true, false, clone], put: [true, false, array] }
        sort: true, // sorting inside list
        delay: 0, // time in milliseconds to define when the sorting should start
        // disabled: false, // Disables the sortable if set to true.
        // store: null, // @see Store
        animation: 150, // ms, animation speed moving items when sorting, `0` — without animation
        // handle: ".my-handle",  // Drag handle selector within list items
        filter: ".ignore-elements", // Selectors that do not lead to dragging (String or Function)
        // // preventOnFilter: true, // Call `event.preventDefault()` when triggered `filter`
        // draggable: ".list-group-item",  // Specifies which items inside the element should be draggable
        // ghostClass: "sortable-ghost", // Class name for the drop placeholder
        // chosenClass: "sortable-chosen", // Class name for the chosen item
        // dragClass: "sortable-drag", // Class name for the dragging item

        // forceFallback: false, // ignore the HTML5 DnD behaviour and force the fallback to kick in

        // fallbackClass: "sortable-fallback", // Class name for the cloned DOM Element when using forceFallback
        // fallbackOnBody: false, // Appends the cloned DOM Element into the Document's Body
        // 7fallbackTolerance: 0, // Specify in pixels how far the mouse should move before it's considered as a drag.

         scroll: true, // or HTMLElement
    });
</script>
@endsection
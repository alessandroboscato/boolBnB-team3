@php

  $today = date('Y-m-d');

@endphp

@extends('layouts.app')

@section('pageName', 'guest_search')

@section('content')

  <div id="SearchPage"></div>

    <div class="container-fluid px-0 jumbo">
      <div class="row no-gutters">
        <div class="col-12">
          <img class="" src={{ asset('img/img1.jpeg') }} alt="carousel_img">
        </div>
      </div>
      {{-- form --}}
      <div class="row no-gutters">
        <div class="col-12 form form-search">
          <form class="form-box" method="post">

          {{-- input algolia search --}}
          <div class="form-row">
            <div class="form-group col-2">
                <input type="search" id="city" data-algolia="{{ $data_algolia }}" class="form-control" placeholder="Inserisci indirizzo" value="{{ $algolia }}" required>
            </div>
            <div class="form-group col-2">
              <div class="fl_left">
                <label class="l_height_30 d-none d-lg-block" for="algolia_radius"><strong>Raggio di ricerca</strong></label>
              </div>
              <div class="fl_left">
                <select class="form-control" id="algolia_radius" name="algolia_radius" required>
                  <option value="10">10km</option>
                  <option value="20" selected>20km</option>
                  <option value="50">50km</option>
                  <option value="100">100km</option>
                  <option value="500">500km</option>
                </select>
              </div>
            </div>
            <div class="form-group col-1">

                <label for="check_in"><strong>Check-in</strong></label>
                <input name="check_in" type="date" class="form-control" id="check_in" placeholder="Inserisci titolo" min="{{ $today }}" value="{{ $check_in }}" required>

            </div>
            <div class="form-group col-1">

                <label for="check_out"><strong>Check-out</strong></label>
                <input name="check_out" type="date" class="form-control" id="check_out" placeholder="Inserisci titolo" min="{{ $today }}" value="{{ $check_out }}" required>

            </div>
            {{-- ospiti --}}
            <div class="form-group col-1">

              <label for="adults"><strong>Ospiti</strong></label>
              <input name="adults" type="number" class="form-control" id="adults" placeholder="Adulti" min="1" value="{{ $adults }}" required>

            </div>
            <div class="form-group col-1">

              <label for="adults"><strong>Bambini</strong></label>
              <input name="children" type="number" class="form-control" id="children" placeholder="Bambini" min="0" value="{{ $children }}">

            </div>
            {{-- stanze-bagni-letti --}}
            <div class="form-group col-1">

              <label for="adults"><strong>Stanze</strong></label>
              <input type="number" class="form-control" id="rooms" placeholder="Min." min="1">

            </div>
            <div class="form-group col-1">

              <label for="adults"><strong>Letti</strong></label>
              <input type="number" class="form-control" id="beds" placeholder="Min." min="1">

            </div>
            <div class="form-group col-1">

              <label for="adults"><strong>Bagni</strong></label>
              <input type="number" class="form-control" id="bathrooms" placeholder="Minimo bagni" min="1">

              {{-- SUBMIT --}}
            </div>
            <div class="form-group col-1">
              <a id="submitSearch" class="btn btn-primary submit">Cerca</a>
            </div>
          </div>

          <div class="form-row">

              <div class="form-group offset-11 col-1">
                <a id="filters" class="btn submit">Altri filtri <i class="fas fa-chevron-down"></i></a>
              </div>


            </div>

            {{-- options --}}
            <div class="form-check ">
            @foreach ($options as $option)
              <div class="checkbox fl_left">
                <input type="checkbox" class="form-check-input" id="checkbox_{{$option->id}}">
                <label for="checkbox_{{$option->id}}" class="form-check-label">{{$option->name}}</label>
              </div>
            @endforeach
            </div>
            {{-- /options --}}


            </form>
        </div>



        {{-- /form --}}
        </div>
      </div>


  {{-- results --}}
  <section class="container" id="results">
    <div class="row flat-line" id="sponsored">

    </div>
    <div class="row flat-line" id="not-sponsored">

    </div>
  </section>
  {{-- /results --}}

  <script id="flat-template" type="text/x-handlebars-template">
    <div class="entry-flat">
      <div class="flat-img-box">
        <img src="/storage/@{{image}}" alt="@{{ title }}">
      </div>
      <div class="flat-text-box">
        <h4>Titolo: @{{title}}</h4>
        <p>Descrizione: @{{description}}</p>
        <p>Valutazione: @{{stars}}</p>
        <p>Prezzo: @{{price}}</p>
      </div>
    </div>
  </script>

</div>
@endsection

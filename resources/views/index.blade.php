
@extends('layout.app')

@section('title','Main page')

@section('content')
    <form id="wordForm">
        <div class="row justify-content-center px-3 px-md-0 ">

            <div class="text-center">
                <div class="h3 fw-light gamer-turn m-3">Игрок <span>{{$state->actualPlayer}}</span></div>
            </div>

            <!-- Name Input -->
            <div class="col-md-6 col-sm-8 col-7">
                <div class="form-floating mb-3">
                    <input class="form-control" id="word" type="text" placeholder="Word" data-sb-validations="required" />
                    <label for="name" id="word-label">Слово на <span>{{$state->lastLetter}}</span></label>
                    <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                </div>
            </div>

            <!-- Submit button -->
            <div class="col-md-2 col-sm-4 col-5">

                <div class="d-grid">
                    <button class="bubbly-button" type="submit">Вперёд</button>
                </div>

                <!-- Submit error message -->
                <div class="d-none" id="submitErrorMessage">
                    <div class="text-center text-danger mb-3">Error sending message!</div>
                </div>
            </div>


        </div>
    </form>

    <div class="row justify-content-center">
        <div class="col-lg-8" id="alert-block">

            <div class="alert alert-danger alert-dismissible fade show d-none" id="error-alert" role="alert">
                <span></span>
            </div>

        </div>
    </div>

    <div class="row justify-content-center px-3 px-lg-0" >
        <div class="col-lg-8 " id="wiki-card">

        </div>
    </div>

    <div class="row justify-content-center mt-3 " >
        <div class="col-lg-8 " id="table-card">
            @include('table')
        </div>
    </div>

    @include('js-layout.ajax-post-js')
@endsection

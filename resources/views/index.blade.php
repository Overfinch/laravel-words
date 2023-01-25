
@extends('layout.app')

@section('title','Main page')

@section('content')
    <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="card border-0 rounded-3 shadow-lg overflow-hidden">
                    <div class="card-body p-0" >
                        <div class="row g-0 my-card" >



                            <div class="col-sm-4 p-4">
                                <div class="text-center">
                                    <div class="h3 fw-light">Слова</div>
                                    <p class="mb-4 text-muted">Игрок 1</p>
                                </div>

                                <form id="contactForm" data-sb-form-api-token="API_TOKEN">

                                    <!-- Name Input -->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="word" type="text" placeholder="Word" data-sb-validations="required" />
                                        <label for="name">Слово на А</label>
                                        <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                    </div>



                                    <!-- Submit button -->
                                    <div class="d-grid">
{{--                                        <button class="btn btn-primary btn-lg button-purple" id="submitButton" type="button">Подтвердить</button>--}}
                                        <button class="bubbly-button" type="submit">Подтвердить</button>

                                    </div>

                                    <!-- Submit error message -->
                                    <div class="d-none" id="submitErrorMessage">
                                        <div class="text-center text-danger mb-3">Error sending message!</div>
                                    </div>

                                </form>
                                <!-- End of contact form -->

                            </div>

                            <div class="col-sm-8  d-sm-block bg-image " id="right-card">
{{--                                @include('table')--}}
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    @include('ajax-post-js')
@endsection

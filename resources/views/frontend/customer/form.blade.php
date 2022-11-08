@extends('frontend.layouts.app')

@section('title', 'Trust Education')

@section('content')
    <!-- Form Section -->

    <div class="slider-desc container">
        <div class="row">
            <div class="col-6">
                @if (isset($campaign) && $campaign->banner)
                        <img class="img-fluid" src="{{ asset($campaign->banner_path) }}" />
                    @endif

                <form method="GET" id="enquiry_form" class="form row g-3 form-group" name="enq"
                        action="{{ route('customerform.store', ['headers' => $campaign->name, 'user_agent' => $campaign->id]) }}">
                    <div class="text-center">
                        <label for="">
                            <h3>Register now for Appointments</h3>
                        </label>
                    </div>
                    @if (Illuminate\Support\Facades\Session::has('success'))
                        <div class="alert alert-success mt-3 mb-3" id="alert_message">
                            {{ Illuminate\Support\Facades\Session::get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @csrf
                    @if (isset($campaign))
                        <input type="hidden" name="campaign_id" id="" value="{{ $campaign->id }}">
                    @endif
                    <input type="hidden" name="source" id="" value="registration">

                    <div class="col-md-12">
                        <input required="required" placeholder="Enter Name" id="first-name"
                                class="form-control" name="name" type="text">
                    </div>
                    <div class="col-md-8">
                        <input required="required" placeholder="Enter Email" id="email"
                                    class="form-control" name="email" type="email">
                    </div>
                    <div class="col-md-4">
                        <input required="required" placeholder="Enter Phone" id="phone"
                                    class="form-control" name="phone" type="number">
                    </div>
                    <div class="col-md-4">
                        <select name="highest_qualification" class="form-control">
                            <option value="" disabled selected>Select Qualification</option>
                            @foreach ($qualifications as $qualification)
                                <option value="{{ $qualification->name }}">{{ $qualification->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input placeholder="Grade" class="form-control" name="highest_grade" type="text">
                    </div>
                    <div class="col-md-4">
                        <input placeholder="Stream" class="form-control" name="highest_stream"
                                    type="text">
                    </div>
                    <div class="col-md-6">
                        <select name="test_name" class="form-control">
                            <option value="" disabled selected>Select Test Preparation</option>
                            @foreach ($preparations as $preparation)
                                <option value="{{ $preparation->name }}">{{ $preparation->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <input placeholder="Enter Test Score " class="form-control" name="test_score"
                                    type="text">
                    </div>
                    <div class="col-md-12">
                        <select name="intrested_course[]" data-placeholder="Please Select Intrested Course"
                        class="form-control offerd_course mt-1 mt-2" multiple>
                        @foreach ($campaign_course as $course)
                            <option value="{{ $course }}">{{ $course }}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="col-md-12 text-center">
                        <div class="col-lg-12 justify-content-center align-center">
                            <button type="submit" title="Submit Your Message!" class="btn btn-submit"
                                name="submit" value="Submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="info col-6">
                <h3>DREAM EUROPE - TRUST US !! </h3>
                <h2>We Provide the Best Abroad Study Advices.</h2>
                <button type="button" class="btn btn-success text-center">Apply Now <i
                        class="bi bi-arrow-up-right-circle"></i>
                </button>

            </div>
        </div>

    </div>

    <!-- Form Section -->

    <!-- Slider Section -->

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @if($sliders->isNotEmpty())
                @foreach ($sliders as $slider)
                    <div class="carousel-item active">
                        <img src="{{$slider->image}}" class="d-block w-100" alt="...">
                    </div>
                @endforeach
            @endif
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Slider Section -->

    <!-- Why Sweden Section -->

    <div class="container headings text-center page-sections">
        <h2>Why Sweden ?</h2>
        <div class="row">
            @if($whyswedens->isNotEmpty())
                @foreach ($whyswedens as $whysweden)

                    <div class="col">
                        <div class="card ">
                            <img src="{{$whysweden->image}}" class="card-img" alt="...">
                            <div class="card-body">
                                <p class="card-text">{{$whysweden->description}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <!-- Why Sweden Section -->

    <!-- Why Success Stories -->
    <div class="container headings text-center page-sections">
        <h2>Success Stories</h2>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        @if($successstories->isNotEmpty())
                            @foreach ($successstories as $successstory)

                                <div class="col-4">
                                    <div class="card">
                                        <img src="{{$successstory->image}}" class="card-img" alt="...">
                                        <div class="card-body">
                                            <p class="card-text">{{$successstory->description}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        @endif
                    </div>
                </div>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <!-- Why Success Stories -->

    <!-- Our Videos -->
    <div class="container-fluid headings text-center page-sections">
        <h2>Our Videos</h2>
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <iframe width="100%" height="315" src="{{setting('videolink_1')}}"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
                <div class="col-6">
                    <iframe width="100%" height="315" src="{{setting('videolink_2')}}"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

    <!-- Our Videos -->

    <!-- University -->

    <div class="container-fluid headings page-sections">
        <h2 class="text-center">Success Stories</h2>
        <div id="carouselExampleControls" class="carousel slide universities" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        @if($successstories->isNotEmpty())
                            @foreach ($successstories as $successstory)
                                <div class="col-3">
                                    <div class="card justify-content-center">
                                        <img src="{{$successstory->image}}" class="card-img" alt="...">
                                        <div class="card-body">
                                            <p class="card-text text-center">{{$successstory->description}}</p>
                                            <a href="{{$successstory->link}}" class="btn btn-success align-center">Read More <i class="bi bi-caret-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>

                </div>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <!-- University -->


    <!-- Testimonial -->
    <div class="container headings text-center page-sections">
        <h2>Testimonials</h2>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        @if($testimonials->isNotEmpty())
                            @foreach ($testimonials as $testimonial)
                                <div class="col-4">
                                    <div class="card" style="width: 18rem;">
                                        <img src="{{$testimonial->image}}" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$testimonial->name}}</h5>
                                            <p class="card-text">{{$testimonial->description}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <!-- Testimonial -->







    @endsection

    @section('page-specific-meta')
        @if (isset($campaign))
            {!! $campaign->ogtags !!}
        @endif
    @endsection

    @section('page-specific-scripts')
        <script>
            $('.offerd_course').select2({});

            setTimeout(() => {
                $('#alert_message').hide();
            }, 6000);

            $('#enquiry_form').submit(function() {
                $(this).find(':input[type=submit]').prop('disabled', true);
            });
        </script>
    @endsection

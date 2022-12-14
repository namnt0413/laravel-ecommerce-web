@section('css')

@endsection

@section('js')

@endsection

@php
    $backendUrl = config('app.backend_url');
@endphp

    <!-- ****** Welcome Slides Area Start ****** -->
    <section class="welcome_area">
        <div class="welcome_slides owl-carousel">
            @foreach($sliders as $key => $slider)

                <!-- Single Slide Start -->
                <div class="single_slide height-600 bg-img background-overlay" style="background-image: url({{ $backendUrl . $slider->image_path }});">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-12">
                                <div class="welcome_slide_text">
                                    <h2 data-animation="fadeInUp" data-delay="500ms" data-duration="500ms">{{$slider->name}}</h2>
                                    <h6 data-animation="bounceInDown" data-delay="0" data-duration="500ms">{{$slider->description}}</h6>
                                    <a href="#" class="btn karl-btn" data-animation="fadeInUp" data-delay="1s" data-duration="500ms">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </section>
    <!-- ****** Welcome Slides Area End ****** -->

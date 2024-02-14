@extends('fronted.layout.master')
@section('content')
    <div class="pager-header">
        <div class="container">
            <div class="page-content">
                <h2>Image Gallery</h2>
                <p>Help today because tomorrow you may be the one who <br>needs more helping!</p>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{('/')}}">Home</a></li>
                    <li class="breadcrumb-item active">Gallery</li>
                </ol>
            </div>
        </div>
    </div>

    <section class="gallery-section bg-grey bd-bottom padding">
        <div class="container">
            <div class="row">
                <ul class="gallery-filter align-center mb-30">
                    <li class="active" data-filter="*">All</li>
                    <li data-filter=".branding">Branding</li>
                    <li data-filter=".design">Design</li>
                    <li data-filter=".wordpress">Wordpress</li>
                    <li data-filter=".marketing">Marketing</li>
                </ul>
            </div>
            <div class="gallery-items row">
                @forelse ($gallerys as $gallery)
                    <div class="col-lg-4 col-sm-6 single-item branding design">
                        <div class="gallery-wrap">
                            <img src="{{ asset($gallery->image) }}" alt="gallery">
                            <div class="hover">
                                <a class="img-popup" data-gall="galleryimg" href="img/gallery-1.jpg"><i
                                        class="ti-image"></i></a>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </section>
@endsection

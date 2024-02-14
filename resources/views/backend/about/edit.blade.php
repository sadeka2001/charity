@extends('backend.layouts.master')
{{-- @php
    $pageTitle =$page_title;
@endphp --}}
@section('content')
    <div class="page-heading">
        <div class="row">
            <div class="col-sm-6">
                {{-- <h1 class="page-title">{{ $pageTitle??'' }}</h1> --}}
            </div>
            <div class="col-sm-6 pt-4 text-right">
                <a href="{{ route('about.index') }}" class="btn bg-danger text-white"><i class="fa fa-reply"></i> Back to
                    list</a>

            </div>
        </div>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox rounded">
            <div class="ibox-body">
                <div id="row">
                    <form method="post" action="{{ route('about.update', $about->id) }}" enctype="multipart/form-data"
                        autocomplete="off">
                        @csrf
                        @method('put')
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header bg-gradient-info text-white">
                                        <h5 class="card-title">Add New About</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="title">about Title <strong class="text-danger">*</strong></label>
                                            <input type="text" name="title" id="title"
                                                value="{{ $about->title ?? old('title') }}" class="form-control" required>
                                            @error('title')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="description">Description <strong
                                                    class="text-danger">*</strong></label>
                                            <textarea name="description" id="description" rows="10" class="form-control editor" required>{{ $about->description ?? old('description') }}</textarea>
                                            @error('description')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="mission">Mission <strong
                                                    class="text-danger">*</strong></label>
                                            <textarea name="mission" id="mission" rows="10" class="form-control editor" required>{{  $about->mission ??old('mission') }}</textarea>
                                            @error('mission')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                            </div>{{-- //.col-md-8 --}}

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header bg-gradient-info text-white">
                                        <h5 class="card-title">Attachment </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="image">Attachment</label>
                                            <input type="file" name="image" id="image"
                                                data-default-file="{{ isset($about->image) ? asset($about->image) : '' }}"
                                                class="form-control dropify" data-height="220">
                                            @error('image')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center mt-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-arrow-circle-o-up"></i> Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/backend/vendors/dropify-master/dist/css/dropify.min.css') }}">
    <link href="{{ asset('assets/backend/vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/backend/vendors/summernote/dist/summernote-bs4.css') }}" rel="stylesheet" />
@endpush
@push('js')
    <script src="{{ asset('assets/backend/vendors/dropify-master/dist/js/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/backend/vendors/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/backend/vendors/summernote/dist/summernote-bs4.min.js') }}"></script>
@endpush
@push('customJS')
    <script type="text/javascript">
        $('.dropify').dropify();
        $('.select2').select2();
        $('.editor').summernote({
            height: 250,
            callbacks: {
                // callback for pasting text only (no formatting)
                onPaste: function(e) {
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData(
                        'Text');
                    e.preventDefault();
                    bufferText = bufferText.replace(/\r?\n/g, '<br>');
                    document.execCommand('insertHtml', false, bufferText);
                }
            }
        });
    </script>
@endpush

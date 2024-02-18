@extends('backend.layouts.master')
@php
    $pageTitle = 'Social Links';
@endphp
@section('content')
    <div class="page-heading">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="page-title">{{ $pageTitle ?? '' }}</h1>
            </div>
            <div class="col-sm-6 pt-4 text-right">

            </div>
        </div>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox rounded">
            <div class="ibox-body">
                <div class="row">
                    <div class="col-md-3">
                        @include('backend.setting.sidebar')
                    </div>
                    <div class="col-md-9 border">
                        <div class="mb-3 btn-transition shadow rounded" style="padding: 10px">
                            <h6>Social Links</h6>

                        </div>
                        <form action="{{ route('social.update') }}" id="settingsFrom" autocomplete="off" role="form"
                            method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="facebook">Facebook</label>
                                        <input type="text" name="facebook" id="facebook"
                                            class="form-control @error('facebook') is-invalid @enderror"
                                            value="{{ setting('facebook') ?? old('facebook') }}"
                                            placeholder="facebook link">
                                        @error('facebook')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="twitter">Twitter</label>
                                        <input type="text" name="twitter" id="twitter"
                                            class="form-control @error('twitter') is-invalid @enderror"
                                            value="{{ setting('twitter') ?? old('twitter') }}" placeholder="twitter link">
                                        @error('twitter')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="linkedin">Linked-in</label>
                                        <input type="text" name="linkedin" id="linkedin"
                                            class="form-control @error('linkedin') is-invalid @enderror"
                                            value="{{ setting('linkedin') ?? old('linkedin') }}"
                                            placeholder="linked-in link">
                                        @error('linkedin')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="youtube">Youtube</label>
                                        <input type="text" name="youtube" id="youtube"
                                            class="form-control @error('youtube') is-invalid @enderror"
                                            value="{{ setting('youtube') ?? old('youtube') }}" placeholder="youtube link">
                                        @error('youtube')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="instragram">Youtube</label>
                                        <input type="text" name="instragram" id="instragram"
                                            class="form-control @error('instragram') is-invalid @enderror"
                                            value="{{ setting('instragram') ?? old('instragram') }}"
                                            placeholder="instragram link">
                                        @error('instragram')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-arrow-circle-up"></i>
                                        <span>Update</span>
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('customCSS')
    <style>


    </style>
@endpush
@push('js')
    <script src="{{ asset('assets/scripts/sweetalert2.all.min.js') }}"></script>
@endpush
@push('customJS')
    <script type="text/javascript"></script>
@endpush

@extends('backend.layouts.master')
@php
    $pageTitle = 'General Setting';
@endphp
@section('content')

    <div class="page-heading">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="page-title">{{ $pageTitle??'' }}</h1>
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
                            <h6>General Settings:</h6>

                        </div>
                        <form action="{{ route('general.update') }}" id="settingsFrom" autocomplete="off" role="form" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="site_title">Organization Name <strong class="text-danger">*</strong></label>
                                        <input type="text" name="site_title" id="site_title"
                                               class="form-control @error('site_title') is-invalid @enderror"
                                               value="{{ setting('site_title') ?? old('site_title') }}"
                                               placeholder="Site Title">
                                        @error('site_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="site_description">Short Description <strong class="text-danger">* (Try to keep in 160 characters)</strong></label>
                                        <textarea name="site_description" id="site_description"
                                                  class="form-control @error('site_description') is-invalid @enderror">{{ setting('site_description') ?? old('site_description') }}</textarea>
                                        @error('site_description')
                                        <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="website">Website <strong class="text-danger">*</strong></label>
                                            <input type="url" name="website" id="website"
                                                   class="form-control @error('website') is-invalid @enderror"
                                                   value="{{ setting('website') ?? old('website') }}"
                                                   placeholder="www.domain.com">
                                            @error('website')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="est_year">Established Year <strong class="text-danger">*</strong></label>
                                            <input type="text" name="est_year" id="est_year"
                                                   class="form-control number @error('est_year') is-invalid @enderror"
                                                   value="{{ setting('est_year') ?? old('est_year') }}"
                                                   placeholder="established Year">
                                            @error('est_year')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="site_phone">Phone <strong class="text-danger">*</strong></label>
                                            <input type="text" name="site_phone" id="site_phone"
                                                   class="form-control @error('site_phone') is-invalid @enderror"
                                                   value="{{ setting('site_phone') ?? old('site_phone') }}"
                                                   placeholder="site phone">
                                            @error('site_phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="site_email">E-mail <strong class="text-danger">*</strong></label>
                                            <input type="email" name="site_email" id="site_email"
                                                   class="form-control @error('site_email') is-invalid @enderror"
                                                   value="{{ setting('site_email') ?? old('site_email') }}"
                                                   placeholder="Site email">
                                            @error('site_email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="site_address">Address <strong class="text-danger">*</strong></label>
                                        <textarea name="site_address" id="site_address"
                                                  class="form-control @error('site_address') is-invalid @enderror">{{ setting('site_address') ?? old('site_address') }}</textarea>
                                        @error('site_address')
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
    <script type="text/javascript">

    </script>
@endpush


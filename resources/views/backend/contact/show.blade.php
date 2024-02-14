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

            </div>
        </div>
    </div>
    <div class="main-card mb-12 card">
        <div class="card-body">
            <div class="layout-content">

            {{--<button class="btn btn-primary float-right" onclick="window.print()">Print</button>--}}
            <!-- Content -->
                <div class="container flex-grow-1 container-p-y" id="section-to-print">
                    <!-- Header -->
                    <div class="container-m-nx container-m-ny theme-bg-white mb-4">
                        <div class="media col-md-12 col-lg-12 col-xl-12 mx-auto">
                            <div class="media-body">
                                <h4 class="font-weight-bold mb-4">Details Of {{ ucfirst($contact->name) }}</h4>
                            </div>
                        </div>
                    </div>
                    <!-- Header -->

                    <table style="width: 100%;" class="table table-hover table-striped table-bordered dataTable dtr-inline">
                        <thead>
                        <tr role="row">
                            <th>Key</th>
                            <th>Value</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Name</td>
                            <td>{{ $contact->name }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $contact->phone }}</td>

                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>{{ $contact->phone }}</td>
                        </tr>
                        
                        <tr>
                            <td>Message</td>
                            <td>{{ $contact->message }}</td>
                        </tr>

                        </tbody>
                    </table>

                </div>
                <!-- / Content -->

            </div>
        </div>
    </div>
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/backends/vendor/dropify-master/dist/css/dropify.min.css') }}">
@endpush
@push('js')
    <script src="{{ asset('assets/backend/vendors/dropify-master/dist/js/dropify.min.js') }}"></script>
@endpush
@push('customJs')
    <script type="text/javascript">
        $('.dropify').dropify();
    </script>
@endpush

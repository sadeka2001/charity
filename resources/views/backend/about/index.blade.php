@extends('backend.layouts.master')
{{-- @php
    $pageTitle = $page_title;
@endphp --}}
@section('content')
    <div class="page-heading">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="page-title">{{ $pageTitle ?? '' }}</h1>
            </div>
            <div class="col-sm-6 pt-4 text-right">
                <a href="{{ route('about.create') }}" class="btn bg-primary text-white"><i class="fa fa-plus-circle"></i> Add
                    New</a>

            </div>
        </div>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox rounded">
            <div class="ibox-body">
                <div class="row">
                    <div class="col-sm-12">
                        <table style="width: 100%;" id="example"
                            class="table table-hover table-striped table-bordered dataTable dtr-inline" role="grid"
                            aria-describedby="example_info">
                            <thead>
                                <tr role="row">
                                    <th>S/N</th>
                                    <th>About Image</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Mission</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($abouts as $key=>$about)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td width="10%">
                                            <img src="{{ asset($about->image) }}" width="100%" alt="thumbnail">
                                        </td>
                                        <td>{{ $about->title }}</td>
                                        <td>{!! $about->description !!}</td>
                                        <td>{!! $about->mission !!}</td>
                                        <td>
                                            @if ($about->deleted_at == null)
                                                <span class="badge bg-success">Published</span>
                                            @else
                                                <span class="badge bg-danger">Drafted</span>
                                            @endif
                                        </td>

                                        <td style="text-align: center" width="12%">
                                            <a href="{{ route('about.edit', $about->id) }}"
                                                class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                            <form id="delete-form-{{ $about->id }}"
                                                action="{{ route('about.destroy', $about->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Are you sure to permanently delete?')"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <link href="{{ asset('assets/backend/vendors/DataTables/datatables.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/backend/vendors/sweet-alert/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush
@push('js')
    <script src="{{ asset('assets/backend/vendors/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/backend/vendors/sweet-alert/sweetalert2.all.min.js') }}"></script>
@endpush
@push('customCSS')
@endpush
@push('customJS')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endpush

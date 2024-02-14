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
                <a href="{{ route('video.create') }}" class="btn bg-primary text-white"><i class="fa fa-plus-circle"></i> Add
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
                                    <th>Gallery Video</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Goal</th>

                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($videos as $key=>$video)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        {{-- <td>
                                        <video width="200" height="200" controls>
                                            <source src="{{ $video->link }}" type="video/mp4">
                                            <source src="{{$video->link}}" type="video/ogg">
                                            Your browser does not support the video tag.link
                                          </video></td> --}}
                                          <td>{{$video->link}}</td>
                                        <td>{{ $video->title }}</td>
                                        <td>{!! $video->description !!}</td>
                                        <td>{{ $video->goal }}</td>

                                        <td>
                                            @if ($video->deleted_at == null)
                                                <span class="badge bg-success">Published</span>
                                            @else
                                                <span class="badge bg-danger">Drafted</span>
                                            @endif
                                        </td>

                                        <td style="text-align: center" width="12%">
                                            <a href="{{ route('video.edit', $video->id) }}"
                                                class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                            <form id="delete-form-{{ $video->id }}"
                                                action="{{ route('video.destroy', $video->id) }}" method="POST"
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

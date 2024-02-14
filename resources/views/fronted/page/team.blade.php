@extends('fronted.layout.master')
@section('content')
    <div class="pager-header">
        <div class="container">
            <div class="page-content">
                <h2>Our Volunteers</h2>
                <p>Help today because tomorrow you may be the one who <br>needs more helping!</p>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Voluenteers</li>
                </ol>
            </div>
        </div>
    </div><!-- /Page Header -->

    <section class="team-section bg-grey bd-bottom padding">
        <div class="container">
            <div class="team-wrapper row">
                <div class="col-lg-12 sm-padding">
                    <div class="team-wrap row">
                        @forelse ($teams as $team)
                            <div class="col-md-3 xs-padding">
                                <div class="team-details">
                                    <img src="{{ asset($team->img) }}" alt="team">
                                    <div class="hover">
                                        <h3>{{ $team->name }}<span>{{ $team->designation }}</span></h3>
                                    </div>
                                </div>

                            </div>
                        @empty
                        @endforelse
                    </div>

                </div>

            </div>
        </div>
    </section><!-- /Team Section -->
@endsection

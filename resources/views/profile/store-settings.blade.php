@extends('layouts.tabler')

@section('content')
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-xl px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="user"></i></div>
                            Store - Settings
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-xl px-4 mt-4">
        @include('profile.component.menu')
        <hr class="mt-0 mb-4" />
        @include('partials.session')
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div>
                            <h3 class="card-title">
                                {{ __('Update Store Information') }}
                            </h3>
                        </div>
                    </div>

                    <x-form action="{{ route('broadcast.index') }}" method="POST">
                     
                    </x-form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-scripts')
    <script src="{{ asset('assets/js/img-preview.js') }}"></script>
@endpush

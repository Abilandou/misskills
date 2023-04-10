@extends('layouts.app')
@section('title', 'Contestants')
@section('content')

<div class="container">
    <div class="text-center contest-header">
        <div class="text-center">
            <img class="site-logo" src="{{ asset('public/assets/logo/logo.png') }}" alt="">
        </div>
        <div class="text-center">
            <h4>Miss Skills Festival 2023 Official Voting</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-sm-12">
        </div>
        <div class="col-lg-4"></div>
        <div class="col-lg-4 col-sm-12">
            <div class="search-const">
                {{-- <a href="{{ route('contestants.index') }}" class="btn vote-me-btn vote-user-detail mb-2">All Contestants</a> --}}
            </div>
        </div>
    </div>


    <div class="contestants text-center">

        <h1>SERVER ERROR</h1>
        <p>
            <small>
                Oops.. an error occured while trying to perform operation
            </small>
        </p>
        <a href="{{ route('contestants.index') }}" class="btn vote-me-btn vote-user-detail mb-2">Back to Contestants</a>

    </div>
</div>

@endsection


@extends('layouts.app')
@section('title', 'Contestants')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-4 col-sm-12"></div>
        <div class="col-lg-4">
            <div class="text-center p-3">
                <img class="site-logo" src="{{ asset('assets/logo/logo.png') }}" alt="">
            </div>
        </div>
        <div class="col-lg-4 col-sm-12">
            <div class="search-const">
                <form action="#">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search Contestant By Name...">
                 </form>
            </div>
        </div>
    </div>


    <div class="contestants">
        <div class="row" id="competitorContent">
            @forelse($users as $user)
                <div class="col-lg-4 mb-4 compete-search-item">
                    <div class="contestant-item p-2 bg-white">
                        <div class="const-header">
                            <div class="user-img">
                                <img src="{{ route('user.image',['filename'=>$user->image]) }}" alt="">
                            </div>
                            <div class="user-name">
                                <div class="vote-count-container p-2">
                                    <h6 class="vote-count">Votes: <b class="text-primary">250</b></h6>
                                </div>
                                <div>
                                    <h6>{{ $user->name }}</h6>
                                    <div class="card-body m-3">
                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#voteMeModal{{ $user->id }}">Vote Me</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="voteMeModal{{ $user->id }}" tabindex="-1" aria-labelledby="voteMeModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="voteMeModalLabel">Voting For: {{ $user->name }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('initialise.payment') }}" method="POST">
                            <div class="modal-body">
                                @csrf
                                <div class="mb-4">
                                    <label for="phone">Phone(Without Country Code)</label>
                                    <input type="text" name="phone" class="form-control">
                                </div>
                                <div>
                                    <label for="">Amount</label>
                                    <input type="number" min="100" step="100" max="100000" name="amount" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Continue</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>

            @empty
                <div class="container">
                    <p>No Contenstants Yet</p>
                </div>
            @endforelse
        </div>


    </div>
</div>

@endsection

@section('footer_script')

<script>
    $(document).ready(function(){
      $("#searchInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#competitorContent .compete-search-item").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
</script>

@endsection

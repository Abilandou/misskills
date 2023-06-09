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
            <div class="duration-time">
                <h6>Time Left: </h6>
                <div id="timer" class="d-flex">
                    <div id="days"></div>
                    <div id="hours" class="mx-2"></div>
                    <div id="minutes"></div>
                    <div id="seconds" class="ms-2"></div>
                  </div>
            </div>
        </div>
        <div class="col-lg-4"></div>
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
                                <a href="{{ route('user.show',['slug'=>$user->slug]) }}">
                                    <img src="{{ route('user.image',['filename'=>$user->image]) }}" alt="">
                                </a>
                            </div>
                            <div class="user-name">
                                <div class="vote-count-container p-2">
                                    @php
                                        $voteAmount =  array_sum(\App\Models\Vote::where('user_id', $user->id)->get()->pluck("amount")->toArray());
                                        $voteCount = ($voteAmount / 100);
                                    @endphp
                                    <h6 class="vote-count">Votes: <b class="vt-count">{{ $voteCount }}</b></h6>
                                </div>
                                <div>
                                    <a href="{{ route('user.show',['slug'=>$user->slug]) }}">
                                        <h6 class="text-dark contestant-name">{{ $user->name }}</h6>
                                    </a>
                                    <small class="mx-3 contestant-number">Contestant Number:

                                        <span class="contest">
                                            {{ $user->contestant_number <= 9 ? '0'.$user->contestant_number : $user->contestant_number }}
                                        </span>

                                    </small>
                                    <div class="card-body m-3">
                                        <a href="{{ route('user.show',['slug'=>$user->slug]) }}"><button class="btn btn-primary vote-me-btn">Vote Me</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="voteMeModal{{ $user->id }}" tabindex="-1" aria-labelledby="voteMeModalLabel" aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content modal-bg">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="voteMeModalLabel">Voting For: {{ $user->name }}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <small class="p-3 advice-to-user"></small>
                            <form action="{{ route('initialise.payment') }}" method="POST" id="vote-form">
                                <div class="modal-body">
                                    @csrf
                                    <input type="hidden" name="contestantId" value="{{ $user->id }}">
                                    <div class="mb-4">
                                        <label for="phone">Phone(MTN/ORANGE)
                                            <small>Without Country Code</small>
                                        </label>
                                        <input type="text" placeholder="E.g 673525807" name="phone" id="phone_number" class="form-control">
                                        <small class="phone-err text-danger"></small>
                                    </div>
                                    <div>
                                        <label for="">Number of Votes</label>
                                        <input type="number" min="1" id="number_of_votes" name="number_of_votes" class="form-control">
                                        <small class="number_of_votes-err text-danger"></small>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                                <button type="button"  onClick="vote()" class="btn btn-primary vote-btn vote-me-btn">Continue</button>
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
{{--
    window.location.replace('http://localhost/misskills/public/verify-nuopia/'+transaction_id);
     setInterval(function (){
                        window.location.href = "{{URL::to(`http://localhost/misskills/public/verify-nuopia/${transaction_id}`)}}"
                    }, 2000);
--}}
{{-- window.location.replace('http://localhost/misskills/public/verify-nuopia/'+transaction_id);  --}}
@endsection

@section('footer_script')

<script>
    function makeTimer() {

//		var endTime = new Date("29 April 2018 9:56:00 GMT+01:00");
    var endTime = new Date("24 April 2023 23:59:00 GMT+1:00");
        endTime = (Date.parse(endTime) / 1000);

        var now = new Date();
        now = (Date.parse(now) / 1000);

        var timeLeft = endTime - now;

        var days = Math.floor(timeLeft / 86400);
        var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
        var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
        var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

        if (hours < "10") { hours = "0" + hours; }
        if (minutes < "10") { minutes = "0" + minutes; }
        if (seconds < "10") { seconds = "0" + seconds; }

        $("#days").html(days + "<span>Days</span>");
        $("#hours").html(hours + "<span>Hours</span>");
        $("#minutes").html(minutes + "<span>Minutes</span>");
        $("#seconds").html(seconds + "<span>Seconds</span>");

}

setInterval(function() { makeTimer(); }, 1000);
</script>

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

{{-- Voting --}}

<script>
    function vote()
   {

        sessionStorage.clear();

       var phone = $("#phone_number");
       var number_of_votes  = $("#number_of_votes");


       if(phone.val() == "" ){
           $(".phone-err").html("Phone field is required").css('background-color', 'white');
           $("#phone_number").addClass("is-invalid");
           $("#number_of_votes").removeClass("is-invalid");
           return false;

           // $(".login_error").html("Email or Password cannot be empty").fade("slow");
       }

       else if(phone.val().length < 9) {
            $(".phone-err").html("Phone must be atleast 9 characters").css('background-color', 'white');
            $("#phone_number").addClass("is-invalid");
            $("#number_of_votes").removeClass("is-invalid");
           return false;
       }

       else if(number_of_votes.val() == ""){
           $(".number_of_votes-err").html("number_of_votes field is required").css('background-color', 'white');
           $(".phone-err").html("");
            $("#number_of_votes").addClass("is-invalid");
            $("#phone_number").removeClass("is-invalid");
            return false;
       }
       else{
           $(".phone-err, .number_of_votes-err").html("");
           $(".advice-to-user").html("Please do not leave this page until you are redirected to make your vote count.").css('color', '#ff4089');
           $("#phone_number, #number_of_votes").removeClass("is-invalid");
           $(".vote-btn").html("processing...").css('color', "#fff");
           $(".vote-btn").prop('disabled', true);

           var data = $("#vote-form").serialize();

           $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });

           $.ajax({
               type: 'POST',
               url: '{{ route('initialise.payment') }}',
               data: data,

               success: function(response){
                    sessionStorage.setItem("transactionId", response.transactionId);
                    sessionStorage.setItem("userId", response.userId);


                   if(response.status == "success")
                   {

                    let transaction_id =  sessionStorage.getItem("transactionId");
                    let user_id =  sessionStorage.getItem("userId");


                    //Redirect User if success
                    setInterval(() => {

                        window.location.href = "{{url('http://localhost/misskills/public/verify-nuopia')}}" + "/" + transaction_id + "/" + user_id ; // maybe you can discard the slash after room_detail.

                    }, 2000);



                   }else if (response == "transaction-not-initiated"){
                       $(".phone-err").html("Erro Initiating a transaction").css('color', '#ff4089');
                       $("#email_login").addClass("is-invalid");
                       $(".vot-btn").prop('disabled', false);
                       $(".vot-btn").html("Continue").css('color', "#fff");
                       return false;
                   }



               },
               error: function(reponse)
               {
                   console.log(response);
               }
           });


       }
   }
</script>

@endsection

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
                                    @php
                                        $voteAmount =  array_sum(\App\Models\Vote::where('user_id', $user->id)->get()->pluck("amount")->toArray());
                                        $voteCount = $voteAmount / 100;
                                    @endphp
                                    <h6 class="vote-count">Votes: <b class="text-primary">{{ $voteCount }}</b></h6>
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
                <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="voteMeModal{{ $user->id }}" tabindex="-1" aria-labelledby="voteMeModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
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
                                    <label for="phone">Phone(MTN/ORANGE)</label>
                                    <small>Without Country Code</small>
                                    <input type="text" placeholder="E.g 673525807" name="phone" id="phone" class="form-control">
                                    <small class="phone-err text-danger"></small>
                                </div>
                                <div>
                                    <label for="">Number of Votes</label>
                                    <input type="number" min="1" id="number_of_votes" name="number_of_votes" class="form-control">
                                    <small class="number_of_votes-err text-danger"></small>
                                </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button"  onClick="vote()" class="btn btn-primary vote-btn">Continue</button>
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

    const testEr = document.getElementById('test');

        sessionStorage.clear();

       var phone = $("#phone");
       var number_of_votes  = $("#number_of_votes");


       if(phone.val() == "" ){
           $(".phone-err").html("Phone field is required");
           $("#phone").addClass("is-invalid");
           $("#number_of_votes").removeClass("is-invalid");
           return false;

           // $(".login_error").html("Email or Password cannot be empty").fade("slow");
       }

       else if(phone.val().length < 9) {
            $(".phone-err").html("Phone must be atleast 9 characters");
            $("#phone").addClass("is-invalid");
            $("#number_of_votes").removeClass("is-invalid");
           return false;
       }

       else if(number_of_votes.val() == ""){
           $(".number_of_votes-err").html("number_of_votes field is required");
           $(".phone-err").html("");
            $("#number_of_votes").addClass("is-invalid");
            $("#phone").removeClass("is-invalid");
            return false;
       }
       else{
           $(".phone-err, .number_of_votes-err").html("");
           $(".advice-to-user").html("Please do not leave this page until you are redirected to make your vote count.").css('color', '#ff4089');
           $("#phone, #number_of_votes").removeClass("is-invalid");
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

@extends("layouts.main")

@section("content")
    <div class="row">
        <div class="col-sm-12">
            <div class="full-right">
                <h3> credits </h3>
            </div>
        </div>
    </div>

    <div class="card-deck w-100 mx-0 px-3">
        @foreach($evidences as $ev_value )
           
            <div class="card-header">
                <div class="user_info">
                    <h5> {{ $ev_value->learner->username }} </h5>
                    <!-- img of the user-->
                </div>
                
                <h5 class"created_at">{{ $ev_value->created_at }} </h5>
            </div>

            <div class="card-body">{{ $ev_value->description }} </div>



            <div class="behavior"> {{ $ev_value->credit->behavior->first_lang_behavior }} </div>
           <br>
            <div class="module">,  , {{ $ev_value->credit->behavior->group_statement->objective->first_lang_objective }} </div>
          

                @if($ev_value->type=='image')
                    <img class="card-img-bottom" src="{{  asset('/storage/'.$ev_value->link) }}" alt="Card image cap" >
                @elseif($ev_value->type=='video')

                        <video class="card-img-bottom"  controls >
                            <source src="{{  asset('/storage/'.$ev_value->link) }}" type="video/mp4"></source>
                        </video>

                @elseif($ev_value->type=='pdf')
                        <a class="card-img-bottom" href="{{  asset('/storage/'.$ev_value->link) }}" download>    <h4> {{$ev_value->name  }}</h4></a>

                @endif
        @endforeach
    </div>
     


@endsection

@extends("layouts.main")

@section("content")
    <div class="row">
        <div class="col-sm-12">
            <div class="full-right">
                <h3> credits </h3>
            </div>
        </div>
    </div>

    <div class="card-deck">
        @foreach($credits as $key => $value )
           @if($key=='image')
                           <h3> Images </h3>
           @foreach($value as $evidence)

                <div class="card" >
                    <div class="card-body">
                        <img class="card-img-top" src="{{  asset('/storage/'.$evidence->link) }}" alt="Card image cap" >
                                                <h4> {{$evidence->name  }}</h4>

                    </div>
                </div>
            @endforeach

           @endif

           <br>
           @if($key=='video')
               <h3> Videos </h3>
           @foreach($value as $evidence)

                <div class="card" >
                    <div class="card-body">
                        <video class="card-img-top"  controls >
                            <source src="{{  asset('/storage/'.$evidence->link) }}" type="video/mp4"></source>
                        </video>
                            <h4> {{ $evidence->name }}</h4>


                    </div>
                   
                </div>
            @endforeach
           @endif
           <br>
           @if($key=='pdf')
               <h3> PDF </h3>

           @foreach($value as $evidence)

                <div class="card" >
                    <div class="card-body">
                        <a class="card-img-top" href="{{  asset('/storage/'.$evidence->link) }}" download>    <h4> {{$evidence->name  }}</h4>
 </a>
                    </div> 
                </div>
            @endforeach

           @endif
           
        @endforeach
    </div>
      <table class="table table-bordered">
       
        @foreach($progress as $key => $value )
            <tr>
                <td>{{$value->first_lang_behavior}}</td>
                <td>{{$value->second_lang_behavior}}</td>
                <td>{{$value->max_self}}</td>
                <td>{{$value->max_peer}}</td>
                <td>{{$value->max_mentor}}</td>
                <td>
                 <a class="btn btn-info btn-sm" href="{{route('credit.create',[$value->progress_id,$value->learner_id])}}">add credit
                        <i class="glyphicon glyphicon-th-large"></i></a>
            </td>
             </tr>
        @endforeach

    </table>


@endsection

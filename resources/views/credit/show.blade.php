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

        <div class="card" style="width:400px">
        <div class="card-body">
        <h4 class="card-title">
        @if ($value->credit_type =='0')
        it is self credit        
        @elseif ( $value->credit_type=='1')
                it is peer credit        
        @endif</h4>
        <p class="card-text">
        @if ($value->description ==null)
        there is no descrpition for this evedince 
        @else
        {{ $value->description }}
        @endif
        </p>
        </div>
            <img class="card-img-top" src="{{  asset('/storage/'.$value->link) }}" alt="Card image cap" >

        <div class="card-footer text-muted">
               Created at : {{ $value->created_at }}

        </div>  
        </div>
        @endforeach
    </div>

@endsection

@extends("layouts.main")

@section("content")
    <div class="row">
        <div class="col-sm-12">
            <div class="full-right">
                <h3> Tracks Which you can work on  </h3>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <tr>
            <th with="80px">No</th>
            <th>First Lang Statement</th>
            <th>Second Language Statement</th>
            <th>Achieved</th>
            <th> Status   </th>

        </tr>
        <?php  $no=1 ;?>
        @foreach($tracks as $key => $value )
            <tr>
                <td>{{$no++}}</td>
                <td>{{$value->first_lang_statement}}</td>
                <td>{{$value->second_lang_statement}}</td>
                @if ($value->achieved=='0')
                    <td> Not yet </td>
                @else 
                    <td>Done</td>
                @endif
                @if ($value->worked=='0')
                <td>
                        {{  $value->id}},{{ $value->statement_id}},{{$value->learner_id}} 
                    <a class="btn btn-primary btn-sm" href="{{route('progress.create',[$value->id,$value->statement_id,$value->learner_id ])}}">Start this challenge
                        <i class="glyphicon glyphicon-th-large"></i></a>
                </td>
                @else 
                    <td>You Have already worked on</td>
                @endif
            </tr>
        @endforeach

    </table>

@endsection

@extends("layouts.main")

@section("content")
    <div class="row">
        <div class="col-sm-12">
            <div class="full-right">
                <h3> Progress </h3>
            </div>
        </div>
    </div>


  <table class="table table-bordered">
        <tr>
            <th with="80px">No</th>
            <th>First Language Behavior</th>
            <th>Second Language Behavior </th>
            <th>Remainder Self Points</th>
            <th>Remainder Peer Points</th>
            <th>Remainder Mentor Points</th>
             <th>  </th>

        </tr>
        <?php  $no=1 ;?>
        @foreach($progress as $key => $value )
            <tr>
                <td>{{$no++}}</td>
                <td>{{$value->first_lang_behavior}}</td>
                <td>{{$value->second_lang_behavior}}</td>
                <td>{{$value->max_self}}</td>
                <td>{{$value->max_peer}}</td>
                <td>{{$value->max_mentor}}</td>
<td>
                 <a class="btn btn-info btn-sm" href="{{route('credit.create',[$value->progress_id,$value->learner_id])}}">add credit
                        <i class="glyphicon glyphicon-th-large"></i></a>
                 </td>
                <!--show evidance-->
            </tr>
        @endforeach

    </table>

@endsection

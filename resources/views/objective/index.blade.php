@extends("layouts.main")

@section("content")
    <div class="row">
        <div class="col-sm-12">
            <div class="full-right">
                <h3> Objectives </h3>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <tr>
            <th with="80px">No</th>
            <th>Topic ID</th>
            <th>First Language Objective</th>
            <th>Second Language Objective</th>
            <th>Created at</th>
            <th>updated at</th>
            <th with="140px" class="text-center">
            </th>
        </tr>
        <?php  $no=1 ;?>
        @foreach($objectives as $key => $value )
            <tr>
                <td>{{$no++}}</td>
                <td>{{$value->topic_id}}</td>
                <td>{{$value->first_lang_objective}}</td>
                <td>{{$value->second_lang_objective}}</td>
                <td>{{$value->created_at}}</td>
                <td>{{$value->updated_at}}</td>
                <td>

                    <a class="btn btn-primary btn-sm" href="{{route('statements.index',$value->id)}}">Show statements
                        <i class="glyphicon glyphicon-th-large"></i></a>
                </td>
            </tr>
        @endforeach

    </table>

@endsection


@extends("layouts.main")

@section("content")
    <div class="row">
        <div class="col-sm-12">
            <div class="full-right">
                <h3> Statements </h3>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <tr>
            <th with="80px">No</th>
            <th>First Language Statments</th>
            <th>Second Language Statments</th>
            <th>Level</th>
            <th>Prerequisite ID</th>
            <th>Require Points</th>
            <th>Created at</th>
            <th>updated at</th>
            <th with="140px" class="text-center">
                <a href="{{route('statement.create', $objective_id)}}" class="btn btn-success btn-sm">create </a>
            </th>
        </tr>
        <?php  $no=1 ;?>
        @foreach($statements as $key => $value )
            <tr>
                <td>{{$no++}}</td>
                <td>{{$value->first_lang_statement}}</td>
                <td>{{$value->second_lang_statement}}</td>
                <td>{{$value->level_id}}</td>
                <td>{{$value->pre_requisite}}</td>
                <td>{{$value->require_points}}</td>
                <td>{{$value->created_at}}</td>
                <td>{{$value->updated_at}}</td>
                <td>
                <a class="btn btn-info btn-sm" href="{{route('statement.edit',$value->id)}}">edit
                        <i class="glyphicon glyphicon-th-large"></i></a>
                    <form action="{{url('statements/destroy', [ $objective_id , $value->id])}}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-danger btn-sm" value="Delete"/>
                    </form>
                    <a class="btn btn-primary btn-sm" href="{{route('behaviors.index',$value->id)}}">Show Behaviors
                        <i class="glyphicon glyphicon-th-large"></i></a>
                
                </td>
            </tr>
        @endforeach

    </table>

@endsection

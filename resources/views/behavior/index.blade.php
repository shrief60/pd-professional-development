@extends("layouts.main")

@section("content")
    <div class="row">
        <div class="col-sm-12">
            <div class="full-right">
                <h3> Behaviors </h3>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <tr>
            <th with="80px">No</th>
            <th>First Language Behavior</th>
            <th>Second Language Behavior</th>
            <th>Max Self</th>
            <th>Max Peer</th>
            <th>Max Mentor</th>
            <th>Created at</th>
            <th>updated at</th>
            <th with="140px" class="text-center">
                <a href="{{route('behavior.create', $statement_id)}}" class="btn btn-success btn-sm">create </a>
            </th>
        </tr>
        <?php  $no=1 ;?>
        @foreach($behaviors as $key => $value )
            <tr>
                <td>{{$no++}}</td>
                <td>{{$value->first_lang_behavior}}</td>
                <td>{{$value->second_lang_behavior}}</td>
                <td>{{$value->max_self}}</td>
                <td>{{$value->max_peer}}</td>
                <td>{{$value->max_mentor}}</td>
                <td>{{$value->created_at}}</td>
                <td>{{$value->updated_at}}</td>
                <td>
                <a class="btn btn-info btn-sm" href="{{route('behavior.edit',$value->id)}}">edit
                        <i class="glyphicon glyphicon-th-large"></i></a>
                    <form action="{{url('behaviors/destroy', [ $statement_id , $value->id])}}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-danger btn-sm" value="Delete"/>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>

@endsection



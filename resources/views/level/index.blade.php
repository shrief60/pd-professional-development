@extends("layouts.main")

@section("content")
    <div class="row">
        <div class="col-sm-12">
            <div class="full-right">
                <h3> Levels </h3>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <tr>
            <th with="80px">No</th>
            <th>First Language Level Name</th>
            <th>Second Language Level Name</th>
            <th>Self Weight</th>
            <th>Peer Weight</th>
            <th>Mentor Weight</th>
            <th>Created at</th>
            <th>updated at</th>
            <th with="140px" class="text-center">
                <a href="{{route('level.create')}}" class="btn btn-success btn-sm">create </a>
            </th>
        </tr>
        <?php  $no=1 ;?>
        @foreach($levels as $key => $value )
            <tr>
                <td>{{$no++}}</td>
                <td>{{$value->first_lang_level_name}}</td>
                <td>{{$value->second_lang_level_name}}</td>
                <td>{{$value->self_weight}}</td>
                <td>{{$value->peer_weight}}</td>
                <td>{{$value->mentor_weight}}</td>
                <td>{{$value->created_at}}</td>
                <td>{{$value->updated_at}}</td>
                <td>
                <a class="btn btn-info btn-sm" href="{{route('level.edit',$value->id)}}">edit
                        <i class="glyphicon glyphicon-th-large"></i></a>
                    <form action="{{url('levels/destroy', [$value->id])}}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-danger btn-sm" value="Delete"/>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>

@endsection

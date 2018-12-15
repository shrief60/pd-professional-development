@extends("layouts.main")

@section("content")
    <div class="row">
        <div class="col-sm-12">
            <div class="full-right">
                <h3> Topics </h3>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <tr>
            <th with="80px">No</th>
            <th>First Language Name</th>
            <th>Second Language Name</th>
            <th>First Language Descreption</th>
            <th>Second Language Descreption</th>
            <th>Created at</th>
            <th>updated at</th>
            <th with="140px" class="text-center">
                <a href="{{route('topic.create')}}" class="btn btn-success btn-sm">create </a>
            </th>
        </tr>
        <?php  $no=1 ;?>
        @foreach($topics as $key => $value )
            <tr>
                <td>{{$no++}}</td>
                <td>{{$value->first_lang_major_name}}</td>
                <td>{{$value->second_lang_major_name}}</td>
                <td>{{$value->first_lang_desc}}</td>
                <td>{{$value->second_lang_desc}}</td>
                <td>{{$value->created_at}}</td>
                <td>{{$value->updated_at}}</td>
                <td>
                <a class="btn btn-info btn-sm" href="{{route('topic.edit',$value->id)}}">edit
                        <i class="glyphicon glyphicon-th-large"></i></a>
             
                    <form action="{{url('topics/destroy', [$value->id])}}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-danger btn-sm" value="Delete"/>
                    </form>
                    <a class="btn btn-primary btn-sm" href="{{route('objectives.show',$value->id)}}">Show Objectives
                        <i class="glyphicon glyphicon-th-large"></i></a>
                </td>
            </tr>
        @endforeach

    </table>

@endsection


@extends("layouts.main")

@section("content")
    <div class="row">
        <div class="col-sm-12">
            <div class="full-right">
                <h3> FrameWork </h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="full-right">
                <h3> Opened </h3>
            </div>
        </div>
    </div>
    
    <table class="table table-bordered">
        <tr>
            <th with="80px">No</th>
            <th>First Language Statments</th>
            <th>Second Language Statments</th>
            <th with="140px" class="text-center">
                    Status
            </th>
        </tr>
        <?php  $no=1 ;?>
        @foreach($tracks as $key => $value )
            <tr>
                <td>{{$no++}}</td>
                <td>{{$value->first_lang_statement}}</td>
                <td>{{$value->second_lang_statement}}</td>
                @if($value->worked =='0')
                <td>
                you can work
                </td>
                @else
                <td>
                you already work on
                </td>
               @endif           
            </tr>
        @endforeach
    </table>


   <div class="row">
        <div class="col-sm-12">
            <div class="full-right">
                <h3> Not Opened </h3>
            </div>
        </div>
    </div>
    
    <table class="table table-bordered">
        <tr>
            <th with="80px">No</th>
            <th>First Language Statments</th>
            <th>Second Language Statments</th>
            <th with="140px" class="text-center">
                    Status
            </th>
        </tr>
        <?php  $no=1 ;?>
        @foreach($statements as $key => $value )
            <tr>
                <td>{{$no++}}</td>
                <td>{{$value->first_lang_statement}}</td>
                <td>{{$value->second_lang_statement}}</td>
                <td>
                you can't work
                </td>               
            </tr>
        @endforeach
    </table>
@endsection

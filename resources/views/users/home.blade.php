@extends('layouts.main')
@section('content')
<!DOCTYPE html>
<html>

<head>

<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

	<meta name="csrf-token" content="{{ csrf_token() }}">
	 <meta charset="UTF-8">
	
  <script src="{{asset('js/friends/friends.js')}}"></script>
    <script src="{{asset('js/friends/quests.js')}}"></script>
    

	<title></title>
</head>
<body >
	<button id="comunity">Community</button>
	
<div id="output" style="float: right;width:25%;height: 370px; margin-right: 20px;display: none;position: relative;">

	<div class="child" style="display: block;">
		<span class="avater"></span>
		<span class="name"></span>
		<br>
		<span class="email"></span>
		
	</div>
	<a href="#" style="float: right;position: absolute;top: 280px;right: 0px; " id="showAll"  data-toggle="modal" data-target="#myModal">
	show all
			</a>

	<div style="position: absolute;right: 0px;bottom: 0px; width: 100%">
	<form id="formsearch">
    <input type="text" name="search"  id="searchfriend" placeholder="search with username" style=" width: 60%">
    <button type="button" class="btn "  id="searchusers" data-toggle="modal" data-target=".bd-example-modal-sm"><i class="fas fa-search"></i></button>

</div>
	</div>
</form>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="float: right;" >&times;</span></button>
        <h4 style="float: left;" class="modal-title" id="myModalLabel">Your Friends</h4>
      </div>
      <div id="contentsa" class="modal-body">
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>






<!-- Small modal -->


<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div style="width: 430px" id="searchcontent" class="modal-content">
      
    </div>
  </div>
</div>

</body>
 <script>
	 	var username=`{{Auth::guard('learner')->user()->username}}`;
	
	 </script>
<script src="{{asset('js/friends/usersearch.js')}}"></script>
</html>
@endsection

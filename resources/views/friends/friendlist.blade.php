
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<title>viewpage</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	 <meta charset="UTF-8">
	<title></title>
</head>
<body>
	@if(isset($messages))
<span style="margin-left: 500px;font-size:50px;color: #ccc ">{{$messages}}</span>
@endif
@if(isset($myfriends))
<div style="width: 800px;margin-left: 270px;margin-top: 50px;">
@foreach($myfriends as $myfriend)

	<br>
	<span style="float:left;font-size: 20px " >{{$myfriend[0]->name}}</span>
	<br>
	<div  id="friendy" style="float: right;" class="btn-group">
  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    صديق
  </button>
  <div style="text-align: center;" class="dropdown-menu">
    <a  id="{{$myfriend[0]->id}}" style="text-align: center;" class="dropdown-item dele" href="#">إلغاء الصداقة</a>
</div>
	<span id="sucessspan"  style="color: green;float: right;"></span>
	<span id="sapnmessage" style="color: red;float: right;"></span>
	<form>
		<input type="hidden" name="name" value="{{$myfriend[0]->id}}" class="hiddenvalue">
	</form>
</div>
@endforeach
@endif
</body>
<script>
		$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
		var my_id=@json(Auth::guard('learner')->id());
		
		$('.dele').click(function(e){
			e.preventDefault()
		var request_to=$(this).attr("id")
		var friend_id=$('.hiddenvalue').val();
		var frdata={
			'learner_id':my_id,
			'friend_id':request_to
		}

		$.ajax({
				type:'POST',
				url:'/frienddelete',
				data:JSON.stringify(frdata),
				dataType:'json',
				headers:{
					'Content-Type':'application/json'
				},
				success:function(response){
					cosole.log(response)
					window.location.href ='/friendlist/'+'my_id';
				}
			});
			})
</script>
</html>

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
@if(isset($message))
<span style="margin-left: 500px;font-size:50px;color: #ccc ">{{$message}}</span>
@endif
@if(isset($userlists))
<div style="width: 800px;margin-left: 270px;margin-top: 50px;">
@foreach($userlists as $userlist)

	<br>

	<span style="float:left;font-size: 20px " >{{$userlist[0]->name}}</span>
<br>
	<button style="float: right;margin-left:5px;" id="dismiss" class="btn btn-primary">Ignore</button>
		
 	<button id="{{$userlist[0]->id}}" style="float: right;" class="btn btn-primary accept">Accept  </button>
	<span id="sucessspan"  style="color: green;float: right;"></span>
	<span id="sapnmessage" style="color: red;float: right;"></span>
	
	<form>
		<input type="hidden" name="name" value="{{$userlist[0]->id}}" class="hiddenvalue">
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
	var my_id=`<?php echo Auth::guard('learner')->id()?>`;
		
$('.accept').click(function(e){
	e.preventDefault()
		var request_to=$(this).attr("id")
		var friend_id=$('.hiddenvalue').val();
		var frdata={
			'learner_id':my_id,
			'friend_id':request_to
		}
		console.log(frdata)
	 	
 	console.log(request_to)
	$.ajax({
		type:'POST',
		url:'/friendadd',
		data:JSON.stringify(frdata),
		dataType:'json',
		headers:{
			'Content-Type':'application/json'
		},
		success:function(response){
			$('.accept').css('display','none');
			$('#dismiss').css('display','none');
			$('#friendy').css('display','block');
				console.log(frdata)

			$.ajax({
				type:'POST',
				url:'/deletequest',
				data:JSON.stringify(frdata),
				dataType:'json',
				headers:{
					'Content-Type':'application/json'
				},
				success:function(response){
					console.log(response)
					window.location.href="/listquests/+my_id"
				}
			})

		}
	})

});

</script>

</html>
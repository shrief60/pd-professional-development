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

@if(isset($seausers))
@foreach($seausers as $seauser)
<div style="width: 800px;margin-left: 270px;margin-top: 50px;">
	<span style="float:left;font-size: 20px " >{{$seauser->name}}</span>
	<button style="float: right;margin-left:5px;display: none;" id="deletebutt" class="btn btn-primary">إلغاء طلب الصداقة</button>
	<button id="addrequest" style="float: right;" class="btn btn-primary">إرسال طلب صداقة</button>
	<br>
	<span id="sucessspan"  style="color: green;float: right;"></span>
	<span id="sapnmessage" style="color: red;float: right;"></span>
	<form>
			<input type="hidden" name="name" value="{{$seauser->id}}" class="hiddenvalue">

		<input type="hidden" name="name" value="{{$seauser->username}}" class="hiddenvalues">
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

	function stringify(form){
				let data = {};
					//console.log($(form).find('input'))
				$(`${form} :input:not(button)`).each((i,input) => {
					//console.log(input)
					data[`${$(input).attr('name')}`] = $(input).val();
					$(input).prop('required');
				});
				return data;
}

	var learner_id=@json(Auth::guard('learner')->id());
	var friend_id=$('.hiddenvalue').val();
	var searchinput=stringify('#searchform');
	var datalist={
		'learner_id':learner_id,
		'friend_id':friend_id
	}
	console.log(datalist);
	// $('#gosearch').click(function(){
	 	
	// 	$seav={
	// 		'search':$seacfs
	// 	}
	// 	console.log($seacfs)
	// 	$.ajax({
	// 		type:"POST",
	// 		url:'/checkfriend',
	// 		data:JSON.stringify($seav),
	// 		dataType:'json',
	// 		headers:{
	// 			'Content-Type':'application/json'
	// 		},
	// 		success:function(response){
	// 			console.log(response)
	// 		}
	// 	});

	// })
	  var username=`{{Auth::guard('learner')->user()->username}}`;
	  
	  var searcheduser=$('.hiddenvalues').val()
	  console.log(searcheduser)
	if(searcheduser===username){
		$('#addrequest').css('display','none');

	}else{

	$('#addrequest').click(function(){
			
			$.ajax({
					type:"POST",
					url:'/checkquest',
					data:JSON.stringify(datalist),
					dataType:'json',
					headers:{
						'Content-Type':'application/json'
					},
					success:function(response){
						if(response[0]!=null){
							$('#sapnmessage').html("لقد ارسلت له طلب صداقة من قبل");
							$('#sapnmessage').css('display','block')
							$('#deletebutt').css('display','block')
							$('#addrequest').css('display','none')
							$('#sucessspan').html("");
						}
						else{
							$.ajax({
								type:'POST',
								url:'addquest',
								data:JSON.stringify(datalist),
								dataType:'json',
								headers:{
									'Content-Type':'application/json'
								},
								success:function(response){
									$('#sucessspan').html("تم ارسال طلب الصداقة بنجاح");
								}
							});

						}
					}
					
					});		


});}
</script>

<script>
$('#deletebutt').click(function(){
	$.ajax({
		type:'POST',
		url:'/deletequest',
		data:JSON.stringify(datalist),
		dataType:'json',
		headers:{
			'Content-Type':'application/json'
		},
		success:function(response){
			$('#addrequest').css('display','block');
			$('#deletebutt').css('display','none');
			$('#sapnmessage').css('display','none');

		}
	});

});	

		</script>
</html>
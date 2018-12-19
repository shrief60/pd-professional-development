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
</head>
<body>
	<nav style="background-color: #aaa " class="navbar navbar-light bg-light">
<a   style="font-size:18px;"class="navbar-brand"  href="/usersearch">Add Friends</a>
<a   style="font-size:18px;"class="navbar-brand" id="friendslist" href="/friendlist/<?=Auth::guard('learner')->id()?>">Firendd List</a>
<a   style="font-size:18px;"class="navbar-brand" href="/listquest/<?=Auth::guard('learner')->id()?>">Friend requests </a>
</nav>



</body>
</html>
<script type="text/javascript">
	$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
	$('#showsearchdiv').click(function(){
		$('.searchform').css('display','block')

	});
</script>
<!-- <script type="text/javascript">
$('#gosearch').click(function(){
    var data=$('.datasearch').val();
    $.ajax({
    	type:'GET',
    	url:'/usersearch',
    	data:JSON.stringify(data),
    	dateType:'json',
    	headers:{
    		'Content-Type':'application/json'
    	},
    	success:function(response){
    		console.log(response);
    	}

    });
});

</script> -->
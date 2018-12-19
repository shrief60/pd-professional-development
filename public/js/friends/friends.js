
	
		$('#comunity').click(function(e){
			e.preventDefault()
			$('#output').css('display','block')
			// $('#comunity').prop('disabled', true);
		$.ajax({
			type:'POST',
			url:'/friendlist',
			dataType:'json',
			headers:{
				'Content-Type':'application/json',
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

			},
			success:function(response){
				//console.log(response)
				let friends = [];
				//let parsedResponse = JSON.parse(response);
				response.forEach(arr =>{
					arr.forEach(obj =>{
						friends.push(obj)
					})
				})
				console.log(response)
				$('.child').empty();
				let child3=`<div style="position:absolute";top:0>
					<span>YOUR FRIENDS<h6>${friends.length}</h6></spa>
				</div>`;
				let parent3=$('#output');
				parent3.append(child3)
				for(var i=0;i<4;i++){
					 console.log(i)
					// $('.avater').text(friends[i]['avater']);
					// $('.name').text();
					// $('.email').text();
					let child = `
		<div class="avater" style="float:left;margin-right:10px;"><img src="${friends[i]['avatar']}" style="width:50px;height:50px" ></div>
		<span style="float:left" class="name"><h3>${friends[i]['name']}</h3></span>
		<br>
		<span style="margin-left:-50px" class="email">${friends[i]['email']}</span>

		<br>
	</div>
	<br>
`;
let parent =$('.child'); 
parent.append(child);
}
$('#showAll').click(function(){
		$('#contentsa').empty();
		for(var i=0;i<friends.length;i++){
			let child2 = `<div class="child style="height:100%">
		<div class="avater" style="float:left;margin-right:10px;"><img src="${friends[i]['avatar']}" style="width:50px;height:50px" ></div>
		<span style="float:left" class="name"><h3>${friends[i]['name']}</h3></span>
		<br>
		<span style="margin-left:-60px" class="email">${friends[i]['email']}</span>
		<button style="float:right;" class="unfriend">Unfriend</button>
	</div>
		<br>
	`
let parent2=$('#contentsa');
parent2.append(child2);
		}

});
            }
				
			
			
			
		});
		});
		




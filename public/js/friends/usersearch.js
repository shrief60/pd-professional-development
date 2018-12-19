

$('#searchusers').click(function(){
        	 	console.log(username);
        	  var datafoundedTosearch={
        	  	'searched':$('#searchfriend').val()
        	  }
 				console.log(datafoundedTosearch)
			$.ajax({
            type:'POST',
            url:'/usersearch',
            data:JSON.stringify(datafoundedTosearch),
            dataType:'json',
            headers:{
                'Content-Type':'application/json',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      			  		    },
     			       success:function(response){
      			      	console.log(response)
                			$('#searchcontent').empty();
                                         let questchild=`
                                                        
                                                        <div  style="width: 400px;margin-top:50px">
                                                        <div style="width:50px;height:50px;float:left;margin-right:30px;margin-left:30px">
                                                        <img style="width:50px;height:50px" src="${response[0]['avatar']}">
                                                        </div>
                    <span style="float:left; " >${response[0]['name']}</span>

<button id="Ignore${response[0]['id']}" style="float: right;margin-left:5px; display:none" class="dismiss" >Ignore</button>
                        
                    <button id="${response[0]['id']}" style="float: right;" class="sendrequest">Send request  </button>                   <span id="sucessspan"  style="color: green;float: right;"></span>
                     <span id="sapnmessage" style="color: red;float: right;"></span>
                     </div>
                     <form>
                         <input type="hidden" name="name" value="${response[0]['id']}" class="hiddenvalue">
                     </form>
                     
                     <br>  
                     </div>
                                      `;
                    let searchparent=$('#searchcontent');
                                         searchparent.append(questchild);
           
                                if(response[0]['username']===username){
						$('.sendrequest').css('display','none');
						$('.dismiss').css('display','none');
					}
						 else{

	$(document).on('click','.sendrequest',function(){
				var	friendId=response[0]['id'];
					console.log(friendId)
			datalist={
				"friend_id":response[0]['id']
			}
			console.log(datalist)
		$.ajax({
	 				type:"POST",
					url:'/checkquest',
	 				data:JSON.stringify(datalist),
 				dataType:'json',
	 				headers:{
	 					'Content-Type':'application/json',
	 				 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

	 				},
	 				success:function(response){
	 					if(response[0]!=null){
	 						$('#sapnmessage').html("I've already sent him a friend request");
	 						$('#sapnmessage').css('display','block')
	 						$('.dismiss').css('display','block')
	 						$('.sendrequest').css('display','none')
	 						$('#sucessspan').html("");
	 					}
	 					else{
	 						$.ajax({
 							type:'POST',
	 							url:'addquest',
	 							data:JSON.stringify(datalist),
	 							dataType:'json',
	 							headers:{
	 								'Content-Type':'application/json',
	 								'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	 							},
	 							success:function(response){
	 								$('#sucessspan').html("Friend request send successfully ");
	 							}
	 						});

	 					}
	 				}
					
	 				});		
               })

            }
 }
})
 })
$(document).on('click','.dismiss',function(){
	$.ajax({
		type:'POST',
		url:'/deletequest',
		data:JSON.stringify(datalist),
		dataType:'json',
		headers:{
			'Content-Type':'application/json',
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

		},
		success:function(response){
			$('.sendrequest').css('display','block');
			$('.dismiss').css('display','none');
			$('#sapnmessage').css('display','none');

		}
	});

});	



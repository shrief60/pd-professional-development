 $(document).on('click','#dismiss',function(e){
 		e.preventDefault()

 var request_to=$(this).attr("id");
        var frdata={
            
            'friend_id':request_to
        }
          $.ajax({
                type:'POST',
                url:'/deletequest',
                data:JSON.stringify(frdata),
                dataType:'json',
                headers:{
                    'Content-Type':'application/json',
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(response){
                	  $('#Ignore'+request_to).css('display','none');
                      $('#'+request_to).css('display','none');
          
                }
            })
});
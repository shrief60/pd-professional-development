$(document).on('click','.accept', function(e){
        e.preventDefault()

        
        var request_to=$(this).attr("id");
        console.log(request_to)
         frdata={
            
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
            'Content-Type':'application/json',
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function(response){
            $('#'+request_to).css('display','none');
            $('#Ignore'+request_to).css('display','none')
                console.log(frdata)

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
                    console.log(response)
                }
            })

        }
    })


});

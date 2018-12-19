
   
         
    
        $('.listquests').click(function(){
         
        $.ajax({
            type:'POST',
            url:'/listquest',
            dataType:'json',
            headers:{
                'Content-Type':'application/json',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            },
            success:function(response){

                let quests = [];
                //let parsedResponse = JSON.parse(response);
                response.forEach(arr =>{
                    arr.forEach(obj =>{
                        quests.push(obj)
                    })
                })
                $('.modal-body').empty();
                for (var i = 0; i < quests.length; i++) {
                    
                     let questchild=`
                                       
                    <div style="width: 400px;">
                    <span style="float:left; " >${quests[i]['name']}</span>

                    <button id="Ignore${quests[i]['id']}" style="float: right;margin-left:5px;" class="dismiss" >Ignore</button>
                        
                    <button id="${quests[i]['id']}" style="float: right;" class="accept">Accept  </button>
                    <span id="sucessspan"  style="color: green;float: right;"></span>
                    <span id="sapnmessage" style="color: red;float: right;"></span>
                    </div>
                    <form>
                        <input type="hidden" name="name" value="${quests[i]['id']}" class="hiddenvalue">
                    </form>
                    
                    <br>
                    `;
                    let questparent=$('.modal-body');
                    questparent.append(questchild);
                }   
            }

        })

                  

    })

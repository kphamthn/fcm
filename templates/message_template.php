<form action="middleware.php" method="post" class="">
<div class="col-lg-8 col-lg-offset-2">

  <div class="form-group">
    <label class="control-label">Send messages to:</label>
   
        <select id="names" name="names[]" class="form-control" multiple="multiple"></select>
 
  </div>
  
  <div class="form-group">
    <label class="control-label">Message:</label>
   
        <textarea id="message" name="message" class="form-control"></textarea>

  </div>
<div class="form-group text-center">
    <button type="submit" class="btn btn-default"><span class = "glyphicon glyphicon-envelope"></span> Send</button>

  <a href = "logout.php" class="btn btn-default"><span class = "glyphicon glyphicon-log-out"></span> Logout</a>
  </div>

  <div id="noti">
    
  </div>


</div>

</form>

  <script>
            db.createIndex({
                index: {fields: ['username']}
                }).then(function(){db.find({
                  selector: { type: 'user' },
                  fields:['_id','username', 'email']
                    }).then(function (result) {
                      console.log(result);
                          $('#names').select2();

                          var options = $('#names');
                          
                          $.each(result.docs, function() {
                              options.append($("<option />").val(this._id).text(this.username));
                          });
                  }).catch(function (err) {
                      
                  });
              });
            
              messaging.onMessage(function(payload) {
                console.log(payload);
                addNoti(payload.data.title, payload.data.text);
              });
              
              navigator.serviceWorker.addEventListener('message', function (event) {
                  data = JSON.parse(event.data);
                  addNoti(data.title, data.text);
              
              });
              
              function addNoti(title, text){
                 $("#noti").append(`
                          <div class="alert alert-warning alert-dismissible  show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>`+ title+`</strong> send a message: `+ text+`</div>`);
              }
  </script>
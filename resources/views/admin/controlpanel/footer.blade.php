<div>
      <footer>
        <div>
          <span> © 2020 </span>
        </div>
      </footer>
</div>

 <!-- Compiled and minified JavaScript -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
 
  <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
  
    <!-- preview image-->
    <script>
        function showPreview(event){
            if(event.target.files.length >0){
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
                preview.src = src;
                preview.style.display="block";
            }
        } 
    </script>
<!-- run editor-->
   <script>
    // We need to turn off the automatic editor creation first.
    CKEDITOR.disableAutoInline = true;

    CKEDITOR.replace('editor3', {
      extraPlugins: 'sourcedialog',
      removePlugins: 'sourcearea'
    });
  </script>

      
<script  type="text/javascript">
 var frmvalidator = new Validator("myform");
 frmvalidator.addValidation("image","req","Please enter image","extension=jpg|jpeg|png|JPG|JPEG|PNG");
 frmvalidator.addValidation("title","req",
		"enter title");
 frmvalidator.addValidation("company","req");
 frmvalidator.addValidation("apply_link","req");

 frmvalidator.addValidation("start_date","req","Please enter start_date");
 frmvalidator.addValidation("deadline","req","greaterThan start_date");

 frmvalidator.addValidation("filename","req","Please enter image","extension=pdf|zip|rar");

</script>


    <script>
$(document).ready(function(){
    
    $('.add_major').click(function(){
    // alert("hi");
     var el = this;
     var major_name = $('#major_name').val();
     var type = $('#type').val();
     let _url = `/addmajor`;

        if(major_name == "" )
        {
            $('#message').html('Please Fill in the Blanks ');
        }
        else
        {
            $.ajax({
              //  method="POST" action="/addmajor"
              url : _url,
              method : "POST",
              data : {major_name:major_name,type:type},
              success : function(data){ 
                alert(data);
                setInterval('refreshPage()', 900);
                
                } 
            });
        }
    }); //end add major
});
</script>
  </body>
</html>
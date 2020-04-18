<?php
//include "../../production/Administrator/saveimage.php";
?>
<html>
<body>
 <form enctype="multipart/form-data" method="post" id="uploadimage">
<input type="file" name="file">
<input type="submit" name="submit">
</form>

<script src="../../bower_components/jquery/dist/jquery.min.js"></script>

<script type="text/javascript">
	$('document').ready(function(){
		$('#uploadimage').on('submit', function(e){
      e.preventDefault();
      $.ajax({
             url:'saveimage.php',
             method: 'POST',
             data: new FormData(this),
             contentType: false,
             processData: false,
             success:function(data){
             	if(data=="success"){
             		alert("Image Uploaded Successfully...!!");
             	}
             	else{
             		alert("error");
             	}
             }
      });
  });
});
</script>
</body>
</html>
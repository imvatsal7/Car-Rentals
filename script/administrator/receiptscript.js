 $(document).ready(function(){
	  
	  function fetch_data()
	  {
		  $.ajax({
			 url:"../../production/administrator/clreceipt.php",
              method:"POST",
              success:function(data){
				  $("#displayRecords").html(data);
			  }			  
		  });
	  }
	  fetch_data();
  });
  function printDiv() {    
    var printContents = document.getElementById('printpage').innerHTML;
    var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print();
     document.body.innerHTML = originalContents;
    }
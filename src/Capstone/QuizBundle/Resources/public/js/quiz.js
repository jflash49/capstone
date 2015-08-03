$(document).ready(function(){
  alert("READY");
  console.log("READY");
});


var quest_type = new Array('visualization','classification','spatial','mathematical','logic','pattern recognition','verbal');
var qtype =new Array();

var request;

$("#answer").submit(function(){
  alert ("ajax");
  var $form = $(this);
  var $inputs = $form.find("input, select, button, textarea");
  var serializedData = $form.serialize();
  $inputs.prop("disabled", true);
  
  request = $.ajax({
    url:"quiz_answer",
    type: "post",
    data:serializedData
    });
  });
    
    
    }
    
</script>
function resetValues() {
    $('#printertype').empty();
    $('#printertype').append(new Option('Please select', '', true, true));	
    $('#printertype').attr("disabled", "disabled");	
	$('#printermodel').empty();
    $('#printermodel').append(new Option('Please select', '', true, true));	
    $('#printermodel').attr("disabled", "disabled");	
}


function populateComp(xmlindata) {

var mySelect = $('#manufacturer');
 $('#printertype').disabled = false;
$(xmlindata).find("Company").each(function()
  {
  optionValue=$(this).find("id").text();
  optionText =$(this).find("name").text();
   mySelect.append($('<option></option>').val(optionValue).html(optionText));	
  });
}

function populateType(xmlindata) {

var mySelect = $('#printertype');
$('#printertype').removeAttr('disabled');    
$(xmlindata).find("Printertype").each(function()
  {
  optionValue=$(this).find("id").text();
  optionText =$(this).find("name").text();
   mySelect.append($('<option></option>').val(optionValue).html(optionText));	
  });
}

function populateModel(xmlindata) {

var mySelect = $('#printermodel');;
 $('#printermodel').removeAttr('disabled');  
$(xmlindata).find("Printermodel").each(function()
  {
  optionValue=$(this).find("id").text();
  optionText =$(this).find("name").text();
   mySelect.append($('<option></option>').val(optionValue).html(optionText));	
});
}
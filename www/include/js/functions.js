function select_county(){
	var county = $("#jimbo").val();
	$.ajax({
		url: '../include/county.php',
		method: 'POST',
		data: 'county=' + county
	}).done(function(data){
		data = JSON.parse(data);
		var bunge = $('#bunge').empty();
		data.forEach(function(data){
			bunge.append('<option>' + data.constituency_name + '</option>')
		})
	})
}

function select_ward(){
	var constituency = $("#bunge").val();
	$.ajax({
		url: '../include/ward.php',
		method: 'POST',
		data: 'constituency=' + constituency
	}).done(function(data){
		data = JSON.parse(data);
		var wards = $('#ward').empty();
		data.forEach(function(data){
			wards.append('<option>' + data.ward + '</option>')
		})
	})
}

function loan_amount(){
		//var time = document.getElementById('duration').value;
		var principal = parseFloat(document.getElementById('principal').value);
		var interest = parseFloat(document.getElementById('interest').value);
		var fee = parseFloat(document.getElementById('processing_fee').value);
		var loan = principal+fee+(principal*interest);
		document.getElementById("loan_amount").value = loan;
	}

function getid(id){
	document.getElementById("uid").value = id;
}

function edit_loan(id){
	document.getElementById("lpid").value = id;
}

function edit_product(id){
	document.getElementById("loanid").value = id;
	var table  = document.getElementById('pager');
	for(var i = 1; i < table.rows.length; i++)
		{
			table.rows[i].onclick = function()
			{
				document.getElementById("uloanname").value = this.cells[0].innerHTML;
				document.getElementById("uloanlimit").value = this.cells[3].innerHTML;
				document.getElementById("udescription").value = this.cells[7].innerHTML;
				document.getElementById("uloaninterest").value = this.cells[8].innerHTML;
				document.getElementById("uloanduration").value = this.cells[9].innerHTML;
				document.getElementById("upenalty").value = this.cells[10].innerHTML;
				document.getElementById("uprocessing_fee").value = this.cells[11].innerHTML;
										
			};
		}
}


function TableFilter() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("pager");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
	td = tr[i].getElementsByTagName("td")[0];
	if (td) {
	  txtValue = td.textContent || td.innerText;
	  if (txtValue.toUpperCase().indexOf(filter) > -1) {
		tr[i].style.display = "";
	  } else {
		tr[i].style.display = "none";
	  }
	}       
  }
}

function check_payment() {
  var x = document.getElementById("payment");
  if (x.style.display === "none") {
	x.style.display = "block";
  } else {
	x.style.display = "none";
  }
}

function printDiv() {
	var divContents = document.getElementById("GFG").innerHTML;
	var a = window.open('', '', 'height=500, width=500', align='center');
	a.document.write('<html>');
	a.document.write('<body> <h1>SALES REPORT<br><hr>');
	a.document.write(divContents);
	a.document.write('</body></html>');
	a.document.close();
	a.print();
}

function DateFilteR(){
  var StartDate, EndDate, table,total, tvar, trvar, tr, check, i;
  StartDate = new Date(document.getElementById("min_date").value);
  EndDate = new Date(document.getElementById("max_date").value);
  table = document.getElementById("pager");
  tr = table.getElementsByTagName("tr");
  total = 0;
  for (let i=1; i < table.rows.length; i++){
	trvar = parseInt(table.rows[i].cells[4].textContent);
	check = table.rows[i].cells[5].textContent;
	check = check.replaceAll("-","/");
	check = new Date(check);
	total = total+trvar;
	if(check<StartDate || check>EndDate){
		trvar = parseInt(table.rows[i].cells[4].textContent);
		tr[i].style.display='none';
		total = total-trvar;
	  }
  }		  
  document.getElementById("tval").innerHTML = tvar-total;
}


function edit_stock(){
	var id = event.srcElement.id;
	var table  = document.getElementById('pager');
	for(var i = 1; i < table.rows.length; i++)
		{
			table.rows[i].onclick = function()
			{
				var img = this.cells[0].innerHTML;
				document.getElementById("uitemid").value = this.cells[0].innerHTML;
				document.getElementById("uitemname").value = this.cells[1].innerHTML;
				document.getElementById("ucategory").value = this.cells[2].innerHTML;
				document.getElementById("ubp").value = this.cells[3].innerHTML;
				document.getElementById("usp").value = this.cells[4].innerHTML;
				document.getElementById("udescription").value = this.cells[5].innerHTML;
			};
		}
}

function edit_user(){
	var id = event.srcElement.id;
	var table  = document.getElementById('pager');
	for(var i = 1; i < table.rows.length; i++)
		{
			table.rows[i].onclick = function()
			{
				document.getElementById("ufname").value = this.cells[0].innerHTML;
				document.getElementById("uid").value = this.cells[1].innerHTML;
				document.getElementById("uphone").value = this.cells[3].innerHTML;
				document.getElementById("uemail").value = this.cells[4].innerHTML;
			};
		}
}

function NotAllowed(){
	//alert('You are not allowed to perform this function');
	$('#AlertModal').appendTo("body").modal('show');
}

//Calendar
$(document).ready(function () {
    var calendar = $('#calendar').fullCalendar({
        editable: true,
        events: "../include/fetch-event.php",
        displayEventTime: false,
        eventRender: function (event, element, view) {
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        }
    });
});

function displayMessage(message) {
	    $(".response").html("<div class='success'>"+message+"</div>");
    setInterval(function() { $(".success").fadeOut(); }, 1000);
}
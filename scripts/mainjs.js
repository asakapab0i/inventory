
// hover in color
function over(_row){
  document.getElementById("row"+_row).style.backgroundColor="#ACF";
}

//hover out color
function out(_row){
  document.getElementById("row"+_row).style.backgroundColor="#006699";
//for product redirection
}
function clicked(_row){
	var x = _row;
	document.location.href=("../employee/product.php?pid="+ x);
	}
//add to input
function addtosale(_row){
	var x = _row;
	for(z=0;z<5;z++)
	{
		if(document.getElementById("id_array["+z+"]").value=="")
		{
			document.getElementById("id_array["+z+"]").value = document.getElementById("pid" + x).textContent;
			document.getElementById("name_array["+z+"]").value = document.getElementById("pname" + x).textContent;
			document.getElementById("price_array["+z+"]").value = document.getElementById("price" + x).textContent;	
			break;
		}
	}
	
	}

function addtoreturns(_row){
	var x = _row;
	
	for(z=0;z<5;z++)
	{
		if(document.getElementById("id_array["+z+"]").value=="")
		{
			document.getElementById("id_array["+z+"]").value = document.getElementById("pid" + x).textContent;
			document.getElementById("name_array["+z+"]").value = document.getElementById("pname" + x).textContent;
			document.getElementById("price_array["+z+"]").value = document.getElementById("unitprice" + x).textContent;
			document.getElementById("did_array["+z+"]").value = document.getElementById("did" + x).textContent;
			
			//document.getElementById("supplier["+z+"]").value = document.getElementById("supplier" + x).textContent;

			
			break;
		}
	}
	
	}


function total()
{
	
	for(x=0;x<5;x++)
	{
		if(document.getElementById("id_array["+x+"]").value!="")
		{
			var a = document.getElementById("qty_array["+x+"]").value;
			var b = document.getElementById("price_array["+x+"]").value;
			var t = a * b;
			var o = t.toFixed(2);
			document.getElementById("total_array["+x+"]").value = o;
		}
		
	}
	var sum=0;
	
	for(x=0;x<5;x++)
	{
		
		if(document.getElementById("total_array["+x+"]").value!="" && sum==0)	
		{
			sum = document.getElementById("total_array["+x+"]").value;
		}
		else if(document.getElementById("total_array["+x+"]").value!="")
		{
			temp = document.getElementById("total_array["+x+"]").value;
			temp2 = sum;
			temp = Number(temp);
			temp2 = Number(temp2);
			sum = temp + temp2;
		}
	}
	document.getElementById('due').value=sum;
}
function subtract()
{
	var change=0;
	var tempz = document.getElementById("due").value;
	tempz = Number (tempz);
	tempz2= document.getElementById("payment").value;
	tempz2= Number (tempz2);
	change = tempz2 - tempz;
	change = change.toFixed(2);
	document.getElementById("sukli").value= change;
}

function inSale()
{
	var w=0;
	for(x=0;x<5;x++)
	{
		if(document.getElementById("id_array["+x+"]").value!="")
		{
			w++;
		}
	}
	
	
	
	var myArray = new Array();
	for(x=0;x<w;x++)
	{
		if(document.getElementById("id_array["+x+"]").value!="")
		{
			myArray[x] = document.getElementById("id_array["+x+"]").value;
		}
	}
	var newString = myArray.join(";");
	document.getElementsByName('submit_id').item(0).value = newString;
	
	var qtyArray = new Array();
	
	for(x=0;x<w;x++)
	{
		if(document.getElementById("id_array["+x+"]").value!="")
		{
			qtyArray[x] = document.getElementById("qty_array["+x+"]").value;
		}
	}
	var qtyString = qtyArray.join(";");
	document.getElementsByName('submit_qty').item(0).value = qtyString;
	
	var priceArray = new Array();
	for(x=0;x<w;x++)
	{
		if(document.getElementById("id_array["+x+"]").value!="")
		{
			priceArray[x] = document.getElementById("total_array["+x+"]").value;
		}		
	}
	var priceString = priceArray.join(";");
	document.getElementsByName('submit_price').item(0).value = priceString;
	
	var unitArray = new Array();
	for(x=0;x<w;x++)
	{
		if(document.getElementById("id_array["+x+"]").value!="")
		{
			unitArray[x] = document.getElementById("price_array["+x+"]").value;
		}		
	}
	var unitString = unitArray.join(";");
	document.getElementsByName('submit_unit').item(0).value = unitString;
	
	var nameArray = new Array();
	for(x=0;x<w;x++)
	{
		if(document.getElementById("id_array["+x+"]").value!="")
		{
				nameArray [x]= document.getElementById("name_array["+x+"]").value;
		}
	}
	var nameString = nameArray.join(";");
	document.getElementsByName('submit_name').item(0).value = nameString;
	
	
	//var deliveryArray = new Array();
	//for(x=0;x<w;x++)
//	{
	//	if(document.getElementById("id_array["+x+"]").value!="")
	//	{
	//			deliveryArray [x]= document.getElementById("did_array["+x+"]").value;
	//	}
	//}
	//var newdeliveryArray = deliveryArray.join(";");
	//document.getElementsByName('submit_did').item(0).value = newdeliveryArray;
	
	
	

	
	
	document.getElementsByName('submit_total').item(0).value = document.getElementById('due').value;
	document.getElementsByName('submit_payment').item(0).value = document.getElementById('payment').value;
	document.getElementsByName('submit_sukli').item(0).value = document.getElementById('sukli').value;
	//document.getElementsByName('supplier2').item(0).value = document.getElementById('supplier').value;
	document.getElementsByName('count').item(0).value=w;
	document.pass_data.submit();

	
	
}
function inReturn()
{
	var w=0;
	for(x=0;x<5;x++)
	{
		if(document.getElementById("id_array["+x+"]").value!="")
		{
			w++;
		}
	}
		
	
	
	
	var myArray = new Array();
	for(x=0;x<w;x++)
	{
		if(document.getElementById("id_array["+x+"]").value!="")
		{
			myArray[x] = document.getElementById("id_array["+x+"]").value;
		}
	}
	var newString = myArray.join(";");
	document.getElementsByName('submit_id').item(0).value = newString;
	
	var qtyArray = new Array();
	
	for(x=0;x<w;x++)
	{
		if(document.getElementById("id_array["+x+"]").value!="")
		{
			qtyArray[x] = document.getElementById("qty_array["+x+"]").value;
		}
	}
	var qtyString = qtyArray.join(";");
	document.getElementsByName('submit_qty').item(0).value = qtyString;
	
	var priceArray = new Array();
	for(x=0;x<w;x++)
	{
		if(document.getElementById("id_array["+x+"]").value!="")
		{
			priceArray[x] = document.getElementById("total_array["+x+"]").value;
		}		
	}
	var priceString = priceArray.join(";");
	document.getElementsByName('submit_price').item(0).value = priceString;
	
	var unitArray = new Array();
	for(x=0;x<w;x++)
	{
		if(document.getElementById("id_array["+x+"]").value!="")
		{
			unitArray[x] = document.getElementById("price_array["+x+"]").value;
		}		
	}
	var unitString = unitArray.join(";");
	document.getElementsByName('submit_unit').item(0).value = unitString;
	
	var nameArray = new Array();
	for(x=0;x<w;x++)
	{
		if(document.getElementById("id_array["+x+"]").value!="")
		{
				nameArray [x]= document.getElementById("name_array["+x+"]").value;
		}
	}
	var nameString = nameArray.join(";");
	document.getElementsByName('submit_name').item(0).value = nameString;
	
		document.getElementsByName('submit_did').item(0).value = document.getElementById("did_array[0]").value;
	
	document.getElementsByName('submit_total').item(0).value = document.getElementById('due').value;
	document.getElementsByName('submit_payment').item(0).value = document.getElementById('payment').value;
	document.getElementsByName('submit_sukli').item(0).value = document.getElementById('sukli').value;
	
	document.getElementsByName('supplier2').item(0).value = document.getElementById('supplierId').value;
	
	document.getElementsByName('count').item(0).value=w;
	document.pass_data.submit();

	
	
}
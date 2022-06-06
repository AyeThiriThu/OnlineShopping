
$(document).ready(function(){

// showTable();
cartnoti();
$('.addtocart').on('click',function(){
	var id=$(this).data('id');
	var codeno=$(this).data('codeno');
	var name=$(this).data('name');
	var photo=$(this).data('photo');
	var price=$(this).data('price');
	var discount=$(this).data('discount');
	var item={
		id:id,
		codeno:codeno,
		name:name,
		price:price,
		photo:photo,
		discount:discount,
		qty:1
	}
	console.log(item);
	var itemString=localStorage.getItem("itemlist");
	console.log(itemString);
	var itemArray;
	if(itemString==null){
		itemArray=Array();
	}
	else{
		itemArray=JSON.parse(itemString);
	}
	var status=false;
	$.each(itemArray,function(i,v){
		if(id==v.id){
			status=true;
			v.qty++;
		}
	})
	if(!status){
		itemArray.push(item);
	}
	var itemData=JSON.stringify(itemArray);
	localStorage.setItem("itemlist",itemData);
	cartnoti();

});

//show Noti Count in Nav Bar
function cartnoti()
{
	var itemString=localStorage.getItem("itemlist");

	if(itemString){
		var itemArray=JSON.parse(itemString);
		noti=itemArray.length;

		$('.cartnoti').show();
		$('.cartnoti').html(noti);
	}
	else{
		$('.cartnoti').hide();
	}
}

// //Show Data From Localstorage and display with table




function showTable()
{
	var itemString=localStorage.getItem("itemlist");
	if (itemString){
		var itemArray=JSON.parse(itemString);
		if(itemArray != 0){
			var mytable=``;
			var total=0;
			$.each(itemArray,function(i,v){
				if(v){
					var  id=v.id;
					var codeno=v.codeno;
					var name=v.name;
					var price=v.price;
					var discount=v.discount;
					var photo=v.photo;
					var qty=v.qty
					if(discount>0){
						var unit=discount;
					}
					else{
						var unit=price;
					}
					var subtotal=unit*qty;
					mytable+=`<tr>
								<td>
									<button class="btn btn-outline-danger remove" data-id="${i}"><i class="fa fa-trash-o"></i></button>
								</td>
								<td>
									<img src="${photo}" class="img-fluid" style="width:50px; height:50px;">
								</td>
								<td>
									<p>${name}</p>
									<p>${codeno}</p>
								</td>
								<td>
									<button class="btn btn-outline-secondary plus_btn" data-id="${i}"><span>&#43;</span></button>
								</td>
								<td>
									<p>${qty}</p>
								</td>
								<td>
									<button class="btn btn-outline-secondary minus_btn" data-id="${i}"><span>&#8722;</span></button>
								</td>
								<td>`;
									if(discount>0){
										mytable+=`<h5 class="text-danger">${discount}Ks</h5>
										<p class="font-weight-lighter"><del>${price}Ks</del></p>`;			
									}else{
										mytable+=`<h5 class="text-danger">${price}Ks</h5>`;
									}
					mytable+=`</td> 
								<td><p>${subtotal}</p></td>
								</tr>`;
				}
					total+=subtotal++;

			});
			mytfoot=`<tr>
						<td colspan="8">
							<h3 class="text-right">Total:${total}</h3>
						</td>
					</tr>
					<tr>
						<td colspan="5">
							<textarea class="form-control" id="notes"></textarea>
						</td>
						<td colspan="3">
							<button class="btn btn-secondary btn-block checkoutbtn" style="background-color: #673AB7; border-color:#673AB7" data-total=${total}>Check Out</button>
						</td>
					</tr>`;
					//$('.shoppingcart_div').show();
					//$('.noneshoppingcart_div').hide();

					$('#mytable').html(mytable);
					$('#mytfoot').html(mytfoot);
							
				}
				else{
					console.log('hi');
					$('#mytable').html(`<tr>
						<td>
							Empty Cart
						</td>
					</tr>`);

					//$('.shoppingcart_div').show();
					//$('.noneshoppingcart_div').hide();
				}
		}
		
	}


	






//Add Quantity

$('#mytable').on('click','.plus_btn',function(){
	var id=$(this).data('id');
	var itemString=localStorage.getItem("itemlist");
	var itemArray=JSON.parse(itemString);
	$.each(itemArray,function(i,v){
		if(i==id){
			v.qty++;
		}
	})
	cart=JSON.stringify(itemArray);
	localStorage.setItem("itemlist",cart);
	showTable();
	cartnoti();	

});


//Sub Quantity
$('#mytable').on('click','.minus_btn',function(){
	//alert("minus_btn");
	var id=$(this).data('id');
	console.log(id);
	var itemString=localStorage.getItem("itemlist");
	var itemArray=JSON.parse(itemString);
	//console.log(typeof(itemArray));

	$.each(itemArray,function(i,v){
		console.log(v);
		if(i==id){
			v.qty--;
			if(v.qty==0){
				itemArray.splice(id,1);
			}
		}
	})
	cart=JSON.stringify(itemArray);
	localStorage.setItem("itemlist",cart);
	showTable();
	cartnoti();
});

showTable();
cartnoti();

//Remove Item
$('#mytable').on('click','.remove',function(){
	var id=$(this).data('id');
	var itemString=localStorage.getItem("itemlist");
	var itemArray=JSON.parse(itemString);
	itemArray.splice(id,1);
	var cart=JSON.stringify(itemArray);
	localStorage.setItem('itemlist',cart);
	showTable();
	cartnoti();

	
});

//check out

$('#mytfoot').on('click','.checkoutbtn',function(){
	var notes=$('#notes').val();
	var total=$(this).data('total');
	var itemString=localStorage.getItem('itemlist');
	var itemArray=JSON.parse(itemString);

	$.post('storeorder.php',{
		cart : itemArray,
		notes : notes,
		total : total
	},function(response){
		 //localstorage clear
		 localStorage.clear();
		 location.href="ordersuccess.php";
	});



});



})
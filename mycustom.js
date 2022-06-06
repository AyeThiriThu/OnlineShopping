function showTable()
{
	var itemString=localStorage.getItem("itemlist");
	if (itemString){
		var itemArray=JSON.parse(itemString);
		if(itemArray != 0){
			var mytable=``;
			var total=0;
			$each(itemArray,function(i,v){
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
									<button class="btn btn-outline-danger remove" data-id="${i}"><i class="fas fa-times"></i></button>
								</td>
								<td>
									<img src="${photo}" class="img-fluid" style="width:50px; height:50px;"
								</td>
								<td>
									<p>${name}</p>
									<p>${codeno}</p>
								</td>
								<td>
									<button class="btn btn-outline-secondary plus_btn" data-id="${i}"><i class="fas fa-plus"></i></button>
								</td>
								<td>
									<p>${qty}</p>
								</td>
								<td>
									<button class="btn btn-outline-secondary minus_btn" data-id="${i}"><i class="fas fa-minus"></i></button>
								</td>`;
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
			myfoot=`<tr>
						<td colspan="8">
							<h3 class="text-right">Total:${total}</h3>
						</td>
					</tr>
					<tr>
						<td colspan="5">
							<textarea class="form-control" id="notes"></textarea>
						</td>
						<td colspan="3">
							<button class="btn btn-secondary btn-block checkoutbtn" data-total=${total} style="background-color: #673AB7; border-color:#673AB7">Check Out</button>
						</td>
					</tr>`;
					$('.shoppingcart_div').show();
					$('.noneshoppingcart_div').hide();

					$('#shoppingcart_table').html(mytable);
					$('#shoppingcart_tfoot').html(myfoot);
							
				}
				else{
					$('.shoppingcart_div').show();
					$('.noneshoppingcart_div').hide();
				}
		}
		else{
			$('.shoppingcart_div').show();
			$('.noneshoppingcart_div').hide();
		}
	}

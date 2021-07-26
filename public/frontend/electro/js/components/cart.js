def();

	//var card_itemiteams=0;
	//localStorage.clickcount = Number(0);
	//setCookie("ADDTOCARDs", "[]", 1);
window.addEventListener('load', (event) => {
  console.log('page is fully loaded');
});


	function def() {
		// if (localStorage.clickcount) {
		// 	document.getElementById("header_mobile_cart").innerHTML =localStorage.clickcount; 
		// 	show_data();
		// } else {
		// 	document.getElementById("header_mobile_cart").innerHTML ="0";
		// 	show_data();
		// }
		//var user=getCookie("ADDTOCARD");
		var dt=[];
		dt = JSON.parse(getCookie("ADDTOCARD"));
		var ds = getCookie("ADDTOCARD");
		if(ds=="" || ds==null)
		{
			setCookie("ADDTOCARD", "[]", 1);
			// setCookie("card", "[]", 1);
		}
		document.getElementById("header_mobile_cart").innerHTML = dt!= ""? dt.length : '0';
		show_data();
		//_card();

		//document.getElementById("lblproducts").innerHTML ="<tr> <td>testing ok </td></tr> ";
	}
	// function _card() {
	// 	var dt =  JSON.parse(getCookie("ADDTOCARD"));
	// 	var __card = [];
	// 	if (dt != undefined) {		
	// 		for (i = 0; i < dt.length; i++) {
	
	// 			var __d = {
	// 				'pid':dt[i]['pid'], 
	// 				'qly':iteam(dt,dt[i]['pid']), 
	// 				'price':dt[i]['price']
	// 				};
	// 			__card.push(__d);
	// 		}
	// 	}
	// 	// setCookie("card", JSON.stringify(__card), 1);
		
	// }

	function add_to_card(id, title, image, price) {
		///frontend_upload_asset/product/product_image/
		//ID_P();
		//alert(price);
		var i = 0;
		var ds = getCookie("ADDTOCARD");
		var data = [];
		if(ds!="" && ds!=null){
			data = JSON.parse(getCookie("ADDTOCARD"));
		}
		
		var newdata = {
			"pid": id,
			"title": title,
			"image": image,
			"price": price
		};
		data.push(newdata);
		//alert(data[0]['pid']);
		//localStorage.setItem("ADDTOCARD", JSON.stringify(data));

		setCookie("ADDTOCARD", JSON.stringify(data), 1);

		//localStorage.setItem("addtocard", JSON.stringify(data));
		//show_data();
		def();
		//_card();
	}



	function show_data() {
		var dt =  JSON.parse(getCookie("ADDTOCARD"));
		//var __card=[];
		var suburl = $('meta[name="base_url"]').attr('content');

		if (dt != undefined) {
			//JSON.parse(localStorage.getItem("ADDTOCARD")); //JSON.parse(localStorage.getItem("addtocard"));
			var show="";var show_card =""; 
			var i = 0;var total=0;
			for (i = 0; i < dt.length; i++) {
				var count =0;total += parseInt(dt[i]['price']);
				if(back_check(dt,i,dt[i]['pid'])){
				show += '<div class="">\
                           <ul class="list-unstyled row mx-n2">\
                               <li class="px-2 col-auto">\
                                   <img class="img-fluid" src="'+suburl + dt[i]['image'] +'" style="height:75px;width:75px;" alt="Image Description">\
                               </li>\
                               <li class="px-2 col">\
                                   <h5 class="text-blue font-size-14 font-weight-bold">' + dt[i]['title'] + '</h5>\
                                   <span class="font-size-14">'+iteam(dt,dt[i]['pid'])+'x $' + dt[i]['price'] + '</span>\
                               </li>\
                               <li class="px-2 col-auto">\
                                   <a href="#" class="text-gray-90" onclick="delete_data(' + i + ')" ><i\
                                           class="ec ec-close-remove"></i></a>\
                               </li>\
                           </ul>\
                       </div>';

		//  var __d = {
		// 	 'pid':dt[i]['pid'], 
		// 	 'qly':iteam(dt,dt[i]['pid']), 
		// 	 'price':dt[i]['price']
		// 	 };
		//  __card.push(__d);



		// alert(show_quantity);
		 var tt =  iteam(dt,dt[i]['pid'])*dt[i]['price'];
		 show_card+= '<tr class="">\
		 <td class="text-center">\
			 <a href="#" onclick="delete_data(' + i + ')" class="text-gray-32 font-size-26">×</a>\
		 </td>\
		 <td class="d-none d-md-table-cell">\
			 <a href="product_details/'+dt[i]['pid']+'"><img class="img-fluid max-width-100 p-1 border border-color-1" style="height:100px;width:100px;" src="'+suburl + dt[i]['image'] + '" alt="Image Description"></a>\
		 </td>\
		 <td data-title="Product">\
			 <a href="product_details/'+dt[i]['pid']+'" class="text-gray-90">'+ dt[i]['title'] +'</a>\
		 </td>\
		 <td data-title="Price">\
			 <span class="">$ ' + dt[i]['price'] + '</span>\
		 </td>\
		 <td data-title="Quantity">\
			 <span class="sr-only">Quantity</span>\
			 <!-- Quantity -->\
			 <div class="border rounded-pill py-1 width-122 w-xl-80 px-3 border-color-1">\
				 <div class="js-quantity row align-items-center">\
					 <div class="col">\
						 <input class="js-result form-control h-auto border-0 rounded p-0 shadow-none" type="text" value="'+iteam(dt,dt[i]['pid'])+'">\
					 </div>\
					 <div class="col-auto pr-1">\
						 <a class="js-minus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0" href="javascript:;" onclick="delete_data(' + i + ')" >\
							 <small class="fas fa-minus btn-icon__inner"></small>\
						 </a>\
						 <a class="js-plus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0" href="javascript:;" onclick="add_to_card('+dt[i]['pid']+',\''+dt[i]['title']+'\',\''+dt[i]['image']+'\','+dt[i]['price']+')">\
							 <small class="fas fa-plus btn-icon__inner"></small>\
						 </a>\
					 </div>\
				 </div>\
			 </div>\
		 </td>\
		 <td data-title="Total">\
			 <span class="">$ '+tt+'</span>\
		 </td>\
</tr>';

// show_quantity+= '<div class="">\
// <div class="mb-3">\
// <h6 class="font-size-14">Quantity</h6>\
// <div class="border rounded-pill py-1 w-md-60 height-35 px-3 border-color-1">\
// <div class="js-quantity row align-items-center">\
// <div class="col">\
// 	<input class="js-result form-control h-auto border-0 rounded p-0 shadow-none" type="text" value="'+iteam(dt,dt[i]['pid'])+'">\
// </div>\
// <div class="col-auto pr-1">\
// 	<a class="js-minus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0" href="javascript:;" onclick="delete_data(' + i + ')">\
// 		<small class="fas fa-minus btn-icon__inner"></small>\
// 	</a>\
// 	<a class="js-plus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0" href="javascript:;" onclick="add_to_card('+dt[i]['pid']+',\''+dt[i]['title']+'\',\''+dt[i]['image']+'\','+dt[i]['price']+')">\
// 		<small class="fas fa-plus btn-icon__inner"></small>\
// 	</a>\
// </div>\
// </div>\
// </div>\
// </div>\
// </div>';

		//  show_card+='<tr>\
		// 					<td>\
		// 						<div class="">\
		// 						<ul class="list-unstyled row mx-n2">\
        //                        <li class="px-2 col-auto">\
		// 							<a href="product_details/'+dt[i]['pid']+'"><img src="'+suburl + dt[i]['image'] + ' " alt="Image Description"></a>\
		// 							</li>\
		// 							<li class="px-2 col"><h5 class="text-blue font-size-14 font-weight-bold"><a href="product_details/'+dt[i]['pid']+'">  ' + dt[i]['title'] + ' </a></h5>\
		// 						</li>\
		// 					</td>\
		// 					<td class="price">$ ' + dt[i]['price'] + '</td>\
		// 					<td>\
		// 						<div class="form-group--number">\
		// 							<button onclick="add_to_card('+dt[i]['pid']+',\''+dt[i]['title']+'\',\''+dt[i]['image']+'\','+dt[i]['price']+')" class="up">+</button>\
		// 							<button onclick="delete_data(' + i + ')" class="down">-</button>\
		// 							<input class="form-control" type="number"  value="'+iteam(dt,dt[i]['pid'])+'">\
		// 						</div>\
		// 					</td>\
		// 					<td>'+tt+'</td>\
		// 					<td><a href="#" onclick="delete_data(' + i + ')"><i class="icon-cross"></i></a></td>\
		// 				</tr>';
				}
			}
			document.getElementById("show_card_body").innerHTML = show;
			document.getElementById("lblsubtotal").innerHTML = '$'+total;
			document.getElementById("lblproducts").innerHTML = show_card;
			document.getElementById("card_subtotal").innerHTML ='$ ' +total;
			document.getElementById("card_total").innerHTML ='$ ' +total;
			//document.getElementById("quantity").innerHTML = show_quantity;

		
			
			// setCookie("card", JSON.stringify(__card), 1);
			
		}
			if(dt.length>0)
			{
				document.getElementById("btncheckout").style.visibility = "visible";
			}
			else
			{
				document.getElementById("btncheckout").style.visibility = "hidden";
			}
	}
function back_check(data,bi,pid)
{
	var x=true;
	while(bi--)
	{
		if(data[bi]['pid']==pid)
		{
			x=false;
			break;
		}
	}
	return x;
}
	function iteam(data,itms)
	{
		var i=0;var count=0;
		for(i=0;i<data.length;i++)
		{
			if(data[i]['pid']==itms)
			{
				count++;
			}
		}
		return count;
	}

	function delete_data(id) {
		var dt = JSON.parse(getCookie("ADDTOCARD"));//data; //JSON.parse(localStorage.getItem("addtocard"));
		dt.splice(id, 1);
		//data.splice(id, 1);
		//localStorage.setItem("addtocard", JSON.stringify(dt));
		setCookie("ADDTOCARD", JSON.stringify(dt), 1);
		//show_data();
		def();
		//_card();
		//ID_M();
	}

	function dataInsert(tables_id, messages, database_table) {
		localStorage.setItem("dataTableName", tables_id); //sl - 1 // i = 0 
		var x = tables_id;
		var i = 0;
		var dataTable_Data = [];
		for (i = 0; i < x.length; i++) {
			var data = document.getElementById(tables_id[i]);
			dataTable_Data.push(data.value);
		}
		var index = database_table + localStorage.length; //2
		if (localStorage.getItem(database_table + index) == null) { //1=null
			localStorage.setItem(database_table + index, dataTable_Data);
		} else {
			index++;
			localStorage.setItem(database_table + index, dataTable_Data);
		}


		var mess = this.document.getElementById(messages);
		mess.innerHTML = "Data Saved";
		for (i = 0; i < x.length; i++) {
			var data = document.getElementById(tables_id[i]);
			data.value = "";
		}
		//alert(dataTable_Data);
	}

	function ID_P() {
		if (typeof(Storage) !== "undefined") {
			if (localStorage.clickcount) {
				localStorage.clickcount = Number(data.length + 1);
			} else {
				localStorage.clickcount = 0;
			}
			//document.getElementById("result").innerHTML = "You have clicked the button " + localStorage.clickcount + " time(s).";
			//card_item = localStorage.clickcount;
		}
	}

	function ID_M() {
		if (typeof(Storage) !== "undefined") {
			if (localStorage.clickcount) {
				localStorage.clickcount = Number(data.length - 1);
			} else {
				localStorage.clickcount = 0;
			}
			//document.getElementById("result").innerHTML = "You have clicked the button " + localStorage.clickcount + " time(s).";
			//card_item = localStorage.clickcount;
		}
	}

function setCookie(cname,cvalue,exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires=" + d.toGMTString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}



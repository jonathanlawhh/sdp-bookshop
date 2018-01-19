function addToCartForm(){
 var name=document.getElementById( "bookID" ).value;
 if(name){
	$.ajax({
	type: 'post',
	url: 'php/addToCart.php',
	dataType: 'text',
	data: {
	 bookID:name,
	},
	success: function (response) {
	 $( '#cartBtn' ).html(response);
	 if(response == "Exist"){
		 document.getElementById('cartBtn').innerHTML = "<i class='material-icons left'>tag_faces</i>Done";
		 Materialize.toast("Item exist in cart", 2000, 'rounded')
	 } else if (response == "Added"){
		 document.getElementById('cartBtn').innerHTML = "<i class='material-icons left'>add_to_queue</i>Added";
		 Materialize.toast("Added to cart", 2000, 'rounded')
	 }
	}
	});
 } else {
	document.getElementById('cartBtn').innerHTML = 'Cart';
 }
}

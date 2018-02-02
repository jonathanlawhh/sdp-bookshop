function addToCartForm(){
 var name=document.getElementById( "bookID" ).value;
 var cartQty=document.getElementById( "cartQty" ).value;
 if(name){
	$.ajax({
	type: 'post', url: 'php/addToCart.php', dataType: 'text', data: { bookID:name, bookQty:cartQty, },
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

function userRatingForm(commentID, rating){
 if(commentID){
	$.ajax({
	type: 'post', url: 'php/doFeedback.php', dataType: 'text', data: { feedbackID:commentID, feedbackValue:rating, },
	success: function (response) {
    eval(response);
    refreshComment();
  }
	});
 } else {
   eval(response);
   refreshComment(); }
}

//Need to remove tooptiped due to onclick bug in MaterializeCSS framework: https://github.com/Dogfalo/materialize/issues/3566
function refreshComment(){
  $('.tooltipped').tooltip('remove');
  $('#commentHeader').load(location.href + ' #commentSection');
}

jQuery(function() {
jQuery("#product-lookup").typeahead({
hint:true,
highlight: true,
//items: 5,
name: "Products",
compareField: "filter",
autoSelect: false,
ajax: '/index.php?route=product/product/search&simple=1',
updater: function(id, text) {
if(jQuery("#product-lookup[data-addtocart]").length && jQuery('body.no-customer').length==0) {
console.log(jQuery(this))
jQuery(this).addCartByID(id);
swal({
title: 'One moment!',
html: '<img src="image/leaping-frog-260.gif" class="frog-loader"/><br />Adding item to cart...',
showCloseButton: false,
showCancelButton: false,
allowOutsideClick: false,
showConfirmButton: false
});
window.setTimeout(function(){
swal.close();
} ,1000);
} else {
let split = text.split("-");
let productName = split[0];
let description = split[1];
console.log(productName);
console.log(description);
jQuery("input[name='product_name']").val(productName);
jQuery("input[name='product_description']").val(description);

jQuery("#add-product .btn.hidden").data("id", id).data("num", text).click();
}


return text;
},
render: function (items) {
var that = this, display, isString = typeof that.options.displayField === 'string';

items = jQuery(items).map(function (i, item) {
display = item.num + " - " + item.description;
i = jQuery(that.options.item).attr('data-value', item[that.options.valueField]);
i.find('a').html(that.highlighter(display));
return i[0];
});

if(that.autoSelect){
//items.first().addClass('active');
}

this.$menu.html(items);
jQuery('.typeahead-spinner').hide();
console.log('these are items', items)
return this;
},
matcher: function(item) {
jQuery('.typeahead-spinner').hide();
return ~item.toLowerCase().indexOf(this.query.toLowerCase());
},
searchFunction: searchProduct
}).on('keypress', this, function (event) {
jQuery(this).parent().find('.typeahead-spinner').show();
setTimeout(function(){
jQuery('.typeahead-spinner').hide();
}, 2000)
});


jQuery('#prodModal').on("hidden.bs.modal", function () {
//jQuery("#product-lookup").val('');
});

jQuery('#product-search-form2 .btn-lookup').click(function(e) {
e.preventDefault();
var val = jQuery("#product-search-form2 input[type='product-lookup']").val();
if(val) {

window.location = "/index.php?productQuery="+val+"&route=product/product/searchPage";

}
});

/*
jQuery("#btn_save").click(function() {
var $this = jQuery(this);

swal.queue([{
title: 'Warning',
html: 'This will remove all items from the cart.<br>Are you sure?',
type: 'warning',
showCancelButton: true,
showLoaderOnConfirm: true,
confirmButtonText: 'Yes',
cancelButtonText: 'No',
confirmButtonClass: 'btn btn-success',
cancelButtonClass: 'btn btn-danger',
allowOutsideClick: false,
preConfirm: function () {
return new Promise(function (resolve) {
jQuery.post('index.php?route=checkout/cart/save')
.done(function (data) {
swal.insertQueueStep({
title: 'Success',
text: 'Order checkout complete',
type: 'success',
showCancelButton: false,
allowOutsideClick: false
});
resolve();
});
});
}
}]).then(function() {
window.location = "/index.php?route=order/order";
}).catch(swal.noop);
});
*/

jQuery("#btn_checkout").click(function() {
var $this = jQuery(this);
$holder = jQuery('#frm_checkout');
jQuery('.checkout-error').remove();

total = jQuery('.total-total .price').text();
if(jQuery('input[name=payment_required]').val() == 1 && stripDollar(total) > 0) {
var payment_valid = true;
if(jQuery('input[name=payment_amount]').val() == "") {
payment_valid = false;
} else {
jQuery('#billing-info fieldset:not(.collapse)').find('input:visible.req, select:visible.req').each(function(){
if(jQuery(this).val() == "") {
payment_valid = false;
}
});
}
if(payment_valid == false) {
jQuery('#billing-info .panel-body').prepend('<div class="alert alert-danger checkout-error" role="alert">Payment is required</div>');
return false;
}
}

if(jQuery('#shipto_new').is(":visible")) {
$ele = jQuery('#shipto-address');
jQuery('span[data-name="name"]',$ele).html(jQuery('input[name=shipto_new_name]').val());
jQuery('span[data-name="addressname"]',$ele).html(jQuery('input[name=shipto_new_addressname]').val());
jQuery('span[data-name="address"]',$ele).html(jQuery('input[name=shipto_new_address]').val());
jQuery('span[data-name="city"]',$ele).html(jQuery('input[name=shipto_new_city]').val());
jQuery('span[data-name="statecode"]',$ele).html(jQuery('select[name=shipto_new_state]').val());
jQuery('span[data-name="zip"]',$ele).html(jQuery('input[name=shipto_new_name]').val());
jQuery('span[data-name="countrycode"]',$ele).html(jQuery('select[name=shipto_new_country]').val());


jQuery('input[name="shipto_id"]').val('');
jQuery('input[name="shipto_name"]').val(jQuery('input[name=shipto_new_name]').val());
jQuery('input[name="shipto_addressname"]').val(jQuery('input[name=shipto_new_addressname]').val());
jQuery('input[name="shipto_address"]').val(jQuery('input[name=shipto_new_address]').val());
jQuery('input[name="shipto_city"]').val(jQuery('input[name=shipto_new_city]').val());
jQuery('input[name="shipto_statecode"]').val(jQuery('select[name=shipto_new_state]').val());
jQuery('input[name="shipto_zip"]').val(jQuery('input[name=shipto_new_zip]').val());
jQuery('input[name="shipto_countrycode"]').val(jQuery('select[name=shipto_new_country]').val());
}

var doexport = ($this.data('export') == 1) ? 1 : 0;
return new Promise(function (resolve) {
jQuery.ajax({
url: 'index.php?route=checkout/checkout/queue&export='+doexport,
type: 'post',
data: jQuery('input[type=\'text\'],input[type=\'number\'], input[type=\'hidden\'], input[type=\'radio\']:checked,  input[type=\'checkbox\']:checked, select, textarea', $holder),
dataType: 'json',
beforeSend: function () {
//jQuery('#button-cart').button('loading');
jQuery('#btn_checkout').button('loading');
jQuery('.checkout-error').remove();
swal({
title: 'One moment!',
html: '<img src="image/leaping-frog-260.gif" class="frog-loader"/><br />Saving Order...',
showCloseButton: false,
showCancelButton: false,
allowOutsideClick: false,
showConfirmButton: false
});
},
complete: function () {
// jQuery('#button-cart').button('reset');
jQuery('#btn_checkout').button('reset');
},
success: function (json) {
swal.close();
if(json.payment_error) {
jQuery('#billing-info .panel-body').prepend('<div class="alert alert-danger checkout-error" role="alert">'+json.payment_error+'</div>');
} else {
console.log(json)
if(doexport == 1) {
if(json.export_success) {

html = 'Order <b>#' + json['sonum'] + '</b> exported to Fishbowl!';
if (json['quickship']) {
if(json['quickship']['success']) {
html += "<br>Quick Ship successful!";
} else {
if(json['quickship']['error']) {
html += "<br><br>Quick Ship failed! " + json['quickship']['error'];
}
}
}

if (json['payment']) {
if(json['payment']['success']) {
html += "<br>Payment successful!";
} else {
if(json['payment']['error']) {
html += "<br><br>Payment failed! " + json['payment']['error'];
}
}
}

swal({
title: 'Success',
html: html,
type: 'success',
allowOutsideClick: false,
showCancelButton: false,
closeOnConfirm: false,
showConfirmButton: true,
showLoaderOnConfirm: true
});

window.setTimeout(function(){
window.location = "/index.php?route=order/order&soid="+json['so_id']+"#completed";
}, 3000);


} else {

swal({
title: 'Error',
html: json.error,
type: 'error',
allowOutsideClick: false
});
window.setTimeout(function(){
window.location = "/index.php?route=order/order&soid="+json['so_id']+"#pending";
}, 5000);


}

} else {
swal({
title: 'Success',
html: 'Your order is in queue and will be exported to Fishbowl momentarily.',
type: 'success',
allowOutsideClick: false
});
window.setTimeout(function(){
window.location = "/index.php?route=order/order&soid="+json['so_id']+"#pending";
}, 3000);
}
}
resolve();
}
});
});
});

jQuery("#shopping_cart #btn_save").click(function() {
var $this = jQuery(this);
jQuery.post('index.php?route=checkout/cart/save')
.done(function (data) {
window.location = "/index.php?route=order/order";
});
/*
jQuery.post('index.php?route=checkout/checkout/save',
{
reqshipdate: jQuery('#reqshipdate').val(),
customerpo: jQuery('#customerpo').val(),
vendorpo: jQuery('#vendorpo').val()
})
*/

});


jQuery("#shopping_cart #btn_close").click(function() {
var $this = jQuery(this);
jQuery.post('index.php?route=checkout/cart/save')
.done(function (data) {
window.location = "/index.php?route=order/order";
});

});



jQuery("#shopping_cart #btn_empty").click(function() {
cart.empty();
});




var start = moment();
var end = moment();
jQuery('.datepicker').daterangepicker({
"singleDatePicker": true,
"startDate": start,
"endDate": end,
"minDate": start,
}, function(start, end, label) {
console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
});




var sigoptions = {
drawOnly : true,
lineWidth: 0,
penColour:"#000000",
};
//canvas = document.getElementById('sigpad');
//canvas.width = 400;
// canvas.height= 150;
sigPad = jQuery('.sigPad').signaturePad(sigoptions);



jQuery('#signatureModal').off().on('shown.bs.modal', function (event) {

var $button = jQuery(event.relatedTarget);
var $modal = jQuery(event.target);

if($button.data('id') == "")
sigoptions['drawOnly'] = true;
else
sigoptions['displayonly'] = true;


if($button.data('id') != "") {
jQuery(".pad")[0].setAttribute('width', parseInt(jQuery(".pad").css('width')));
sigPad.regenerate($button.data('sig'));

$modal.find('#signame').val($button.data('signame'));
$modal.find('#signame').attr('readonly', 'true');
$modal.find('.date').html($button.data('date'));

jQuery(".viewButton").show();
jQuery(".editButton").hide();
}

});


jQuery("#sig_submit").on("click", function (event) {
var form = jQuery(this).parents('form');
var output = form.find('.output').val();
var signame = form.find('#signame').val();

/*
var oCanvas = jQuery('.sigPad');
strType= "PNG";
if (strType == "PNG")
//	var oImg = Canvas2Image.saveAsPNG(oCanvas, true, 300, 150);
var oImg = Canvas2Image.saveAsPNG(oCanvas, true, 275, 138);
if (strType == "BMP")
var oImg = Canvas2Image.saveAsBMP(oCanvas, true);
if (strType == "JPEG")
var oImg = Canvas2Image.saveAsJPEG(oCanvas, true);

if (!oImg) {
alert("Sorry, this browser is not capable of saving " + strType + " files!");
return false;
}
*/

if(signame == "") {
jQuery('.sigNameHolder').addClass('has-error');
return false;
}
return new Promise(function (resolve) {
jQuery.post('index.php?route=common/signature/save',
{
signature: output,
name: signame,
simple: 1
})
.done(function (data) {
if(data['success']) {
swal.insertQueueStep({
title: 'Success',
text: 'Signature saved',
type: 'success',
allowOutsideClick: false
});
jQuery("#btn_signature").html("View Signature <i class='fa fa-check-circle' aria-hidden='true'></i>");
jQuery("#btn_signature").attr('data-id', data['sig']['id']);
jQuery("#btn_signature").attr('data-signame', data['sig']['name']);
jQuery("#btn_signature").attr('data-date', data['sig']['date']);
jQuery("#btn_signature").attr('data-sig', form.find('.output').val());
jQuery('#signatureModal').modal('hide');
} else if(data['error']) {
swal.insertQueueStep({
title: 'Error',
text: data['output'],
type: 'error',
allowOutsideClick: false
});
}
resolve();
});
});
});


});

function searchProduct(query) {
if(query) {
this.$element.val('');
productSearch = this;

swal.queue([{
title: 'One moment!',
html: '<img src="image/leaping-frog-260.gif" class="frog-loader"/><br />Searching for "'+query+'"...',
showCancelButton: false,
showConfirmButton: false,
showLoaderOnConfirm: false,
allowOutsideClick: false,
preConfirm: function () {
return new Promise(function (resolve) {
if(productSearch.ajax.xhr != null) {
// productSearch.ajax.xhr.abort();
productSearch.ajax.xhr = null;
productSearch.ajaxToggleLoadClass(false);
}
jQuery("#product-input-search").typeahead('destroy');
jQuery.get('/index.php?route=product/product/search',
{'query': query})
.done(function (data) {
if(data.length == 1) {
if(jQuery("#product-lookup[data-addtocart]").length && jQuery('body.no-customer').length==0) {
jQuery("#product-lookup").addCartByID(data[0].id);
swal({
title: 'One moment!',
html: '<img src="image/leaping-frog-260.gif" class="frog-loader"/><br />Adding item to cart...',
showCloseButton: false,
showCancelButton: false,
allowOutsideClick: false,
showConfirmButton: false
});
window.setTimeout(function(){
swal.close();
} ,1000);
} else {
jQuery("#add-product .btn.hidden").data("id", data[0].id).data("num", data[0].num).click();
}

resolve();
} else {
swal.insertQueueStep({
title: 'Success',
text: 'Loading Search Results',
type: 'success',
allowOutsideClick: false,
showCancelButton: false,
showConfirmButton: false
});

// jQuery("#product-input-search").val(query);
// jQuery("#product-search-form").submit();
swal.close()

swal({
title: 'Error',
text: 'Product Does Not Exist',
type: 'error',
allowOutsideClick: false,
showCancelButton: false,
showConfirmButton: true
});
}
});
});
},
onOpen: function() {
swal.clickConfirm();
}
}]).catch(swal.noop);
}
}



// START: Shopping Cart Page
function updateCart(key) {
$row = jQuery('#shopping_cart table#cart_items tr[data-cartid="'+key+'"]');

var quantity   = $row.find('input[data-type="quantity"]').val();
var item_type  = $row.find('[data-type="item_type"]').val();
var price 	   = $row.find('input[data-type="price"]').val();

cart.update(key, quantity, price, item_type);


}

/*
jQuery('#shopping_cart table#cart_items').on('blur', 'input', function() {
var $row = jQuery(this).closest('tr');
var key = $row.attr('data-cartid');
var quantity   = $row.find('input[data-type="quantity"]').val();
var item_type  = $row.find('[data-type="item_type"]').val();
var price 	   = $row.find('input[data-type="price"]').val();

cart.update(key, quantity, price, item_type);
});
*/





// END: Shopping Cart Page
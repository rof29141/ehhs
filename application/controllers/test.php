$(function() {
$("#product-lookup").typeahead({
hint:true,
highlight: true,
//items: 5,
name: "Products",
compareField: "filter",
autoSelect: false,
ajax: '/index.php?route=product/product/search&simple=1',
updater: function(id, text) {
if($("#product-lookup[data-addtocart]").length && $('body.no-customer').length==0) {
console.log($(this))
$(this).addCartByID(id);
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
$("input[name='product_name']").val(productName);
$("input[name='product_description']").val(description);

$("#add-product .btn.hidden").data("id", id).data("num", text).click();
}


return text;
},
render: function (items) {
var that = this, display, isString = typeof that.options.displayField === 'string';

items = $(items).map(function (i, item) {
display = item.num + " - " + item.description;
i = $(that.options.item).attr('data-value', item[that.options.valueField]);
i.find('a').html(that.highlighter(display));
return i[0];
});

if(that.autoSelect){
//items.first().addClass('active');
}

this.$menu.html(items);
$('.typeahead-spinner').hide();
console.log('these are items', items)
return this;
},
matcher: function(item) {
$('.typeahead-spinner').hide();
return ~item.toLowerCase().indexOf(this.query.toLowerCase());
},
searchFunction: searchProduct
}).on('keypress', this, function (event) {
$(this).parent().find('.typeahead-spinner').show();
setTimeout(function(){
$('.typeahead-spinner').hide();
}, 2000)
});


$('#prodModal').on("hidden.bs.modal", function () {
//$("#product-lookup").val('');
});

$('#product-search-form2 .btn-lookup').click(function(e) {
e.preventDefault();
var val = $("#product-search-form2 input[type='product-lookup']").val();
if(val) {

window.location = "/index.php?productQuery="+val+"&route=product/product/searchPage";

}
});

/*
$("#btn_save").click(function() {
var $this = $(this);

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
$.post('index.php?route=checkout/cart/save')
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

$("#btn_checkout").click(function() {
var $this = $(this);
$holder = $('#frm_checkout');
$('.checkout-error').remove();

total = $('.total-total .price').text();
if($('input[name=payment_required]').val() == 1 && stripDollar(total) > 0) {
var payment_valid = true;
if($('input[name=payment_amount]').val() == "") {
payment_valid = false;
} else {
$('#billing-info fieldset:not(.collapse)').find('input:visible.req, select:visible.req').each(function(){
if($(this).val() == "") {
payment_valid = false;
}
});
}
if(payment_valid == false) {
$('#billing-info .panel-body').prepend('<div class="alert alert-danger checkout-error" role="alert">Payment is required</div>');
return false;
}
}

if($('#shipto_new').is(":visible")) {
$ele = $('#shipto-address');
$('span[data-name="name"]',$ele).html($('input[name=shipto_new_name]').val());
$('span[data-name="addressname"]',$ele).html($('input[name=shipto_new_addressname]').val());
$('span[data-name="address"]',$ele).html($('input[name=shipto_new_address]').val());
$('span[data-name="city"]',$ele).html($('input[name=shipto_new_city]').val());
$('span[data-name="statecode"]',$ele).html($('select[name=shipto_new_state]').val());
$('span[data-name="zip"]',$ele).html($('input[name=shipto_new_name]').val());
$('span[data-name="countrycode"]',$ele).html($('select[name=shipto_new_country]').val());


$('input[name="shipto_id"]').val('');
$('input[name="shipto_name"]').val($('input[name=shipto_new_name]').val());
$('input[name="shipto_addressname"]').val($('input[name=shipto_new_addressname]').val());
$('input[name="shipto_address"]').val($('input[name=shipto_new_address]').val());
$('input[name="shipto_city"]').val($('input[name=shipto_new_city]').val());
$('input[name="shipto_statecode"]').val($('select[name=shipto_new_state]').val());
$('input[name="shipto_zip"]').val($('input[name=shipto_new_zip]').val());
$('input[name="shipto_countrycode"]').val($('select[name=shipto_new_country]').val());
}

var doexport = ($this.data('export') == 1) ? 1 : 0;
return new Promise(function (resolve) {
$.ajax({
url: 'index.php?route=checkout/checkout/queue&export='+doexport,
type: 'post',
data: $('input[type=\'text\'],input[type=\'number\'], input[type=\'hidden\'], input[type=\'radio\']:checked,  input[type=\'checkbox\']:checked, select, textarea', $holder),
dataType: 'json',
beforeSend: function () {
//$('#button-cart').button('loading');
$('#btn_checkout').button('loading');
$('.checkout-error').remove();
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
// $('#button-cart').button('reset');
$('#btn_checkout').button('reset');
},
success: function (json) {
swal.close();
if(json.payment_error) {
$('#billing-info .panel-body').prepend('<div class="alert alert-danger checkout-error" role="alert">'+json.payment_error+'</div>');
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

$("#shopping_cart #btn_save").click(function() {
var $this = $(this);
$.post('index.php?route=checkout/cart/save')
.done(function (data) {
window.location = "/index.php?route=order/order";
});
/*
$.post('index.php?route=checkout/checkout/save',
{
reqshipdate: $('#reqshipdate').val(),
customerpo: $('#customerpo').val(),
vendorpo: $('#vendorpo').val()
})
*/

});


$("#shopping_cart #btn_close").click(function() {
var $this = $(this);
$.post('index.php?route=checkout/cart/save')
.done(function (data) {
window.location = "/index.php?route=order/order";
});

});



$("#shopping_cart #btn_empty").click(function() {
cart.empty();
});




var start = moment();
var end = moment();
$('.datepicker').daterangepicker({
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
sigPad = $('.sigPad').signaturePad(sigoptions);



$('#signatureModal').off().on('shown.bs.modal', function (event) {

var $button = $(event.relatedTarget);
var $modal = $(event.target);

if($button.data('id') == "")
sigoptions['drawOnly'] = true;
else
sigoptions['displayonly'] = true;


if($button.data('id') != "") {
$(".pad")[0].setAttribute('width', parseInt($(".pad").css('width')));
sigPad.regenerate($button.data('sig'));

$modal.find('#signame').val($button.data('signame'));
$modal.find('#signame').attr('readonly', 'true');
$modal.find('.date').html($button.data('date'));

$(".viewButton").show();
$(".editButton").hide();
}

});


$("#sig_submit").on("click", function (event) {
var form = $(this).parents('form');
var output = form.find('.output').val();
var signame = form.find('#signame').val();

/*
var oCanvas = $('.sigPad');
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
$('.sigNameHolder').addClass('has-error');
return false;
}
return new Promise(function (resolve) {
$.post('index.php?route=common/signature/save',
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
$("#btn_signature").html("View Signature <i class='fa fa-check-circle' aria-hidden='true'></i>");
$("#btn_signature").attr('data-id', data['sig']['id']);
$("#btn_signature").attr('data-signame', data['sig']['name']);
$("#btn_signature").attr('data-date', data['sig']['date']);
$("#btn_signature").attr('data-sig', form.find('.output').val());
$('#signatureModal').modal('hide');
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
$("#product-input-search").typeahead('destroy');
$.get('/index.php?route=product/product/search',
{'query': query})
.done(function (data) {
if(data.length == 1) {
if($("#product-lookup[data-addtocart]").length && $('body.no-customer').length==0) {
$("#product-lookup").addCartByID(data[0].id);
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
$("#add-product .btn.hidden").data("id", data[0].id).data("num", data[0].num).click();
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

// $("#product-input-search").val(query);
// $("#product-search-form").submit();
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
$row = $('#shopping_cart table#cart_items tr[data-cartid="'+key+'"]');

var quantity   = $row.find('input[data-type="quantity"]').val();
var item_type  = $row.find('[data-type="item_type"]').val();
var price 	   = $row.find('input[data-type="price"]').val();

cart.update(key, quantity, price, item_type);


}

/*
$('#shopping_cart table#cart_items').on('blur', 'input', function() {
var $row = $(this).closest('tr');
var key = $row.attr('data-cartid');
var quantity   = $row.find('input[data-type="quantity"]').val();
var item_type  = $row.find('[data-type="item_type"]').val();
var price 	   = $row.find('input[data-type="price"]').val();

cart.update(key, quantity, price, item_type);
});
*/





// END: Shopping Cart Page
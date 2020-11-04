
// Total amount calculation
function calc() {
  var elm = document.forms["frm_add_order"];
  if ( elm["orderdetails_quantity"].value != "" && elm["price_per_unit"].value != "" ) {
    elm["order_total"].value = parseInt(elm["orderdetails_quantity"].value) * parseInt(elm["price_per_unit"].value);
  }
}
  
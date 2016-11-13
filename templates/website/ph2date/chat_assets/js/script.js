/*function check_length(my_form)
{
maxLen = 50; // max number of characters allowed
if (my_form.my_text.value.length > maxLen) {
// Alert message if maximum limit is reached.
// If required Alert can be removed.
var msg = "You have reached your maximum limit of characters allowed";
//alert(msg);
// Reached the Maximum length so trim the textarea
my_form.my_text.value = my_form.my_text.value.substring(0, maxLen);
}
else{ // Maximum length not reached so update the value of my_text counter
my_form.text_num.value = maxLen - my_form.my_text.value.length;}
}*/
function textCounter(field,cntfield,maxlimit) {
if (field.value.length > maxlimit) // if too long...trim it!
field.value = field.value.substring(0, maxlimit);
// otherwise, update 'characters left' counter
else
cntfield.value = maxlimit - field.value.length;
}
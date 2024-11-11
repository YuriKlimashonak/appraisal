import jquery from 'jquery'
export default function (){
    window.jQuery = jquery;
    console.log('super!');
    // jquery("#order_cost").val("100500");
    window.onload = function() {
            window.jQuery('span').val("100500")
            console.log(window.jQuery('#order_cost').value)
    }
}
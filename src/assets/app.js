import './bootstrap.js';
import $ from 'jquery';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';


console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');

window.onload = function() {
    let $orderCost;
    $orderCost = $('#order_title').find(":selected").attr('data-cost');
    console.log($orderCost);
    $('#order_cost').text($orderCost);


    $('select').on('change', function() {
        $orderCost = $('#order_title').find(":selected").attr('data-cost');
        console.log($orderCost);
        $('#order_cost').text($orderCost);
    });
}
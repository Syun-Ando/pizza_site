'use strict';

/* ----ピザ用---- */
$(document).ready(function(){
    $('.container1 li.pizza_item1 p').on('click', function(){
        $(this).next().toggleClass('hidden');
    });
});

/* ----サラダ用---- */
$(document).ready(function(){
    $('.container2 li.pizza_item2 p').on('click', function(){
        $(this).next().toggleClass('hidden');
    });
});

/* ----ポテト用---- */
$(document).ready(function(){
    $('.container3 li.pizza_item3 p').on('click', function(){
        $(this).next().toggleClass('hidden');
    });
});

/* ----ドリンク用---- */
$(document).ready(function(){
    $('.container4 li.pizza_item4 p').on('click', function(){
        $(this).next().toggleClass('hidden');
    });
});

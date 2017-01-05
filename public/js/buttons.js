/**
 * Created by: Nathan Healea
 * Project: GOLDMT
 * File:
 * Date: 1/3/17
 * Time: 2:51 PM
 */
$(function(){

    // swap for minus and plus
    $('i').click(function(){
        swap(this,'fa-minus fa-plus');
    });
});

// Toggles any to font-awesome classes
function swap(e, icons){
    $(e).toggleClass(icons);
}

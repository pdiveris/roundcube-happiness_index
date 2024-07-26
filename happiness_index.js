var happy;

let list = '<ul id="happiness_list">';
list += '<li><a class="hindex" href="#">1</li>';
list += '<li><a class="hindex" href="#">2</li>';
list += '<li><a class="hindex" href="#">3</li>';
list += '<li><a class="hindex" href="#">4</li>';
list += '<li><a class="hindex" href="#">5</li>';
list += '</ul>';

happy = $('<div id="happiness_window"><h3 class="popover-header dark-mode happiness_window">Please choose</h3>'+list+'</div>');
happy.attr('id', 'happiness_index');
happy.attr('style', 'position: absolute; top: 10px; left: 0px;');
happy.attr('class', 'dark-mode');
happy.attr('z-index', '0');

$(document).on('click','body *',function() {
    if ($(this).attr('class') === 'hindex') {
        console.log("hindex clicked "+$(this).text());
    }
    $('#happiness_index').hide();

});

$(function() {
    let button = $('.button-happiness')
    let offset = button.offset();
    happy
        .css({
            left: offset.left,
            top: offset.top + button.innerHeight()
        });

    happy.appendTo('#layout-content');
    happy.hide();
});

/**
 * Show a popup with the happiness levels
 * Store it in localStorage or session or somewhere when clicked
 */
function getAndSetHappiness()
{
    happy.show();
    console.log("Happiness index button clicked....");
}


/*
Code below left as a point of discussion - I couldn't get it to work to my satisfaction
using the standard way illustrated here as it would trigger the "unsaved message" modal
I am sure there's a way of fixing that whilst using the pattern below, but I can't spend
a whole day on it and Roundcube's plugin docs are not all that enlightening

if (window.rcmail) {
    rcmail.addEventListener('init', function () {
        // register command (directly enable in message view mode)
        rcmail.register_command('plugin.happiness_index.mark', function () {
            this.env.is_sent = true;
            console.log('Babis was here...');
            return false;
        }, true);
    });
}
*/
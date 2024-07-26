/**
 * Show a popup with the happiness levels
 * Store it in localStorage or session or somewhere when clicked
 */
function getAndSetHappiness()
{
    console.log("Happiness index button clicked....");
}


//    content:"\f00d" !important;

$('.button-happiness').append('<style>:before{content:"\\f00d" !important;}</style>');
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
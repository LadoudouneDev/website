import '../css/blog.css';
import datepicker from 'js-datepicker';

const routes = require('../../public/js/fos_js_routes.json');
import Routing from '../../vendor/friendsofsymfony/jsrouting-bundle/Resources/public/js/router.min.js';

Routing.setRoutingData(routes);

$(document).ready(function()
{
    

    $(".tags").click(function(event)
    {
        var theid = this.id;
    
        var url = Routing.generate('categorie_articles', {'id': theid});
        $( location ).attr("href", url);
    });

    $(".card").click(function(event)
    {
        var theid = this.id;
    console.log('ttttttttt');
        var url = Routing.generate('article_fiche', {'id': theid});
        $( location ).attr("href", url);
    });
});
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
        //var route = "{{ path('categorie_articles', {'id': '"+ theid +"'})|escape('js') }}";
        //console.log(route);
        //console.log(this.id); //Affiche maDiv
        //theid.push(this.id);
        //console.log(theid);
        var url = Routing.generate('categorie_articles', {'id': theid});
        $( location ).attr("href", url);
    });
});
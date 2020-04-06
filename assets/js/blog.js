import '../css/blog.css';

$(document).ready(function()
{
    

    $(".tags").click(function(event)
    {
        var theid = this.id;
        var route = "{{ path('categorie_articles', {'id': '"+ theid +"'})|escape('js') }}";
        console.log(route);
        console.log(this.id); //Affiche maDiv
    });
});
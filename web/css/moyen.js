$(document).ready(function(){
    var type = $('.gave1');
    var typeExamen = $('.gave2');
    var contenu = $('.gave3');
    var nomMedicament = $('.gave4');
    var quantiteMedicament = $('.gave5');
    var nbreMedicament = $('.gave6');
    
    typeExamen.hide();
    contenu.hide();
    quantiteMedicament.hide();
    nomMedicament.hide();
    nbreMedicament.hide();
    typeExamen.hide();
    type.change(function(){
        
        if(type.val() == ''){
            nomMedicament.hide();
            quantiteMedicament.hide();
            nbreMedicament.hide();
            typeExamen.hide();
            contenu.hide();
        }else if(type.val() == 'Ordonance'){
            nomMedicament.show();
            quantiteMedicament.show();
            nbreMedicament.show();
            typeExamen.hide();
            contenu.hide();
        }else if(type.val() == 'Examen'){
            typeExamen.show();
            contenu.show();
            nomMedicament.hide();
            quantiteMedicament.hide();
            nbreMedicament.hide();
        }else{
            typeExamen.hide();
            contenu.hide();
            quantiteMedicament.hide();
            nbreMedicament.hide();
            nomMedicament.hide();
        }
    });
});








/**
 * Created by SEYDINA on 10/08/2017.
 */
var $collectionHolder;
// setup an "add a tag" link
var $addFichierLink = $('<a href="#" class="ajoutPrescription"><span style="font-size: 17px">' +
    '<span class="glyphicon glyphicon-plus"></span> Ajouter Plus</span></a>');
var $newLinkLi = $('<li></li>').append($addFichierLink);
jQuery(document).ready(function() {
    // Get the ul that holds the collection of tags
    $collectionHolder = $('ul.medi');

    // add the "add a tag" anchor and li to the tags ul
    $collectionHolder.append($newLinkLi);

    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    $collectionHolder.data('index', $collectionHolder.find(':input').length);

    $addFichierLink.on('click', function(e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // add a new tag form (see next code block)
        addFichierForm($collectionHolder, $newLinkLi);
    });

    // add a delete link to all of the existing tag form li elements
    $collectionHolder.find('li').each(function() {
        //addFichierFormDeleteLink($(this));
    });
});
function addFichierForm($collectionHolder, $newLinkLi) {
    // Get the data-prototype explained earlier
    var prototype = $collectionHolder.data('prototype');

    // get the new index
    var index = $collectionHolder.data('index');

    // Replace '__name__' in the prototype's HTML to
    // instead be a number based on how many items we have
    var newForm = prototype.replace(/__name__/g, index);

    // increase the index with one for the next item
    $collectionHolder.data('index', index + 1);

    // Display the form in the page in an li, before the "Add a tag" link li
    var $newFormLi = $('<li></li>').append(newForm);
    $newLinkLi.before($newFormLi);
    addFichierFormDeleteLink($newFormLi);
}

function addFichierFormDeleteLink($fichierFormLi) {
    var $removeFormA = $('<a class="btn btn-danger href="#">Enlever</a>');
    $fichierFormLi.append($removeFormA);

    $removeFormA.on('click', function(e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // remove the li for the tag form
        $fichierFormLi.remove();
    });
}

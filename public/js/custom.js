"use strict";

$(function(){
	
	// gestion de la barre de recherche
    $("#navbar-search-input").on('keyup', function(){
        var value = $(this).val().toLowerCase();
        $(".table-item").filter(function(){
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
})

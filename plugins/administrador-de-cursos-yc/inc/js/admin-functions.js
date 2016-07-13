$ = jQuery.noConflict();
$( document ).ready( function() {
    $( "#sortable-modulos" ).sortable({
        stop: function( event, ui ) {
            var modulosObj = getNewPosition( '#sortable-modulos' );
            var cursoId = $('#modulos').data('curso');
            updateOrderModulos( modulosObj, cursoId );
        }
    });
    $( "#sortable-lecciones" ).sortable({
        stop: function( event, ui ) {
            var leccionesObj = getNewPosition( '#sortable-lecciones' );
            var moduloId = $('#lecciones').data('modulo');
            updateOrderLecciones( leccionesObj, moduloId );
        }
    });
    $( "#sortable-modulos" ).disableSelection();
});

function getNewPosition( el ){
    var positions = [];
    $( el + ' li').each(function(i, modulo){
        var positionModulo = {};
        positionModulo['position'] = i+1;
        positionModulo['id'] = $(modulo).data('id');
        positions.push( positionModulo );
    });
    return positions;
}

function updateOrderModulos( positionsModulo, idCurso ){
    $.post(
        ajax_url,
        {
            id_curso:           idCurso,
            positions_modulo:   positionsModulo,
            action:             'update_position_modulo_curso'
        },
        function( codigo ){
            console.log( codigo );
        }
    );
}

function updateOrderLecciones( positionsLeccion, idModulo ){
    $.post(
        ajax_url,
        {
            id_modulo:          idModulo,
            positions_leccion:   positionsLeccion,
            action:             'update_position_leccion_modulo'
        },
        function( codigo ){
            console.log( codigo );
        }
    );
}

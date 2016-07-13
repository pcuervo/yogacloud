$ = jQuery.noConflict();
$( document ).ready( function() {
    var dropped = false;

    $( "#sortable-modulos" ).sortable({
        stop: function( event, ui ) {
            var modulosObj = getNewPosition( '#sortable-modulos' );
            var cursoId = $('#modulos').data('curso');
            updateOrderModulos( modulosObj, cursoId );
        }
    });

    $( "#sortable-lecciones-modulo" ).sortable({
        stop: function( event, ui ) {
            if( !dropped ){
                var leccionesObj = getNewPosition( '#sortable-lecciones-modulo' );
                var moduloId = $('#lecciones-modulo').data('modulo');
                updateOrderLecciones( leccionesObj, moduloId );
            }
            $( '#droppable' ).hide();
        },
        start: function( event, ui ) {
            $( '#droppable' ).show();
        }
    });

    $( "#sortable-lecciones-todas" ).sortable({
        connectWith: '#sortable-lecciones-modulo',
        stop: function( event, ui ) {
            if( !dropped ){
                var leccionesObj = getNewPosition( '#sortable-lecciones-modulo' );
                var moduloId = $('#lecciones-modulo').data('modulo');
                updateOrderLecciones( leccionesObj, moduloId );
            }
            //$( '#droppable' ).hide();
        },
        start: function( event, ui ) {
            //$( '#droppable' ).show();
        }
    });

    $( "#droppable" ).droppable({
        drop: function( event, ui ) {
            dropped = true;
            var $droppedEl = $('.sortable-list').find( 'li#'+ui.draggable.attr('id') );
            var itemType = $droppedEl.data('type');
            console.log( itemType );
            console.log( $droppedEl.clone()[0] );

            if( 'lesson' == itemType ){
                var lessonId = ui.draggable.attr('id');
                var moduleId = $('#lecciones-modulo').data('modulo');
                removeFromModulo( lessonId, moduleId );
            }
        }
    });

    $( "#sortable-modulos" ).disableSelection();
    $( "#sortable-lecciones-modulo" ).disableSelection();
});

function removeFromModulo( idLeccion, idModulo ){
    $.post(
        ajax_url,
        {
            id_leccion:     idLeccion,
            id_modulo:      idModulo,         
            action:         'remove_leccion_modulo'
        },
        function( response ){
            $('#sortable-lecciones-todas').append( $('#sortable-lecciones-modulo li#'+idLeccion ).clone().removeAttr('style') );
            $('#sortable-lecciones-modulo li#'+idLeccion ).remove();
            console.log( response );
        }
    );
}

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
            positions_leccion:  positionsLeccion,
            action:             'update_position_leccion_modulo'
        },
        function( codigo ){
            console.log( codigo );
        }
    );
}

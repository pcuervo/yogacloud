$ = jQuery.noConflict();
$( document ).ready( function() {

    $( "#sortable-modulos-curso" ).sortable({
        connectWith: '#sortable-modulos-todos',
        stop: function( event, ui ) {
            var modulosObj = getNewPosition( '#sortable-modulos-curso' );
            var moduloId = $('#modulos-curso').data('curso');
            updateOrderModulos( modulosObj, moduloId );
        },
        start: function( event, ui ) {
            // agregar color aquí
        }
    });
    $( "#sortable-modulos-todos" ).sortable({
        connectWith: '#sortable-modulos-curso',
        receive: function( event, ui ){
            var moduleId = ui.item.attr('id');
            var courseId = $('#modulos-curso').data('curso');
            removeFromCurso( moduleId, courseId );
        },
        stop: function( event, ui ) {
            var modulosObj = getNewPosition( '#sortable-modulos-curso' );
            var moduloId = $('#modulos-curso').data('curso');
            updateOrderModulos( modulosObj, moduloId );
        },
        start: function( event, ui ) {
            //$( '#droppable' ).show();
        }
    });

    $( "#sortable-lecciones-modulo" ).sortable({
        connectWith: '#sortable-lecciones-todas',
        stop: function( event, ui ) {
            var leccionesObj = getNewPosition( '#sortable-lecciones-modulo' );
            var moduloId = $('#lecciones-modulo').data('modulo');
            updateOrderLecciones( leccionesObj, moduloId );
        },
        start: function( event, ui ) {
            // agregar color aquí
        }
    });
    $( "#sortable-lecciones-todas" ).sortable({
        connectWith: '#sortable-lecciones-modulo',
        receive: function( event, ui ){
            var lessonId = ui.item.attr('id');
            var moduleId = $('#lecciones-modulo').data('modulo');
            removeFromModulo( lessonId, moduleId );
        },
        stop: function( event, ui ) {
            var leccionesObj = getNewPosition( '#sortable-lecciones-modulo' );
            var moduloId = $('#lecciones-modulo').data('modulo');
            updateOrderLecciones( leccionesObj, moduloId );
        },
        start: function( event, ui ) {
            //$( '#droppable' ).show();
        }
    });

    $( "#sortable-lecciones-modulo, #sortable-lecciones-todas, #sortable-modulos" ).disableSelection();
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
            console.log( response );
        }
    );
}

function removeFromCurso( idModulo, idCurso ){
    $.post(
        ajax_url,
        {
            id_curso:     idCurso,
            id_modulo:    idModulo,         
            action:       'remove_modulo_curso'
        },
        function( response ){
            console.log( response );
        }
    );
}

function getNewPosition( el ){
    var positions = [];
    $( el + ' li').each(function(i, val){
        var positionModulo = {};
        positionModulo['position'] = i+1;
        positionModulo['id'] = $(val).data('id');
        positions.push( positionModulo );
    });
    return positions;
}

function updateOrderModulos( positionsModulo, idCurso ){
    console.log( idCurso );
    console.log( positionsModulo );
    $.post(
        ajax_url,
        {
            id_curso:           idCurso,
            positions_modulo:   positionsModulo,
            action:             'update_position_modulo_curso'
        },
        function( codigo ){
            updateListNumbers( '#sortable-modulos-curso' );
            eraseListNumbers( '#sortable-modulos-todos' );
            showNotice( '¡Se han actualizado los módulos del curso!' );
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
            updateListNumbers( '#sortable-lecciones-modulo' );
            eraseListNumbers( '#sortable-lecciones-todas' );
            showNotice( '¡Se han actualizado las lecciones del módulo!' );
        }
    );
}

function updateListNumbers( listSelector ){
    $( listSelector + ' li' ).each( function(i, li){
        $(li).find('span').text(i+1+'. ');
    })
}

function eraseListNumbers( listSelector ){
    $( listSelector + ' li' ).each( function(i, li){
        $(li).find('span').text('');
    })
}

function showNotice( text ){
    var noticeId = $('.notice').length;
    console.log( noticeId );
    var noticeHtml = '<div id="n-' + noticeId + '" class="[ notice notice-success ][ is-dismissible ][ hidden ]"><p>' + text + '</p></div>';
    $('.notices').append( noticeHtml );
    $('#n-'+noticeId).show('slow');
    setTimeout( function(){
        dismissNotice( noticeId );
    }, 3000 );
}

function dismissNotice( id ){
    $('#n-'+id).hide('slow', function(){ $('#n-'+id).remove() });
}
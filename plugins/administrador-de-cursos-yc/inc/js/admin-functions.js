$ = jQuery.noConflict();
$( document ).ready( function() {
    // Sort Módulos
    $( "#sortable-modulos-curso" ).sortable({
        connectWith: '#sortable-modulos-todos',
        stop: function( event, ui ) {
            var modulosObj = getNewPosition( '#sortable-modulos-curso' );
            var moduloId = $('#modulos-curso').data('curso');
            updateOrderModulos( modulosObj, moduloId );
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
        }
    });
    // Sort Lecciones
    $( "#sortable-lecciones-modulo" ).sortable({
        connectWith: '#sortable-lecciones-todas',
        stop: function( event, ui ) {
            var leccionesObj = getNewPosition( '#sortable-lecciones-modulo' );
            var moduloId = $('#lecciones-modulo').data('modulo');
            updateOrderLecciones( leccionesObj, moduloId );
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
        }
    });
    var options = {
        valueNames: [ 'lesson__name' ]
    };
    var hackerList = new List('lecciones-list', options);
    // Sort Maestros
    $( "#sortable-maestros-curso" ).sortable({
        connectWith: '#sortable-maestros-todos',
        receive: function( event, ui ) {
            var teacherId = ui.item.attr('id');
            var courseId = $('#maestros-curso').data('curso');
            addMaestroCurso( teacherId, courseId );
        }
    });
    $( "#sortable-maestros-todos" ).sortable({
        connectWith: '#sortable-maestros-curso',
        receive: function( event, ui ){
            var teacherId = ui.item.attr('id');
            var courseId = $('#maestros-curso').data('curso');
            removeMaestroCurso( teacherId, courseId );
        }
    });
    // Sort Badges
    $( "#sortable-badges-curso" ).sortable({
        connectWith: '#sortable-badges-todos',
        receive: function( event, ui ) {
            var badgeId = ui.item.attr('id');
            var courseId = $('#badges-curso').data('curso');
            addBadgeCurso( badgeId, courseId );
        }
    });
    $( "#sortable-badges-todos" ).sortable({
        connectWith: '#sortable-badges-curso',
        receive: function( event, ui ){
            var badgeId = ui.item.attr('id');
            var courseId = $('#badges-curso').data('curso');
            removeBadgeCurso( badgeId, courseId );
        }
    });

    $( "#sortable-lecciones-modulo, #sortable-lecciones-todas, #sortable-modulos, #sortable-maestros-todos, #sortable-maestros-curso, #sortable-badges-curso, #sortable-badges-todos" ).disableSelection();
});


/******************************
 * AJAX FUNCTIONS
 ******************************/

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

function addMaestroCurso( idMaestro, idCurso ){
    $.post(
        ajax_url,
        {
            id_maestro:     idMaestro,
            id_curso:       idCurso,
            action:         'add_maestro_curso'
        },
        function( response ){
            console.log( response );
        }
    );
}

function removeMaestroCurso( idMaestro, idCurso ){
    $.post(
        ajax_url,
        {
            id_maestro:     idMaestro,
            id_curso:       idCurso,
            action:         'remove_maestro_curso'
        },
        function( response ){
            console.log( response );
        }
    );
}

function addBadgeCurso( idBadge, idCurso ){
    $.post(
        ajax_url,
        {
            id_badge:   idBadge,
            id_curso:   idCurso,
            action:     'add_badge_curso'
        },
        function( response ){
            console.log( response );
        }
    );
}

function removeBadgeCurso( idBadge, idCurso ){
    $.post(
        ajax_url,
        {
            id_badge:   idBadge,
            id_curso:   idCurso,
            action:     'remove_badge_curso'
        },
        function( response ){
            console.log( response );
        }
    );
}

/******************************
 * GENERAL FUNCTIONS
 ******************************/

function updateListNumbers( listSelector ){
    $( listSelector + ' li' ).each( function(i, li){
        $(li).find('.modulo__number, .lesson__number').text(i+1+'. ');
    })
}

function eraseListNumbers( listSelector ){
    $( listSelector + ' li' ).each( function(i, li){
        $(li).find('.modulo__number, .lesson__number').text('');
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
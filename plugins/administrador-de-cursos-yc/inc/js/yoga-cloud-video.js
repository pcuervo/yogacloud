function YogaCloudVideo( courseId, lessonId, player, isWatched ){
    this.PERCENT_TO_MARK_AS_WATCHED = 95;
    this.INTERVAL = 2000;

    this._courseId = courseId;
    this._lessonId = lessonId;
    this._player = player;
    this._elapsedTimeInterval;
    this._duration = 0;
    this._isMarkedAsWatched = isWatched;
    //this._isCourseCompleted = completed;
}

YogaCloudVideo.prototype = {
    constructor: YogaCloudVideo,
    _init: function(){
        this._player.getDuration().then(function(duration) {
            this._duration = duration;
        }).catch(function(error) { console.log( error ); });

        var self = this;
        this._player.on('play', function() {
            if( ! self._isMarkedAsWatched ) {
                self._elapsedTimeInterval = setInterval( self.countElapsedTime.bind(self), self.INTERVAL);
                return;
            }
        });
        this._player.on('pause', function() {
            clearInterval( self._elapsedTimeInterval );
        });
        this._player.on('ended', function(){
            clearInterval( self._elapsedTimeInterval );
            self.isCourseCompleted();
        });
        $('#play-button').on('click', function(e){
            e.preventDefault();
            self._player.play();
        });
    },
    countElapsedTime: function(){
        var self = this;
        this._player.getCurrentTime().then(function(seconds) {
            var percentWatched = self.getPercentWatched( seconds );
            if( self.PERCENT_TO_MARK_AS_WATCHED <= percentWatched ){
                clearInterval( self._elapsedTimeInterval );
                self.markAsWatched();
            }

        }).catch(function(error) {
            console.log( error );
        });
    },
    getDuration: function(){
        return _duration;
    },
    getPercentWatched: function( elapsedSeconds ){
        return Math.floor( elapsedSeconds / this.getDuration() * 100 );
    },
    markAsWatched: function(){
        if( this._isMarkedAsWatched ) return;

        this._isMarkedAsWatched = true;
        $.post(
            ajax_url,
            {
                lesson_id:  this._lessonId,
                action:     'mark_lesson_as_watched'
            },
            function( response ){
                console.log( response );
                // Hacer algo cuando se termina el curso
                console.log('watched');
                $('.js-lesson-completed').removeClass('not-visible').addClass('visible');
            }
        );
    },
    isCourseCompleted: function(){
        console.log('checking if course has been completed...');
        //if( this._isMarkedAsWatched ) return;

        //this._isCourseCompleted = true;
        $.post(
            ajax_url,
            {
                course_id:  this._courseId,
                action:     'is_course_completed'
            },
            function( response ){
                console.log( response );
            }
        );
    }
}

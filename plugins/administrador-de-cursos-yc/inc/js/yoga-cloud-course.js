function YogaCloudCourse( player, watched ){
    this.PERCENT_TO_MARK_AS_WATCHED = 80;
    this.INTERVAL = 2000;

    this._player = player;
    this._elapsedTimeInterval;
    this._duration = 0;
    this._isMarkedAsWatched = watched;
}

YogaCloudCourse.prototype = {
    constructor: YogaCloudCourse,
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
            console.log('go to next course PENDING...');
            clearInterval( self._elapsedTimeInterval );
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
        this._isMarkedAsWatched = true;
    }
}
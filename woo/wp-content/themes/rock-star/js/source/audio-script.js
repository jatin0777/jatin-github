/******************AUDIO**********************/

var b = document.documentElement;
b.setAttribute('data-useragent', navigator.userAgent);
b.setAttribute('data-platform', navigator.platform);
jQuery(function ($) {
    var supportsAudio = !!document.createElement('audio').canPlayType;
    if (supportsAudio) {
        var index = 0,
            playing = false,
            //mediaPath = 'http://local.wordpress.dev/wp-content/uploads/2016/06/',
            tracks = track_data, //get track_data from wp_localize_script
            trackCount = tracks.length,
            npAlbumArt = $('#npAlbumArt'),
            npAction   = $('#npAction'),
            npTitle    = $('#npTitle'),
            npAlbum    = $('#npAlbum'),
            npSinger   = $('#npsinger'),
            audio = $('#audio1').bind('play', function () {
                playing = true;
                $('#btnPlay').addClass('play');
            }).bind('pause', function () {
                playing = false;
                $('#btnPlay').removeClass('play');
            }).bind('ended', function () {
                if ((index + 1) < trackCount) {
                    index++;
                    loadTrack(index);
                    audio.play();
                } else {
                    audio.pause();
                    index = 0;
                    loadTrack(index);
                }
            }).get(0),

            btnPlay = $('#btnPlay').click(function () {
                audio.play();
                $('#btnPlay').toggleClass('play');
                if($('#btnPlay').hasClass('play'))
                    audio.play();
                else
                    audio.pause();
            }),

            btnRepeat = $('#btnRepeat').click(function () {
                $('#btnRepeat').toggleClass('repeat-on');
                $('#audio1').prop('loop', true);
                if($('#btnRepeat').hasClass('repeat-on'))
                    $('#audio1').prop('loop', true);
                else
                    $('#audio1').prop('loop', false);
            }),

            btnHeart = $('#btnHeart').click(function () {
                $('#btnHeart .genericon').toggleClass('added');
            }),

            btnPrev = $('#btnPrev').click(function () {
                if ((index - 1) > -1) {
                    index--;
                    loadTrack(index);
                    if (playing) {
                        audio.play();
                    }
                } else {
                    audio.pause();
                    index = 0;
                    loadTrack(index);
                }
            }),
            btnNext = $('#btnNext').click(function () {
                if ((index + 1) < trackCount) {
                    index++;
                    loadTrack(index);
                    if (playing) {
                        audio.play();
                    }
                } else {
                    audio.pause();
                    index = 0;
                    loadTrack(index);
                }
            }),
            li = $('#plList li').click(function () {
                var id = parseInt($(this).index());
                if (id !== index) {
                    playTrack(id);
                }
            }),
            loadTrack = function (id) {
                $('.plSel').removeClass('plSel');
                $('#plList li:eq(' + id + ')').addClass('plSel');
                npTitle.text(tracks[id].name);
                npAlbum.text(tracks[id].album);
                npAlbumArt.parent().hide();
                if ( '' != tracks[id].album_art){
                    npAlbumArt.attr( 'src', tracks[id].album_art);
                    npAlbumArt.parent().show();
                }
                npSinger.text(tracks[id].singer);
                index = id;
                audio.src = /*mediaPath + */tracks[id].file;
            },
            playTrack = function (id) {
                loadTrack(id);
                audio.play();
            };
        extension = audio.canPlayType('audio/mpeg') ? '.mp3' : audio.canPlayType('audio/ogg') ? '.ogg' : '';
        loadTrack(index);
    }
});

/********************* END AUDIO *****************/
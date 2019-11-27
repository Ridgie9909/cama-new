(function() {
    var canvas = document.getElementsById('canvas');
    var context = canvas.getContext('2d');
    var video = document.getElementById('video');
    var img;
    var videoflag = 0

    if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia){
        navigator.mediaDevices.getUserMedia({
            video: true
        }).then(function(stream){
            video.srcObject = stream;
            video.play();
        });
    }
    document.getElementById("snap").addEventListener("click", function() {
        context.drawImage(video, 0, 0, 800, 600);
        videoflag = 1;
    });
})();
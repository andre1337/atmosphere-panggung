<!DOCTYPE html>
<html>
<body>
    
    <script>
    function changeImage() {
        var image = document.getElementById('myImage');
        image.src = "http://localhost/webmonitoring/grafik/indexgrafik.php?" + new Date().getTime();
    }
    
    
    function countdown() {
    // your code goes here
    var count = 1;
    var timerId = setInterval(function() {
        count--;
       // console.log(count);
       document.getElementById("cdown").innerHTML = count.toString();
 
        if(count == 0) {
            changeImage();
            count = 1;
        }
    }, 1000);
}
 
countdown();
 
    </script>
    <p>The graph will update in : <span id="cdown" style="color:blue; font-size:20px"></span></p>
    <img id="myImage" src="http://localhost/webmonitoring/grafik/indexgrafik.php?" width="1200" height="500" />
    
 
 
</body>
</html>
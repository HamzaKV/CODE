var screenHeight = screen.height;
var screenWidth = screen.width;
var string;

function bgHeight () {
    return screenHeight;
}

function bgWidth() {
    return screenWidth;
}
function xupdate(string) {
    this.string = string;
}
function adjustSize() {
    var x = bgWidth();
    if(x < '1360') 
    {
        document.getElementById("changer").style.width = "78%";
    } else if(x < '1440') 
    {
        document.getElementById("changer").style.width = "75%";
    } else if (x < '1600')
    {
        //alert(x);
        document.getElementById("changer").style.width = "68%";
    } else 
    {
        
    }
    
    
}

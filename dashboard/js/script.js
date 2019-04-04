function resize() {
    var heights = window.innerHeight;
    if (heights > 768) {
        document.getElementById("iframe").style.height = heights - 80 + "px";
    } else {
        document.getElementById("iframe").style.height = heights + "px";
    }
}
resize();


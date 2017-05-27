(function() {
    function countLines(event) {
        var style = window.getComputedStyle(event, null);
        var height = parseInt(style.getPropertyValue("height"));
        var font_size = parseInt(style.getPropertyValue("font-size"));
        var line_height = parseInt(style.getPropertyValue("line-height"));
        var box_sizing = style.getPropertyValue("box-sizing");

        if(isNaN(line_height)) line_height = font_size * 1.2;

        if(box_sizing=='border-box') {
            var padding_top = parseInt(style.getPropertyValue("padding-top"));
            var padding_bottom = parseInt(style.getPropertyValue("padding-bottom"));
            var border_top = parseInt(style.getPropertyValue("border-top-width"));
            var border_bottom = parseInt(style.getPropertyValue("border-bottom-width"));
            height = height - padding_top - padding_bottom - border_top - border_bottom
        }
        
        var lines = Math.ceil(height / line_height);
        var duration = Math.ceil(lines);
        event.style.animation = "scroll " + duration + "s linear 3s infinite";
        alert("Lines:" + lines);
        return lines;
    }
    return countLines(document.getElementById("paper-content"));
})();
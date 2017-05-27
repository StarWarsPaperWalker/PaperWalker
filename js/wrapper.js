var tags = ["p", "h1", "h2", "h3", "h4", "h5", "h6", "a", "span", "ul", "li", "code", "section", "article"]
var removables = ["img", "figure", "pre", "style", "script"]

for(i = 0; i < tags.length; i++) {
    var nodes = document.getElementsByTagName(tags[i]);
    for(j = 0; j < nodes.length; j++) {
        nodes[j].className += " wrapper";
    }
}

for(i = 0; i < removables.length; i++) {
    var nodes = document.getElementsByTagName(removables[i]);
    for(j = nodes.length - 1; j >= 0; j--) {
        nodes[j].parentNode.removeChild(nodes[j]);
    }
}
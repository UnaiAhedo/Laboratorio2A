function contarPreguntas(email){
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var total = contar(this, email)[0];
            var concretas = contar(this, email)[1];
            document.getElementById("pregTotPer").innerHTML = concretas + " / " + total;
        }
    };
    xmlhttp.open("GET", "../xml/Questions.xml", true);
    xmlhttp.send();
    
   function contar(xml, email) {
        var x, i, xmlDoc;
        var j = 0;
        xmlDoc = xml.responseXML;
        x = xmlDoc.getElementsByTagName('assessmentItem');
        for (i = 0; i < x.length; i++) {
            if(x[i].getAttribute('author') == email){
                j = j + 1;
            }
        }
    return [i, j];
    }
}

function contarUsuarios(){
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var xmlDoc;
            xmlDoc = this.responseXML;
            document.getElementById("usuariosCon").innerHTML = xmlDoc.getElementsByTagName('cont')[0].childNodes[0].nodeValue;
        }
    };
    xmlhttp.open("GET", "../xml/Counter.xml", true);
    xmlhttp.send();
}
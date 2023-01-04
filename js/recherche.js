function FindNext () {
    var str = document.getElementById ("findField").value; // note : recupere la valeur de input en créant una var.
    if (str == "") {
        alert ("Entrer du text pour chercher");
        return;
    }

    var supported = false;
    var found = false;
    if (window.find) {        // Firefox, Google Chrome, Safari
        supported = true;
            // si un contenu est sélectionné, la position de départ de la recherche
            // sera la position finale de la sélection
        found = window.find (str);
    }
    else {
        if (document.selection && document.selection.createRange) { // Internet Explorer, Opera before version 10.5
            var textRange = document.selection.createRange ();
            if (textRange.findText) {   // Internet Explorer
                supported = true;
                    // si un contenu est sélectionné, la position de départ de la recherche
                    // sera la position après la position de départ de la sélection
                if (textRange.text.length > 0) {
                    textRange.collapse (true);
                    textRange.move ("charactère", 1);
                }

                found = textRange.findText (str);
                if (found) {
                    textRange.select ();
                }
            }
        }
    }

    if (supported) {
        if (!found) {
            alert ("Erreur:404\n" + str);
        }
    }
    else {
        alert ("Erreur:403");
    }
}
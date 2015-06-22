
//Créée un objet xhr
//1/création de l'xhr

var xhr = getXMLHttpRequest(); 

//2/vérification via status http et code retour que la co est ok
xhr.onreadystatechange = function() {
	if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
		alert("OK"); // C'est bon \o/
	}
};


request(readData);

/******************************************************************************************
 * !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!		FONCTIONS		!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!*
 ******************************************************************************************/

/**
 * Fonction qui prépare l'objet xhr
 * @returns
 */

function getXMLHttpRequest() {
	var xhr = null;
	
	if (window.XMLHttpRequest || window.ActiveXObject) {
		if (window.ActiveXObject) {
			try {
				xhr = new ActiveXObject("Msxml2.XMLHTTP");
			} catch(e) {
				xhr = new ActiveXObject("Microsoft.XMLHTTP");
			}
		} else {
			xhr = new XMLHttpRequest(); 
		}
	} else {
		alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
		return null;
	}
	
	return xhr;
}

function request(callback) {
    var xhr = getXMLHttpRequest();
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            callback(xhr.responseText);
        }
    };
 //3/envoyer des values au php :
    /*
     * xhr.open("GET", "handlingData.php?variable1=truc&variable2=bidule", true);
     */
    xhr.open("GET", "handlingData.php", true);
    xhr.send(null);
}

function readData(sData) {
    // On peut maintenant traiter les données sans encombrer l'objet XHR.
    if (sData == "OK") {
        alert("C'est bon");
    } else {
        alert("Y'a eu un problème");
    }
}



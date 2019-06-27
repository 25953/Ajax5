function showList(str, typeSearch) {
  console.log(typeSearch); 
  if (str == "") {
    document.getElementById("txtHint").innerHTML = ""; 
  }
  let xmlhttp = new XMLHttpRequest();
  if (window.XMLHttpRequest) {}
  else {} 
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      let responseString = this.responseText;
      console.log("JSON string is binenn")
      
      if (typeSearch == "list") {
        console.log("Er word een list gebruikt");
        responseArray = JSON.parse(responseString);
        printArray(responseArray);
      }

      if (typeSearch == "answer") {
        console.log("Er word een answer gebruikt");
        parseJson(responseString);
      }
    }
  };
  // Author: Kevin Kranenburg
  let httpString = "getdata.php?q=" + str + "&type=" + typeSearch; 
  xmlhttp.open("GET", "getdata.php?q=" + str + "&type=" + typeSearch, true);
  xmlhttp.send();
}

let searchCountry = document.getElementById('searchCountry');
searchCountry.addEventListener("keyup", printArray);
function printArray(responseArray) {
  console.log(responseArray);
  let localString = "<ul>";
  for (let i = 0; i < responseArray.length; i++) {
    localString += "<li onclick=showList('" + responseArray[i] + "','answer')>" + responseArray[i] + "</li>";
    console.log(localString)
  }
  document.getElementById("txtHint").innerHTML = localString + "</ul>";   
}

function parseJson(result) {
  console.log(result)
  console.log("Result gelogd")
  let localString = result; 
  document.getElementById("txtHint").innerHTML = localString; 
}

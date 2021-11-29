

//placement info
var Company_nameObject = {
    "Oracle": {
      "Intern" :[],
      "Full Time" :[]
    },
    "Cisco": {
      "Intern" : [],
      "Full Time" : []
    }
  }
  window.onload = function() {
    var Company_nameSel = document.getElementById("Company_name");
    var RoleSel = document.getElementById("Role");
    
    for (var x in Company_nameObject) {
      Company_nameSel.options[Company_nameSel.options.length] = new Option(x, x);
    }
    Company_nameSel.onchange = function() {
      
      RoleSel.length = 1;
      for (var y in Company_nameObject[this.value]) {
        RoleSel.options[RoleSel.options.length] = new Option(y, y);
      }
    }          
  }
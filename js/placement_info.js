//placement info
var RoleObject = {
    "Intern": {
      "Qualcomm" :[],
      "GE Healhcare" :[],
      "Oracle" :[],
      "JP Morgan" :[]
    },
    "Full Time": {
      "Oracle" : [],
      "Cisco" : []
    }
  }
  window.onload = function() {
    var Company_nameSel =document.getElementById("Company_name");
    var RoleSel = document.getElementById("Role");
    for (var x in RoleObject) 
    {
      RoleSel.options[RoleSel.options.length] = new Option(x, x);
    }
    RoleSel.onchange = function() {
      
	      Company_nameSel.length = 1;
	      for (var y in RoleObject[this.value]) 
	      {
		Company_nameSel.options[Company_nameSel.options.length] = new Option(y, y);
	      }
    }          
  }

  

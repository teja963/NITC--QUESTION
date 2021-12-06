//elective info
var Course_IDObject = {
  "CS4022D": {
    "Principle of Programming Languages": ["Saleena N"]
  },
  "CS4044D": { 
    "Machine Learning": ["P N Pournami"]
  },
  "CS4050D": {
    "Design and Analysis of Algorithms": ["Sheerazudheen"]
  },
  "CS4021D": {
    "Number Theory and Cryptography" : ["Hiran V Nath"]
  },
  "CS4067D":{
    "Foundations of Programming" : ["Vinod Pathari"]
  },
  "CS3007D": {
    "Object Oriented Systems"    : ["Manjusha"]
  },
  "CH3028D": {
    "Fertilizer Technology" : ["Sushmitha"]
  },
  "CH3022D": {
    "Petroleum Refining Operations and Processes" : ["Paneerselvam"]
  },
  "CH3029D": {
    "OPERATIONS RESEARCH" : ["Sudev Das"]
  },
  "CH3021D": {
    "Energy Technology" : ["Dhanya"]
  },
  "CH3027D": {
    "Biotechnology" : ["Swapan Reddy"]
  },
  "CE3038D": {
    "TRAFFIC ENGINEERING" : ["Sivakumar"]
  },
  "CE3003D": {
    "NUMERICAL METHODS IN CIVIL ENGINEERING" : ["Ranjitha"]
  },
  "CE3022D": {
    "CONCRETE TECHNOLOGY" : ["Muthukumar"]
  }
}

var RoleObject = {
  "Intern": {
    "Qualcomm" :[],
    "GE Healthcare" :[],
    "Oracle" :[],
    "JP Morgan" :[]
  },
  "Full Time": {
    "VMWare" : [],
    "Amdocs" : [],
    "VisaInc" : []
  }
}

window.onload = function() {
  var Course_IDSel = document.getElementById("Course_ID");
  var Course_nameSel = document.getElementById("Course_name");
  var Faculty_nameSel = document.getElementById("Faculty_name");
  for (var x in Course_IDObject) {
    Course_IDSel.options[Course_IDSel.options.length] = new Option(x, x);
  }
  Course_IDSel.onchange = function() {
    //empty Chapters- and Topics- dropdowns
    Faculty_nameSel.length = 1;
    Course_nameSel.length = 1;
    //display correct values
    for (var y in Course_IDObject[this.value]) {
        Course_nameSel.options[Course_nameSel.options.length] = new Option(y, y);
    }
  }
  Course_nameSel.onchange = function() {
    //empty Faculty_names dropdown
    Faculty_nameSel.length = 1;
    //display correct values
    var z = Course_IDObject[Course_IDSel.value][this.value];
    for (var i = 0; i < z.length; i++) {
        Faculty_nameSel.options[Faculty_nameSel.options.length] = new Option(z[i], z[i]);
    }
  }
  var RoleSel = document.getElementById("Role");
  var Company_nameSel =document.getElementById("Company_name");    
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

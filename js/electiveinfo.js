//elective info
var Course_IDObject = {
    "CS4022D": {
      "Principle of Programming Languages": ["Saleena N", "Vineeth Paleri"]
    },
    "CS4044D": { 
      "Machine Learning": ["Pournima"]
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
  }
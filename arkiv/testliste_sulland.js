function myFunction() {
    var input, filter, table, tr, td, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
  
    
    table = document.getElementById("verktoytabell");
    var rows = table.getElementsByTagName("tr");
   
    for (i = 1; i < rows.length; i++) {
      var cells = rows[i].getElementsByTagName("td");
      var j;
      var rowContainsFilter = false;
      for (j = 0; j < cells.length; j++) {
        if (cells[j]) {
          if (cells[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
            rowContainsFilter = true;
            continue;
          }
        }
      }
  
      if (! rowContainsFilter) {
        rows[i].style.display = "none";
      } else {
        rows[i].style.display = "";
      }
    }
  }
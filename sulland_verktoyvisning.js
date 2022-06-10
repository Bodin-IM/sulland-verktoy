// search function
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
  
  
  // select theme
  const setTheme = theme => document.documentElement.className = theme;
  document.getElementById('theme-select').addEventListener('change', function() {
    setTheme(this.value);
  });
  
  
  
  //Get the button
  var mybutton = document.getElementById("myBtn");
  
  // When the user scrolls down 20px from the top of the document, show the button
  window.onscroll = function() {scrollFunction()};
  
  function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      mybutton.style.display = "block";
    } else {
      mybutton.style.display = "none";
    }
  }
  
  // When the user clicks on the button, scroll to the top of the document
  function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  }
  
  //sortering av tabell funksjon
  document.addEventListener('DOMContentLoaded', function () {
                  const table = document.getElementById('verktoytabell');
                  const headers = table.querySelectorAll('th');
                  const tableBody = table.querySelector('tbody');
                  const rows = tableBody.querySelectorAll('tr');
  
                  // Track sort directions
                  const directions = Array.from(headers).map(function (header) {
                      return '';
                  });
  
                  // Transform the content of given cell in given column
                  const transform = function (index, content) {
                      // Get the data type of column
                      const type = headers[index].getAttribute('data-type');
                      switch (type) {
                          case 'number':
                              return parseFloat(content);
                          case 'string':
                          default:
                              return content;
                      }
                  };
  
                  const sortColumn = function (index) {
                      // Get the current direction
                      const direction = directions[index] || 'asc';
  
                      // A factor based on the direction
                      const multiplier = direction === 'asc' ? 1 : -1;
  
                      const newRows = Array.from(rows);
  
                      newRows.sort(function (rowA, rowB) {
                          const cellA = rowA.querySelectorAll('td')[index].innerHTML;
                          const cellB = rowB.querySelectorAll('td')[index].innerHTML;
  
                          const a = transform(index, cellA);
                          const b = transform(index, cellB);
  
                          switch (true) {
                              case a > b:
                                  return 1 * multiplier;
                              case a < b:
                                  return -1 * multiplier;
                              case a === b:
                                  return 0;
                          }
                      });
  
                      // Remove old rows
                      [].forEach.call(rows, function (row) {
                          tableBody.removeChild(row);
                      });
  
                      // Reverse the direction
                      directions[index] = direction === 'asc' ? 'desc' : 'asc';
  
                      // Append new row
                      newRows.forEach(function (newRow) {
                          tableBody.appendChild(newRow);
                      });
                  };
  
                  [].forEach.call(headers, function (header, index) {
                      header.addEventListener('click', function () {
                          sortColumn(index);
                      });
                  });
              });
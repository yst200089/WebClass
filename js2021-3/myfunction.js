// 直接寫函數就好
// 制定函數
   function $(id) {
      return document.getElementById(id);
   }
   // 表格增加一列資料
   function insertRow(table) {
      // 利用arguments陣列
      var days = 31;
      var strRow = "<tr>";
      // for (let i = 1; i < arguments.length; i++) { // 從1開始，table是第0個參數 ,arguments=table
      //    strRow += "<td>" + arguments[i] + "</td>"; // 放入col
      // }
      for (let i = 1; i < days; i++) { // 從1開始，table是第0個參數 ,arguments=table
         strRow += "<td>" + i + "</td>"; // 放入col
      }
      strRow += "</tr>";
      table.innerHTML += strRow; // 將 strRow 加 table
   }
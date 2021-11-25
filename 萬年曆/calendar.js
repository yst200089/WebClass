// 紀錄當下時間
var now_date = new Date();
var y = now_date.getFullYear();
var m = now_date.getMonth();
var d = now_date.getDate();
// 月數
var Leap = [31,29,31,30,31,30,31,31,30,31,30,31]; // 閏年
var Normal = [31,28,31,30,31,30,31,31,30,31,30,31]; // 平年
var MonthName = ["January", "Febrary", "March", "April", "May", "June", "July", "Auguest", "September", "October", "November", "December"];
function search() {
    var sy = document.getElementById("sy").value;
    var sm = document.getElementById("sm").value;
    var sd = document.getElementById("sd").value;
    if (sy == "" || sm == "" || sd == "") {
        alert("< 輸入錯誤 > 年月日的輸入不可為空！");
    }
    else if (!IsNum(sy) || !IsNum(sm) || !IsNum(sd)) {
        alert("< 輸入錯誤 > 年月日請輸入正整數！");
    }
    else if (sm > 12 || sm < 1) {
        alert("< 月份輸入錯誤 > 沒有" + sm + "這個月份");
    }
    else if (sd > day(sy, sm-1) || sd < 1) {
        alert("< 日期輸入錯誤 > "+ sy + "年" + sm + "月沒有" + sd + "日");
    }
    else {
        clear();
        y = sy;
        m = sm-1;
        create(y, m);
    }
}
function IsNum(num){
    var reNum = /^\d*$/;
    return(reNum.test(num));
}
function Last() {
    clear();
    m -= 1;
    create(y, m);
    if (m > 11) {
        y++;
        m = 0;
        create(y, m);
    }
    else if (m < 0) {
        y--;
        m = 11;
        create(y, m);
    }
    else {
        create(y, m);
    }
}
function Next() {
    clear();
    m += 1;
    if (m > 11) {
        y++;
        m = 0;
        create(y, m);
    }
    else if (m < 0) {
        y--;
        m = 11;
        create(y, m);
    }
    else {
        create(y, m);
    }
}
//清除日曆資料
function clear() {
    var Days = t1.getElementsByTagName("td");
    for (var i = 0; i < Days.length; i++) {
        Days[i].innerHTML = "&nbsp";
        // 清除今天的樣式
        Days[i].id = "";
    }
}
// 找當月1號是星期幾
function startMonth(y, m) {
    var startDate = new Date(y, m, 1); // new Date (year, month, date, hours, minutes, seconds, ms)
    return (startDate.getDay());
}
// 判斷閏或平年計算該月天數
function day(y, m) {
    var check = y % 4;
    if (check == 0) {
        return (Leap[m]);
    }
    else {
        return (Normal[m]);
    }
}
// 產生
function create(y, m) {
    t1.getElementsByTagName("th")[1].innerHTML = MonthName[m] + " " + y;
    var days = day(y, m); // 計算天數
    var startday = startMonth(y, m); // 找當月1號是星期幾
    for(var i=1; i <= days; i++) {
        t1.getElementsByTagName("td")[startday+i-1].innerHTML = i;
        var now = new Date();
        var NY = now.getFullYear();
        var NM = now.getMonth();
        var ND = now.getDate();
        if (i == ND && m == NM && y == NY) {
            t1.getElementsByTagName("td")[startday+i-1].id = "today";
        }
        var sy = document.getElementById("sy").value;
        var sm = document.getElementById("sm").value;
        var sd = document.getElementById("sd").value;
        //i == document.getElementById("sd").value && m == document.getElementById("sm").value && y == document.getElementById("sy").value
        if (i == sd && m+1 == sm && y == sy) {
            t1.getElementsByTagName("td")[startday+i-1].id = "sear";
        }
    }
}
function filtterointi() {
    var input, filter, table, tr, td, i;
    input = document.getElementById("filtterointiInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("taulupohjamuokattava");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        td1 = tr[i].getElementsByTagName("td")[1];
        td2 = tr[i].getElementsByTagName("td")[2];
        td3 = tr[i].getElementsByTagName("td")[3];
        td4 = tr[i].getElementsByTagName("td")[4];
        td5 = tr[i].getElementsByTagName("td")[5];
        td6 = tr[i].getElementsByTagName("td")[6];
        td7 = tr[i].getElementsByTagName("td")[7];
        if (td) {
            if (
                (td.innerHTML.toUpperCase().indexOf(filter) > -1) ||
                (td1.innerHTML.toUpperCase().indexOf(filter) > -1) ||
                (td2.innerHTML.toUpperCase().indexOf(filter) > -1) ||
                (td3.innerHTML.toUpperCase().indexOf(filter) > -1) ||
                (td4.innerHTML.toUpperCase().indexOf(filter) > -1) ||
                (td5.innerHTML.toUpperCase().indexOf(filter) > -1) ||
                (td6.innerHTML.toUpperCase().indexOf(filter) > -1) ||
                (td7.innerHTML.toUpperCase().indexOf(filter) > -1)
            ) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
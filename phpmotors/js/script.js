const monthNames = ["January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"
];

function lastModified() {
    var modiDate = new Date(document.lastModified);
    var showAs = modiDate.getDate() + " " + monthNames[modiDate.getMonth()] + ", " + modiDate.getFullYear();
    return showAs
}



document.getElementById("lastMod").innerHTML = ( "Last Updated: " + lastModified());

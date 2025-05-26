// let mahasiswa ={
//     nama : "Suci Puspita Sari",
//     nim : "2217020043",
//     email : "puspitasarisuci946@gmail.com",

// }
// console.log (mahasiswa);

let xhr = new XMLHttpRequest();
xhr.onreadystatechange == function () {
    if (xhr.readyState == 4 && xhr.status == 200){
        let mahasiswa = this.ResponseText;
        console.log(mahasiswa);
    }
}

xhr.open('GET', 'coba.json', true);
xhr.send();
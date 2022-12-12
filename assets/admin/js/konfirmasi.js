function hapuskonsumen(url){
    Swal.fire({
        title: 'Are you sure',
        text: "Yakin ingin hapus data konsumen?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ya, hapus!'
    }).then((result) => {
        if(result.value){
            document.location.href = url;
        }
    })
}
function hapus(url){
    Swal.fire({
        title: 'Are you sure',
        text: "Yakin ingin hapus slider?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ya, hapus!'
    }).then((result) => {
        if(result.value){
            document.location.href = url;
        }
    })
}

function hapuPaket(url){
    Swal.fire({
        title: 'Are you sure',
        text: "Yakin ingin hapus data paket?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ya, hapus!'
    }).then((result) => {
        if(result.value){
            document.location.href = url;
        }
    })

}
function hapusAbout(url){
    Swal.fire({
        title: 'Are you sure',
        text: "Yakin ingin hapus About?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ya, hapus!'
    }).then((result) => {
        if(result.value){
            document.location.href = url;
        }
    })
}
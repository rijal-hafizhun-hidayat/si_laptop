function confirm_hapus(data){
    let pesan = confirm('yakin ingin hapus data ?');
	if(pesan == true){
		window.location = '/dashbord_admin/hapus/' + data;
	}
	else{
	    return false;
	}
}

function confirm_edit(data){
    window.location = '/dashbord_admin/edit/' + data;
}

function hapus(data){
    let pesan = confirm('yakin ingin hapus data ?');
	if(pesan == true){
		window.location = '/dashbord_supplier/hapus/' + data;
	}
	else{
	    return false;
	}
}

function edit(data){
    window.location = '/dashbord_supplier/edit/' + data;
}

function hapus_akun(data){
    let pesan = confirm('yakin ingin hapus data ?');
	if(pesan == true){
		window.location = '/dashbord_super/hapus/' + data;
	}
	else{
	    return false;
	}
}

function edit_akun(data){
    window.location = '/dashbord_super/edit_akun/' + data;
}
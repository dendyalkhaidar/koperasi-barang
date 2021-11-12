$(function () {
	$(".tomboltambah").on("click", function () {
		$("#NewBarangModalLabel").html("Data Barang");
		$(".modal-footer button[type=submit]").html("Tambah Data");
	});
	$(".tampilmodalubah").on("click", function () {
		$("#NewBarangModalLabel").html("Ubah Data Barang");
		$(".modal-footer button[type=submit]").html("Ubah Data");

		const id = $(this).data("id");
		$.ajax({
			url: "http://localhost/koperasi_barang/barang/getubah",
			data: { id: id },
			method: "post",

			success: function (data) {
				console.log(data);
			},
		});
	});
});

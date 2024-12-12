<div {{ $attributes }} tabindex="-1" aria-labelledby="exampleModalLabel4" aria-hidden="true" data-modal-type="x-cetak">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Detail Pelanggan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <form action="edit" method="post" id="editForm" name="cetak">
                        @csrf
                        <input type="number" name="id" id="idUpdate" value="" hidden>
                        <label for="detailNama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" value="">

                        <label for="detailJam" class="form-label">Jam</label>
                        <input type="text" class="form-control" name="jam" value="" readonly>

                        <label for="nomorhp" class="form-label">Nomor HP</label>
                        <input type="text" class="form-control" id="nomorhp" name="nomorhp" value="">


                        <label for="detailTambahanOrang" class="form-label">Tambahan Orang</label>
                        <input type="text" class="form-control" id="detailTambahanOrang" name="tambahan_orang"
                            value="">


                        <label for="paket" class="form-label">Paket</label>
                        <select name="paket" id="" class="form-select">
                            <option value="tidak ada">Tidak Ada</option>
                            <option value="Regular">Regular</option>
                            <option value="Premium">Premium</option>

                        </select>


                        <label for="tambahan_foto" class="form-label
                        ">Tambahan
                            Foto</label>
                        <select name="tambahan_foto" id="tambahanfoto" class="form-select">
                            <option value="0">Tidak Ada</option>
                            <option value="1">1 Foto</option>
                            <option value="2">2 Foto</option>
                            <option value="3">3 Foto</option>
                            <option value="4">4 Foto</option>
                            <option value="5">5 Foto</option>
                            <option value="6">6 Foto</option>
                            <option value="7">7 Foto</option>
                            <option value="8">8 Foto</option>
                            <option value="9">9 Foto</option>
                            <option value="10">10 Foto</option>
                        </select>
                        <label for="tambahan_waktu" class="form-label">Tambahan Waktu</label>
                        <select name="tambahan_waktu" id="tambahanwaktu" class="form-select">
                            <option value="0">Tidak Ada</option>
                            <option value="6">6 Menit</option>
                            <option value="12">12 Menit</option>
                            <option value="18">18 Menit</option>
                        </select>


                        <label for="detailHarga" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="detailHarga" name="harga" readonly
                            value="">



                        <input type="text" name="haritanggal" value="{{ date('Y-m-d') }}" hidden>

                        <button type="submit" name="submits" class="btn btn-primary mt-3">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-client-lS8J2vE8l9xMLkvu"></script> --}}


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var edit = document.getElementById('Edits');
        edit.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-id');
            var nama = button.getAttribute('data-nama');
            var jam = button.getAttribute('data-jam');
            var nomorhp = button.getAttribute('data-nomorhp');
            var tambahan_orang = button.getAttribute('data-tambahanorang');
            var paket = button.getAttribute('data-paket');
            var tambahan_foto = button.getAttribute('data-tambahanfoto');
            var tambahan_waktu = button.getAttribute('data-tambahanwaktu');
            var harga = button.getAttribute('data-harga');

            var modal = document.getElementById('editForm');
            modal.querySelector('[name=id]').value = id;
            modal.querySelector('[name=nama]').value = nama;
            modal.querySelector('[name=jam]').value = jam;
            modal.querySelector('[name=tambahan_orang]').value = tambahan_orang;
            modal.querySelector('[name=paket]').value = paket;
            modal.querySelector('[name=nomorhp]').value = nomorhp;
            modal.querySelector('[name=tambahan_foto]').value = tambahan_foto;
            modal.querySelector('[name=tambahan_waktu]').value = tambahan_waktu;
            modal.querySelector('[name=harga]').value = harga;


            console.log(nama);


        })
    });
</script>

<div {{ $attributes }} tabindex="-1" aria-labelledby="exampleModalLabel4" aria-hidden="true" data-modal-type="x-cetak">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Detail Pelanggan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <form action="{{ url('/bayar') }}" method="post" id="cetak" name="cetak">
                        @csrf
                        <label for="detailNama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" value="" readonly>

                        <label for="detailJam" class="form-label">Jam</label>
                        <input type="text" class="form-control" name="jam" value="" readonly>

                        <label for="nomorhp" class="form-label">Nomor HP</label>
                        <input type="text" class="form-control" id="nomorhp" name="nomorhp" value=""
                            readonly>


                        <label for="detailTambahanOrang" class="form-label">Tambahan Orang</label>
                        <input type="text" class="form-control" id="detailTambahanOrang" name="tambahan_orang"
                            value="" readonly>

                        <label for="detailPaket" class="form-label">Paket</label>
                        <input type="text" class="form-control" name="paket" value="" readonly>


                        <label for="tambahanFoto" class="form-label
                        ">Tambahan
                            Foto</label>
                        <input type="text" class="form-control" name="tambahan_foto" value="" readonly>

                        <label for="tambahanWaktu" class="form-label">Tambahan Waktu</label>
                        <input type="text" class="form-control" name="tambahan_waktu" value="" readonly>


                        <label for="detailHarga" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="detailHarga" name="harga" readonly
                            value="">

                        <label for="pembayaran" class="form-label">Pembayaran</label>
                        <select class="form-select" id="pembayaran" name="pembayaran">
                            <option value="Cash">Cash</option>
                            <option value="QRIS">QRIS</option>
                        </select>

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
        var cetak = document.getElementById('Cetaks');
        cetak.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var nama = button.getAttribute('data-nama');
            var jam = button.getAttribute('data-jam');
            var tambahan_orang = button.getAttribute('data-tambahanorang');
            var nomorhp = button.getAttribute('data-nomorhp');
            var paket = button.getAttribute('data-paket');
            var tambahan_foto = button.getAttribute('data-tambahanfoto');
            var tambahan_waktu = button.getAttribute('data-tambahanwaktu');
            var harga = button.getAttribute('data-harga');

            var modal = document.getElementById('cetak');
            modal.querySelector('[name=nama]').value = nama;
            modal.querySelector('[name=jam]').value = jam;
            modal.querySelector('[name=nomorhp]').value = nomorhp;
            modal.querySelector('[name=tambahan_orang]').value = tambahan_orang;
            modal.querySelector('[name=paket]').value = paket;
            modal.querySelector('[name=tambahan_foto]').value = tambahan_foto;
            modal.querySelector('[name=tambahan_waktu]').value = tambahan_waktu;
            modal.querySelector('[name=harga]').value = harga;


            console.log(nama);


        })
    });
</script>

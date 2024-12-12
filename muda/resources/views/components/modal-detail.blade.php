<div {{ $attributes }} tabindex="-1" aria-labelledby="exampleModalLabel4" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Detail Pelanggan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <form action="{{ url('/edit/' . $id) }}" method="post" id="formEdit">
                        @csrf
                        @method('put')
                        <label for="detailNama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" value="{{ $nama }}">

                        <label for="detailJam" class="form-label">Jam</label>
                        <input type="text" class="form-control" name="jam" value="{{ $jam }}">

                        <label for="detailTambahanOrang" class="form-label">Tambahan Orang</label>
                        <input type="text" class="form-control" id="detailTambahanOrang" name="tambahan_orang"
                            value="{{ $tambahan_orang }}">

                        <label for="detailPaket" class="form-label">Paket</label>
                        <select class="form-select" name="paket">
                            <option value="tidak">Tidak ada</option>
                            <option value="Regular" @if ($paket == 'Regular') selected @endif>
                                Regular
                            </option>
                            <option value="Premium" @if ($paket == 'Premium') selected @endif>
                                Premium
                            </option>
                        </select>

                        <label for="tambahanFoto" class="form-label
                        ">Tambahan
                            Foto</label>
                        <select class="form-select" name="tambahan_foto">
                            <option value="0" @if ($tambahan_foto == '0') selected @endif>Tidak
                                Ada
                            </option>
                            <option value="1" @if ($tambahan_foto == '1') selected @endif>1 Foto
                            </option>
                            <option value="2" @if ($tambahan_foto == '2') selected @endif>2 Foto
                            </option>
                            <option value="3" @if ($tambahan_foto == '3') selected @endif>3 Foto
                            </option>
                            <option value="4" @if ($tambahan_foto == '4') selected @endif>4 Foto
                            </option>
                            <option value="5" @if ($tambahan_foto == '5') selected @endif>5 Foto
                            </option>
                            <option value="6" @if ($tambahan_foto == '6') selected @endif>6 Foto
                            </option>
                            <option value="7" @if ($tambahan_foto == '7') selected @endif>7 Foto
                            </option>
                            <option value="8" @if ($tambahan_foto == '8') selected @endif>8
                                Foto
                            </option>
                            <option value="9" @if ($tambahan_foto == '9') selected @endif>9
                                Foto
                            </option>
                            <option value="10" @if ($tambahan_foto == '10') selected @endif>10
                                Foto
                            </option>
                        </select>
                        <label for="tambahanWaktu" class="form-label">Tambahan Waktu</label>
                        <select class="form-select" name="tambahan_waktu">
                            <option value="0" @if ($tambahan_waktu == '0') selected @endif>
                                Tidak ada
                            </option>
                            <option value="6" @if ($tambahan_waktu == '6') selected @endif>6
                                Menit
                            </option>
                            <option value="12" @if ($tambahan_waktu == '12') selected @endif>12
                                Menit
                            </option>
                            <option value="18" @if ($tambahan_waktu == 's') selected @endif>18
                                Menit
                            </option>
                        </select>

                        <button type="submit" name="submit" class="btn btn-primary mt-3">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

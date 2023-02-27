@extends('layouts.home-layouts')
<!-- Modal -->
<div class="modal fade" id="ModalBarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Prodak</h5></h5>
          {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button> --}}
          <button type="button" class="close" aria-label="Close" data-bs-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
              <form action="barang" method="POST">
                @csrf
                <div id="method"></div>
                  <div class="mb-3">
                    <label for="exampleInputEmail" class="form-label">Kode Barang</label></label>
                    <input type="number" class="form-control" id="kode_barang" aria-describedby="barang" name="kode_barang">
                    <label for="exampleInputEmail" class="form-label">Produk Id</label></label>
                    <input type="number" class="form-control" id="produk_id" aria-describedby="barang" name="produk_id">
                    <label for="exampleInputEmail" class="form-label">Nama Barang</label></label>
                    <input type="text" class="form-control" id="nama_barang" aria-describedby="barang" name="nama_barang">
                    <label for="exampleInputEmail" class="form-label">Satuan</label></label>
                    <input type="text" class="form-control" id="satuan" aria-describedby="barang" name="satuan">
                    <label for="exampleInputEmail" class="form-label">Harga Jual</label></label>
                    <input type="number" class="form-control" id="harga_jual" aria-describedby="barang" name="harga_jual">
                    <label for="exampleInputEmail" class="form-label">Stok</label></label>
                    <input type="text" class="form-control" id="stok" aria-describedby="barang" name="stok">
                    <label for="exampleInputEmail" class="form-label">Ditarik</label></label>
                    <input type="text" class="form-control" id="ditarik" aria-describedby="barang" name="ditarik">
                    <label for="exampleInputEmail" class="form-label">User Id</label></label>
                    <input type="number" class="form-control" id="user_id" aria-describedby="barang" name="user_id">
                    
                  </div>
                  
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
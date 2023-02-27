@extends('layouts.home-layouts')


@section('content')
 <!-- Content Header (Page header) -->
 <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Barang</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Blank Page</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      @if (session('success'))
          <div class="alert alert-success" role="alert" id="success-alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>  
      @endif

      @if (session('success-delete'))
          <div class="alert alert-danger" role="alert" id="success-alert">
            {{ session('success-delete') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>  
      @endif

      @if ($errors->any())
          <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <ul>
              @foreach ($errors->all() as $item)
                  <li>{{ $item }}</li>
              @endforeach
            </ul>
          </div>
          
      @endif
      <div class="card-header">
        <h3 class="card-title">Create</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalBarang">
                Tambah Data
              </button>
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <table class="table  table-dark table-striped table-hover table-compact" id="tbl-data-barang">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Kode Barang</th>
                <th scope="col">Produk Id</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Satuan</th>
                <th scope="col">Harga Jual</th>
                <th scope="col">stok</th>
                <th scope="col">Ditarik</th>
                <th scope="col">User Id</th>
                <th scope="col">Aksi</th>

              </tr>
            </thead>
            <tbody>
              @foreach ($barangs as $item)
                <tr>
                  {{-- <td>{{ $item->id }}</td> --}}
                  <td>{{ $i = (isset($i)?++$i:$i = 1) }}</td>
                  <td>{{ $item->kode_barang }}</td>
                  <td>{{ $item->produk_id }}</td>
                  <td>{{ $item->nama_barang }}</td>
                  <td>{{ $item->satuan }}</td>
                  <td>{{ $item->harga_jual }}</td>
                  <td>{{ $item->stok }}</td>
                  <td>{{ $item->ditarik }}</td>
                  <td>{{ $item->user_id }}</td>
                  <td >
                    <button type="button" class="btn btn-edit" data-bs-toggle="modal" data-bs-target="#ModalBarang"
                    data-mode="edit"
                    data-id="{{ $item->id }}"
                    data-kode_barang="{{ $item->kode_barang }}"
                    data-produk_id="{{ $item->produk_id }}"
                    data-nama_barang="{{ $item->nama_barang }}"
                    data-satuan="{{ $item->satuan }}"
                    data-harga_jual="{{ $item->harga_jual }}"
                    data-stok="{{ $item->stok }}"
                    data-ditarik="{{ $item->ditarik }}"
                    data-user_id="{{ $item->user_id }}"
                    >
                      <i class="fa fa-edit" style="color: blue"></i>
                    </button>
                    <form action="{{ route('barang.destroy', $item->id) }}" style="display: inline" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="button" class="btn btn-delete" title="delete"><i class="fa fa-trash" style="color: red"></i></button>
                    </form>
                  </td>
                </tr>
              @endforeach
            
              
             
            </tbody>
          </table>
      </div>
      <!-- /.card-body -->
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
    <!-- /.content -->
@endsection
@include('barang.modal.form')
@push('scripts')
    <script>
      $('#tbl-data-barang').DataTable();

      $("#success-alert").fadeTo(2000,500).slideUp(500, function(){
        $("#success-alert").slideUp(500)
      })
      //trigger action delete
      $('.btn-delete').click(function(e){
        e.preventDefault()
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if(result.isConfirmed) 
          $(e.target).closest('form').submit()
        else swal.close()
      })
      })
      //end delete

      //edit
      $('#ModalBarang').on('show.bs.modal', function(e){
        const btn = $(e.relatedTarget)
        console.log(btn.data('mode'))
        const mode = btn.data('mode')
        const id = btn.data('id')
        const kode_barang = btn.data('kode_barang')
        const produk_id = btn.data('produk_id')
        const nama_barang =  btn.data('nama_barang')
        const satuan = btn.data('satuan')
        const harga_jual = btn.data('harga_jual')
        const stok = btn.data('stok')
        const ditarik = btn.data('ditarik')
        const user_id = btn.data('user_id')
        const modal = $(this)
        if( mode === 'edit'){
          modal.find('.modal-title').text('Edit data Barang')
          modal.find('#id').val(id)
          modal.find('#kode_barang').val(kode_barang)
          modal.find('#produk_id').val(produk_id)
          modal.find('#nama_barang').val(nama_barang)
          modal.find('#satuan').val(satuan)
          modal.find('#harga_jual').val(harga_jual)
          modal.find('#stok').val(stok)
          modal.find('#ditarik').val(ditarik)
          modal.find('#user_id').val(user_id)

          modal.find('.modal-body form').attr('action', '{{ url("barang") }}/'+id)
          modal.find('#method').html('@method("PATCH")')
        }else{
          modal.find('.modal-title').text('Input data barang')
          modal.find('#id').val('')
          modal.find('#kode_barang').val('')
          modal.find('#produk_id').val('')
          modal.find('#nama_barang').val('')
          modal.find('#satuan').val('')
          modal.find('#harga_jual').val('')
          modal.find('#stok').val('')
          modal.find('#ditarik').val('')
          modal.find('#user_id').val('')

          modal.find('.modal-body form').attr('action', '{{ url("barang") }}/')
        }
      })
    </script>
@endpush
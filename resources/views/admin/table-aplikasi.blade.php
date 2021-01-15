@extends('layout.admin')


@section('title', 'Table Aplikasi')


@section("css")
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
  

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">            

    <!-- Main content -->
    <section class="content">
        <div class="callout callout-info">
            <h4>Tip!</h4>

            <p>Add the sidebar-collapse class to the body tag to get this layout. You should combine this option with a
                fixed layout if you have a long sidebar. Doing that will prevent your page content from getting stretched
                vertically.</p>
        </div>
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Table Data Aplikasi</h3>                        
            </div>
            <div class="box-body">
                <div class="box">
                    <!-- <div class="box-header">
                      <h3 class="box-title">Data Table With Full Features</h3>
                    </div> -->
                    <!-- /.box-header -->
                    <div class="box-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Aplikasi</th>
                          </tr>                                                                               
                        </thead>
                        <tbody>
                          @forelse ($aplikasi as $key)
                            <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $key->nama }}</td>
                              <td>{{ $key->deskripsi }}</td>
                              <td>
                                <a href="{{ $key->url }}">aplikasi</a>
                              </td>
                            </tr>
                          @empty
                            <tr>
                              <td class="text-center" colspan="4">
                                <h5>Tidak ada data aplikasi!!</h5>
                              </td>
                            </tr>                              
                          @endforelse  
                        </tbody>
                      </table>
                    </div>
                    <!-- /.box-body -->
                  </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                Footer
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
  

@section('js')
<!-- DataTables -->
<script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
    $(function() {
      $('#example1').DataTable({
        'aoColumnDefs': [{
          'bSortable': false,
          'aTargets': [3] /* 1st one, start by the right */
        }]
      });          
    });        
</script>
@endsection

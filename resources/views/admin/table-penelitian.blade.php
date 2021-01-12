@extends('layout.admin')


@section('title', 'Table Penelitian')


@section("css")
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection



@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
        <h1>
            Sidebar Collapsed
            <small>Layout with collapsed sidebar on load</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Layout</a></li>
            <li class="active">Collapsed Sidebar</li>
        </ol>
    </section> -->

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
                <h3 class="box-title">Data Penelitian</h3>

                <!-- <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div> -->
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
                            <th>Judul</th>
                            <!-- <th>Abstrak</th> -->
                            <th>Penulis</th>
                            <th>NRP</th>
                            <th>File</th>   
                            <th>Tahun</th>                                                        
                            <th colspan="2">#</th>                         
                          </tr>
                        </thead>
                        <tbody>                        
                          @forelse ($penelitian as $key)
                            <tr>
                                <td>{!! $key->judul !!}</td>
                                <!-- <td>{!! $key->abstrak !!}</td> -->
                                <td>{{ $key->penulis }}</td>
                                <td>{{ $key->nrp }}</td>
                                <td>
                                  <a href='{{ url("/download/{$key->file}") }}' target="_blank">File</a>
                                </td>
                                <td>{{ $key->tahun }}</td>                                                                                            
                                <td>                                  
                                    <a title="Edit" class="badge bg-blue center" href="#"><span class="fa fa-edit"></span></a>
                                </td>
                                <td>              
                                  <form action='{{ url("/skripsi/delete/{$key->id}") }}' method="post">
                                    @method('delete')
                                    @csrf
                                    <button title="Delete" type="submit" class="btn-link badge bg-red" onclick="return confirm('Anda yakin untuk menghapus data?')">
                                      <span class="fa fa-trash"></span>
                                    </button>
                                  </form>                      
                                </td>
                                
                            </tr>
                          @empty
                              <p>Tidak ada data penelitian!!</p>
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
            'aTargets': [3,5,6] /* 1st one, start by the right */
          }]
        });            
    });        
</script>
@endsection
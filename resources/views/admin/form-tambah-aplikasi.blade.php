@extends('layout.admin')


@section('title', 'Form Aplikasi')


@section("css")
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="{{ secure_asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
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
                <h3 class="box-title">Form Tambah Data</h3>

                <!-- <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div> -->
            </div>
            <div class="box-body">
                <!-- Start creating your amazing application! -->
                <div class="row">
                    <div class="col-md-12">
                        @if (session('status') == 'berhasil')
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-check"></i> Alert!</h4>                                
                                Data berhasil ditambahkan!!
                            </div>
                        @elseif (session('status') == 'gagal')
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                                Gagal menambahkan data!!
                            </div>
                        @endif

                        <form role="form" action="{{ secure_url('aplikasi/store') }}" method="post">
                        @method('POST')
                        @csrf
                        <!-- /.box -->
                        <div class="box-footer">
                            <button name="reset" type="reset" class="btn btn-info">Reset</button>
                            <button type="submit" class="btn btn-primary pull-right">Tambah</button>
                        </div>

                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">
                                    <b>Form Tambah Aplikasi</b>
                                </h3>
                                <!-- tools box -->
                                <div class="pull-right box-tools">
                                    <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fa fa-minus"></i></button>
                                    <!-- <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                                        <i class="fa fa-times"></i></button> -->
                                </div>
                                <!-- /. tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body pad">                                        
                                <!-- text input -->
                                <div class="form-group @error('url') has-error @enderror">
                                    <label>URL Aplikasi:</label>
                                    <input name="url" type="text" class="form-control" placeholder="URL aplikasi" value="{{ old('url') }}">
                                    @error('url')
                                        <span class="help-block">{{ $message }}</span>                    
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">
                                    <b>Nama Aplikasi</b>
                                </h3>
                                <!-- tools box -->
                                <div class="pull-right box-tools">
                                    <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fa fa-minus"></i></button>
                                    <!-- <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                                        <i class="fa fa-times"></i></button> -->
                                </div>
                                <!-- /. tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body pad @error('nama') has-error @enderror">  
                                @error('nama')
                                    <span class="help-block">{{ $message }}</span>                    
                                @enderror                                      
                                <textarea id="editor2" name="nama" rows="10" cols="80">
                                    {{ old('nama') }}
                                </textarea>                                    
                            </div>
                        </div>
                                                        
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">
                                    <b>Deskripsi Aplikasi</b>
                                </h3>
                                <!-- tools box -->
                                <div class="pull-right box-tools">
                                    <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fa fa-minus"></i></button>
                                    <!-- <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                                        <i class="fa fa-times"></i></button> -->
                                </div>
                                <!-- /. tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body pad @error('deskripsi') has-error @enderror">                                        
                                @error('deskripsi')
                                    <span class="help-block">{{ $message }}</span>                    
                                @enderror   
                                <textarea id="editor1" name="deskripsi" rows="10" cols="80">
                                    {{ old('deskripsi') }}
                                </textarea>                                        
                            </div>
                        </div>
                        
                    </form>
                    </div>
                    <!-- /.col-->
                </div>
                <!-- ./row -->
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
<!-- CK Editor -->
<script src="{{ secure_asset('bower_components/ckeditor/ckeditor.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ secure_asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- bootstrap datepicker -->
<script src="{{ secure_asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script>
    $(function() {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        CKEDITOR.replace('editor2');
        //bootstrap WYSIHTML5 - text editor
        //$('.textarea').wysihtml5();

        $('#datepicker').datepicker({
            autoclose: true
        });

        $('button[name="reset"]').on('click', function() {
            $('input[name="url"]').html('');            
            CKEDITOR.instances['editor1'].setData('');
            CKEDITOR.instances['editor2'].setData('');
        });
    });            
</script>
@endsection
@extends('layout.main')

@section('title', 'Web Ta | Skripsi')

@section('main')
<main class="yrav-bg-abu" style="min-height: 80vh;">
    <!-- Underlined search bars with buttons -->
    <div class="container pt-4 pt-lg-5 pb-2 pb-lg-4 pb-md-3">
        <form>
            <div class="row justify-content-center">
                <div class="form-group col-7">
                    <input id="text-search" type="text" placeholder="Pencarian" class="form-control form-control-underlined yrav-bg-abu">
                </div>
                <div class="form-group col-1">
                    <button type="button" id="btn-search" class="btn btn-primary rounded-pill shadow-sm">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                            <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                            </svg>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <!-- End -->
    <!-- Content -->
    <!-- <div class="container-fluid p-5"> -->
    <div id="penelitian" class="container-fluid d-flex justify-content-center pb-5 flex-wrap"> 
        @forelse ($penelitian as $p)
            <div class="card shadow mx-1 mx-lg-3 mx-md-2 my-2 my-lg-4 my-md-3" style="width: 22rem;">
                <div class="card-body d-flex flex-column yrav-card-effect">
                    <div class="d-flex">                                
                        <div class="d-flex flex-column align-items-center">
                            <svg width="40px" height="40px" viewBox="0 0 16 16" class="bi bi-journal-text" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                                <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                                <path fill-rule="evenodd" d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                            </svg>
                            <p class="text-muted mt-1">{{$p->tahun}}</p>
                        </div>                                                                    
                        <h5 class="card-title ml-3">{!! $p->judul !!}</h5>                                
                    </div>
                                                
                    <div class="card-text pb-4">     
                        Penulis:
                        <table class="table-responsive text-muted">
                            <tr>
                                <td class="align-top">&emsp;-&nbsp;</td>
                                <td>{{$p->penulis}} ({{$p->nrp}})</td>
                            </tr>
                        </table>                                                            
                    </div>
                    <a href='{{ secure_url("/penelitian/show/{$p->id}") }}' class="card-link mt-auto btn btn-outline-info btn-sm btn-abstrak" data-toggle="modal">Detail</a>
                </div>
            </div>
        @empty
            <h3>Tidak ada data penelitian!!</h3>
        @endforelse 
                        
    </div>
    <div class="container d-flex justify-content-center align-items-center pb-4">
        {{ $penelitian->links("vendor.pagination.bootstrap-4") }}
    </div>
    <!-- </div> -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Abstrak Penelitian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container py-lg-4 py-sm-2 px-lg-5 px-sm-3 border bg-white">
                        <!-- tag dengan 'id=p_judul' akan berisi judul penelitian -->
                        <h4 class="py-2" id="p_judul"></h4>
                        <div class="d-flex justify-content-between pb-3">
                            <h6 class="text-secondary d-inline my-auto">Penulis : <span id="p_penulis">Rahilah, Firdaus Solihin, Fika Hastarita Rachman</span></h6>
                            <a id="p_file" href="#" target="_blank" class="btn btn-outline-primary btn-sm my-auto">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download align-middle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                    <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                </svg>
                                Download Jurnal
                            </a>
                        </div>

                        <!-- tag dengan 'id=p_abstrak' akan berisi abstrak penelitian -->
                        <p class="text-justify" id="p_abstrak"></p>
        
                        <h6 class="text-secondary">Kata Kunci : Aplikasi Penerjemah Bahasa, Free Contex Parsing Algorithm</h6>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                            
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $(document).on("click", ".btn-abstrak", function() {            
            $.ajax({
                //url: `/skripsi/show/${$(this).data("id")}`,
                url: this.href,
                success: response => {
                    console.log(response);
                    $("#p_judul").html(response.judul);
                    $("#p_abstrak").html(response.abstrak);
                    $("#p_penulis").html(response.penulis);
                    $("#p_file").attr("href", `{{ secure_url('/penelitian/download/${response.file}') }}`);
                    $("#exampleModal").modal("show");                    
                },
                error: e => {
                    console.log(e.responseText);
                }
            });
        });

        function searchPenelitian() {
            const penelitian = {!! json_encode($penelitian) !!};
            const search_query = $('#text-search').val().toLowerCase().split(/\s/).filter(val => val);
            let search_result = [];
            
            if (search_query.length) {
                for (const iterator in penelitian.data) {
                    if (
                        [...search_query].some(query => (jQuery(penelitian.data[iterator].judul).text().toLowerCase()).includes(query))
                        ||
                        [...search_query].some(query => (jQuery(penelitian.data[iterator].abstract).text().toLowerCase()).includes(query))
                        ||
                        [...search_query].some(query => penelitian.data[iterator].kata_kunci.toLowerCase().includes(query))
                        ||
                        [...search_query].some(query => penelitian.data[iterator].nrp.toLowerCase().includes(query))
                        ||
                        [...search_query].some(query => penelitian.data[iterator].penulis.toLowerCase().includes(query))
                        ||
                        [...search_query].some(query => penelitian.data[iterator].tahun.includes(query))
                    ) {
                        search_result.push(penelitian.data[iterator])
                    }
                }
            } else {
                search_result = [...penelitian.data];
            }

            let penelitian_card = '';
            if (search_result.length) {
                for (const key of search_result) {
                    penelitian_card += `
                    <div class="card shadow mx-1 mx-lg-3 mx-md-2 my-2 my-lg-4 my-md-3" style="width: 22rem;">
                        <div class="card-body d-flex flex-column yrav-card-effect">
                            <div class="d-flex">                                
                                <div class="d-flex flex-column align-items-center">
                                    <svg width="40px" height="40px" viewBox="0 0 16 16" class="bi bi-journal-text" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                                        <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                                        <path fill-rule="evenodd" d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                                    </svg>
                                    <p class="text-muted mt-1">${key.tahun}</p>
                                </div>                                                                    
                                <h5 class="card-title ml-3">${key.judul}</h5>                                
                            </div>
                                                        
                            <div class="card-text pb-4">     
                                Penulis:
                                <table class="table-responsive text-muted">
                                    <tr>
                                        <td class="align-top">&emsp;-&nbsp;</td>
                                        <td>${key.penulis} (${key.nrp})</td>
                                    </tr>
                                </table>                                                            
                            </div>
                            <a href='{{ secure_url("/penelitian/show/") }}/${key.id}' class="card-link mt-auto btn btn-outline-info btn-sm btn-abstrak" data-toggle="modal">Detail</a>
                        </div>
                    </div>
                    `;
                }
            } else {
                penelitian_card = '<h4>Pencarian tidak ditemukan!</h4>';
            }

            $('#penelitian').html(penelitian_card);
        }

        $("#btn-search").on("click", function() {
            searchPenelitian();
            $('#text-search').focus();   
        });

        $('form').submit(function(e) {
            e.preventDefault();
            searchPenelitian();
            $('#text-search').focus();   
        });
    });    
</script>
@endsection
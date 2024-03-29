
@extends('layout.main')

@section('title', 'Portal Penelitian')

@section('main')
<main class="yrav-bg-abu" style="min-height: 80vh;">
    <div class="container pt-4 pt-lg-5 pb-2 pb-lg-4 pb-md-3">
        <form>
            <div class="row justify-content-center">
                <div class="form-group col-7">
                    <input id="text-search" type="text" placeholder="Pencarian" class="form-control form-control-underlined yrav-bg-abu">
                </div>
                <div class="form-group col-1">
                    <button type="submit" id="btn-search" class="btn btn-primary rounded-pill shadow-sm">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                            <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div id="aplikasi" class="container-fluid d-flex justify-content-center pb-5 flex-wrap"> 
        @forelse ($aplikasi as $key)
            <div class="card shadow mx-1 mx-lg-3 mx-md-3 my-2 my-lg-4" style="width: 22rem;">
                <div class="card-body d-flex flex-column yrav-card-effect">
                    <div class="row px-1">                               
                        <div class="col-1">
                            <svg width="40px" height="40px" viewBox="0 0 16 16" class="bi bi-gear" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z"/>
                                <path fill-rule="evenodd" d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z"/>
                            </svg>                     
                        </div> 
                        <div class="col">
                            <h5 class="card-title ml-4 mb-0">{!! $key->nama !!}</h5>
                        </div>
                    </div>                 

                    <div class="card-text text-justify my-3 p-2">
                        &emsp;&emsp;{!! $key->deskripsi !!}
                    </div>
                    
                    <a href="{{ $key->url }}" target="_blank" class="card-link mt-auto btn btn-outline-info btn-sm">Mulai</a>
                </div>
            </div>
        @empty
            <h4>Tidak ada data!</h4>
        @endforelse 
    </div>
    <div class="container d-flex justify-content-center align-items-center pb-4">
        {{ $aplikasi->links("vendor.pagination.bootstrap-4") }}
    </div>
</main>        
@endsection

@section('js')
<script>
    $(document).ready(function() {
    
        function searchAplikasi() {
            const aplikasi = {!! json_encode($aplikasi) !!};
            const search_query = $('#text-search').val().toLowerCase().split(/\s/).filter(val => val);
            let search_result = [];
            
            if (search_query.length) {
                for (const iterator in aplikasi.data) {
                    if (
                        [...search_query].some(query => (jQuery(aplikasi.data[iterator].nama).text().toLowerCase()).includes(query))
                        ||
                        [...search_query].some(query => (jQuery(aplikasi.data[iterator].deskripsi).text().toLowerCase()).includes(query))
                    ) {
                        search_result.push(aplikasi.data[iterator])
                    }
                }
            } else {
                search_result = [...aplikasi.data];
            }

            let aplikasi_card = '';
            if (search_result.length) {
                for (const key of search_result) {
                    aplikasi_card += `
                    <div class="card shadow mx-1 mx-lg-3 mx-md-3 my-2 my-lg-4" style="width: 22rem;">
                        <div class="card-body d-flex flex-column yrav-card-effect">
                            <div class="row px-1">                               
                                <div class="col-1">
                                    <svg width="40px" height="40px" viewBox="0 0 16 16" class="bi bi-gear" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z"/>
                                        <path fill-rule="evenodd" d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z"/>
                                    </svg>                     
                                </div> 
                                <div class="col">
                                    <h5 class="card-title ml-4 mb-0">${key.nama}</h5>
                                </div>
                            </div>                 

                            <div class="card-text text-justify my-3 p-2">
                                &emsp;&emsp;${key.deskripsi}
                            </div>
                            
                            <a href="${key.url}" target="_blank" class="card-link mt-auto btn btn-outline-info btn-sm">Mulai</a>
                        </div>
                    </div>
                    `;
                }
            } else {
                aplikasi_card = '<h4>Pencarian tidak ditemukan!</h4>';
            }

            $('#aplikasi').html(aplikasi_card);
        }

        $("#btn-search").on("click", function() {
            searchAplikasi();
            $('#text-search').focus();   
        });

        $('form').submit(function(e) {
            e.preventDefault();
            searchAplikasi();
            $('#text-search').focus();   
        });
    });    
</script>
@endsection
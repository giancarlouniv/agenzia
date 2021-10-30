<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.css" rel="stylesheet">

<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>

<script src="https://unpkg.com/filepond/dist/filepond.js"></script>


<div class="tab-pane" id="images">

    {{-- PLANIMETRIA --}}
    <div class="post">
        <input type="file" class="filepond" name="image_plan">

        <script>
            var element2 = document.querySelector('meta[name="csrf-token"]');
            var csrf2 = element2 && element2.getAttribute("content");

            FilePond.registerPlugin(
                FilePondPluginImagePreview,
            );
            const inputElement2 = document.querySelector('input[type="file"]');
            const pond2 = FilePond.create(inputElement2, {
                maxFileSize: '5MB',
                imageResizeTargetWidth: 256,
                imageResizeMode: 'contain',
                allowMultiple: true,

                onprocessfile: (error, file) => {

                },
            }).setOptions({
                labelIdle: 'Trascina qui la foto della planimetria o clicca su <span class="filepond--label-action"> Apri </span>',
                server: {
                    url: "{{ url('/')}}/uploadplanimetria/house/" + '{{$house->id}}',
                    process: {
                        headers: {
                            'X-CSRF-TOKEN': csrf2
                        },
                    },

                }
            });
        </script>

        <div class="post mb-4 mt-3 pt-3">
            @foreach($house->photosPlanimetria as $k => $photo)
                <a href="{{\Illuminate\Support\Facades\Storage::disk('public')->url($photo->path_photo)}}" class="mr-4" target="_blank">Apri planimetria {{$photo->id}}</a>
            @endforeach

            <div id="carouselExampleControls2" class="carousel slide imagesCarousel mt-4" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach($house->photosPlanimetria as $k => $photo)
                        <div class="carousel-item @if($k == 0) active @endif">
                            <img class="d-block w-100" src="{{\Illuminate\Support\Facades\Storage::disk('public')->url($photo->path_photo)}}" alt="{{$k +1}} photo">
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls2" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls2" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>

    {{-- IMMAGINI APPARTAMENTO --}}
    <div class="post">
        <input type="file" class="filepond" name="image">

        <script>

            var element = document.querySelector('meta[name="csrf-token"]');
            var csrf = element && element.getAttribute("content");

            FilePond.registerPlugin(
                FilePondPluginImagePreview,
            );
            const inputElement = document.querySelector('input[type="file"]');
            const pond = FilePond.create(inputElement, {
                maxFileSize: '5MB',
                imageResizeTargetWidth: 256,
                imageResizeMode: 'contain',
                allowMultiple: true,

                onprocessfile: (error, file) => {

                },
            }).setOptions({
                labelIdle: 'Trascina qui le foto dell\'immobile o clicca su <span class="filepond--label-action"> Apri </span>',
                server: {
                    url: "{{ url('/')}}/upload/house/" + '{{$house->id}}',
                    process: {
                        headers: {
                            'X-CSRF-TOKEN': csrf
                        },
                    },

                }
            });
        </script>

        <div class="post mb-4 mt-3 pt-3">
            <div id="carouselExampleControls" class="carousel slide imagesCarousel" data-ride="carousel">
                <div class="carousel-inner mx-auto text-center">
                    @foreach($house->photos as $k => $photo)
                        <div class="carousel-item @if($k == 0) active @endif">
                            <img class="d-block img-fluid w-100" src="{{\Illuminate\Support\Facades\Storage::disk('public')->url($photo->path_photo)}}" alt="{{$k +1}} photo">
                        </div>

                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>

    {{-- Modal per la Gestione delle immagini --}}
    <div class="row">
        <div class="col-12 text-right">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bd-example-modal-lg">Gestisci Immagini</button>
        </div>

        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Immagini caricate</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <b>Planimetria</b>
                        <hr>
                        @forelse($house->photosPlanimetria as $k => $photo)
                            <div class="row align-items-center border-bottom p-2">
                                <div class="col-3 offset-1">
                                    <img style="width: 100px!important;" src="{{\Illuminate\Support\Facades\Storage::disk('public')->url($photo->path_photo)}}" alt="..." class="img-rounded">
                                </div>
                                <div class="col-2">
                                    Caricata il: {{date('d/m/Y', strtotime($photo->created_at))}}
                                </div>
                                <div class="col-3 text-right">
                                    <button class="btn btn-danger btn-sm" onclick="deleteImg('{{$photo->id}}')">Elimina</button>
                                </div>
                                <div class="col-3">
                                    <span id="confirm_{{$photo->id}}"></span>
                                </div>
                            </div>
                        @empty
                            <div class="row align-items-center border-bottom p-2">
                                <div class="col-12 text-center">
                                    <i>Nessuna immagine caricata</i>
                                </div>
                            </div>
                        @endforelse
                        <br> <br> <br>
                        <b>Immagini varie</b>
                        <hr>
                        @forelse($house->photos as $k => $photo)
                            <div class="row align-items-center border-bottom p-2">
                                <div class="col-3 offset-1">
                                    <img style="width: 100px!important;" src="{{\Illuminate\Support\Facades\Storage::disk('public')->url($photo->path_photo)}}" alt="..." class="img-rounded">
                                </div>
                                <div class="col-2">
                                    Caricata il: {{date('d/m/Y', strtotime($photo->created_at))}}
                                </div>
                                <div class="col-3 text-right">
                                    <button class="btn btn-danger btn-sm" onclick="deleteImg('{{$photo->id}}')">Elimina</button>
                                </div>
                                <div class="col-3">
                                    <span id="confirm_{{$photo->id}}"></span>
                                </div>
                            </div>
                        @empty
                            <div class="row align-items-center border-bottom p-2">
                                <div class="col-12 text-center">
                                    <i>Nessuna immagine caricata</i>
                                </div>
                            </div>
                        @endforelse
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-block btn-primary" onclick="window.location.reload()">Visualizza modifiche alle immagini</button>
                    </div>
                </div>
            </div>
            <script>
                const deleteImg = (row_id) => {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    jQuery.ajax({
                        url: "{{url('photodelete')}}/" + row_id,
                        method: 'get',
                        success: function (response) {
                            if (response == 'ok') {
                                let icon = document.getElementById('confirm_' + row_id)
                                icon.innerHTML = `<span class="text-danger">Eliminata</span>`
                            }
                        },
                        error: function (error) {
                            console.log(error);
                        }
                    });
                }
            </script>
        </div>
    </div>
</div>


<style>

    .filepond--credits {
        display: none;
    }

    .carousel-control-next,
    .carousel-control-prev {
        filter: invert(100%);
    }

    .w-100 {
        width: 100%;
        max-width: 500px;
    !important
    }

    img {
        width: 50%;
        margin: auto;
    }
</style>





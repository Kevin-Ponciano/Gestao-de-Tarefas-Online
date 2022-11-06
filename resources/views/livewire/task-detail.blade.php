@php use Carbon\Carbon;
    //debug($private_comments);
    //debug($public_comments);
@endphp
{{--<section class="content-header">--}}
{{--    <div class="container-fluid">--}}
{{--        <div class="row mb-2">--}}
{{--            <div class="col-sm-6">--}}
{{--            </div>--}}
{{--            <div class="col-sm-6">--}}
{{--                <ol class="breadcrumb float-sm-right">--}}
{{--                    <li class="breadcrumb-item"><a href="{{route('tasks')}}">Voltar</a></li>--}}
{{--                    <li class="breadcrumb-item active">Project Detail</li>--}}
{{--                </ol>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

<div>
    <br>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">#{{$task->id}} - {{$task->title}}</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-4 order-2 order-md-1">
                        <h3 class="text-primary"><i class="fas fa-paint-brush"></i>Descrição</h3>
                        <p id="description_field" class="text-muted"
                           style="overflow:hidden;white-space:nowrap;text-overflow: ellipsis">{{$task->description}}</p>
                        <script>
                            let show = true
                            $('#description_field').click(function () {
                                if (show) {
                                    $(this).css('white-space', 'break-spaces')
                                    show = false
                                } else {
                                    $(this).css('white-space', 'nowrap')
                                    show = true
                                }

                            })
                        </script>
                        <br>
                        <div class="text-muted">
                            <p class="text-sm">Responsável
                                <b class="d-block">{{$user_name}}</b>
                            </p>
                            {{--                        <p class="text-sm">Empresa--}}
                            {{--                            <b class="d-block">Tony Chicken</b>--}}
                            {{--                        </p>--}}
                        </div>

                        {{--                    <h5 class="mt-5 text-muted">Status</h5>--}}
                        {{--                    <ul class="list-unstyled">--}}
                        {{--                        <li>--}}
                        {{--                            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i>--}}
                        {{--                                Functional-requirements.docx</a>--}}
                        {{--                        </li>--}}
                        {{--                        <li>--}}
                        {{--                            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> UAT.pdf</a>--}}
                        {{--                        </li>--}}
                        {{--                        <li>--}}
                        {{--                            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i>--}}
                        {{--                                Email-from-flatbal.mln</a>--}}
                        {{--                        </li>--}}
                        {{--                        <li>--}}
                        {{--                            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Logo.png</a>--}}
                        {{--                        </li>--}}
                        {{--                        <li>--}}
                        {{--                            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i>--}}
                        {{--                                Contract-10_12_2014.docx</a>--}}
                        {{--                        </li>--}}
                        {{--                    </ul>--}}
                        <div class="text-start mt-5 mb-3">
                            <button wire:click="create()" class="btn btn-sm btn-primary">Comentar</button>
                            <a href="#" class="btn btn-sm btn-danger">Finalizar</a>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-8 order-1 order-md-2">
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Prioridade</span>
                                        <span
                                            class="info-box-number text-center text-muted mb-0">{{$task->priority}}</span>

                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Status</span>
                                        <span
                                            class="info-box-number text-center text-muted mb-0">{{$task->status}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Criado - Prazo</span>
                                        <span
                                            class="info-box-number text-center text-muted mb-0">{{$task->date_create}} - {{$task->deadline}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h3 class="text-muted py-1"><b>Comentários</b></h3>
                                <div class="timeline">
                                    @if(isset($private_comments))
                                        @foreach($private_comments as $private_comment)
                                            @php
                                                $comment_time = Carbon::createFromFormat("Y-m-d H:i:s", $private_comment->date_time_create)->format("h:i A");
                                                $comment_date = Carbon::createFromFormat("Y-m-d H:i:s", $private_comment->date_time_create)->format("d M. Y");
                                            @endphp
                                            <div>
                                                <i class="fas fa-circle bg-red"></i>
                                                <div class="timeline-item">
                                                    <span class="time">{{$comment_time.' '}}<i class="fas fa-clock"></i><br>{{$comment_date}}</span>
                                                    {{--Ir para o perfil da pessora--}}
                                                    <div class="timeline-body">
                                                        <div class="user-block">
                                                            <img class="img-circle img-bordered-sm"
                                                                 src={{asset('adminLTE/dist/img/user1-128x128.jpg')}}>
                                                            <span class="username">
                                                        <a href="#">{{$private_comment->user_name}}</a>
                                                    </span>
                                                            <span class="description">Privado</span>
                                                        </div>
                                                    </div>
                                                    <div class="post clearfix py-1  m-1"></div>
                                                    <div class="timeline-footer py-1">
                                                        {{$private_comment->comment}}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    @if(isset($public_comments))
                                        @foreach($public_comments as $public_comment)
                                            @php
                                                $comment_time = Carbon::createFromFormat("Y-m-d H:i:s", $public_comment->date_time_create)->format("h:i A");
                                                $comment_date = Carbon::createFromFormat("Y-m-d H:i:s", $public_comment->date_time_create)->format("d M. Y");
                                            @endphp
                                            <div>
                                                <i class="fas fa-circle bg-dark"></i>
                                                <div class="timeline-item">
                                                    <span class="time">{{$comment_time.' '}}<i class="fas fa-clock"></i><br>{{$comment_date}}</span>
                                                    {{--Ir para o perfil da pessora--}}
                                                    <div class="timeline-body">
                                                        <div class="user-block">
                                                            <img class="img-circle img-bordered-sm"
                                                                 src={{asset('adminLTE/dist/img/user1-128x128.jpg')}}>
                                                            <span class="username">
                                                        <a href="#">{{$public_comment->user_name}}</a>
                                                    </span>
                                                            <span class="description">comentou</span>
                                                        </div>
                                                    </div>
                                                    <div class="post clearfix py-1  m-1"></div>
                                                    <div class="timeline-footer py-1">
                                                        {{$public_comment->comment}}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if($isOpen)
                    @include('livewire.new-comment-modal')
                @endif
            </div>
        </div>
    </section>
</div>


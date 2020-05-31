@extends('layouts.control')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">
                    Список URL`s
                </h6>
            </div>
            <div class="card shadow mb-4">
                <div class="card-body">
                    {!! grid([
                        'dataProvider' => $provider,
                        'rowsPerPage' => 20,
                        'standaloneVue' => false,
                        'columns' => [
                            [
                                'value' => 'url',
                                'title' => 'Url',
                            ],
                                 [
                                'value' => 'short_code',
                                'title' => 'Код',
                            ],
                                 [
                                'value' => 'counter',
                                'title' => 'Количество вызовов',
                            ],
                            [
                                'class' => 'actions',
                                'value' => [
                                    'delete:/url/{id}',
                                ]
                            ]
                        ],
                    ]) !!}
                </div>
            </div>
        </div>
    </div>
@endsection

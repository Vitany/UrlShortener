@extends('layouts.control')

@section('content')
    <div class="col-12">

        <div class="card shadow">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">
                    Добавление URL
                </h6>
            </div>

            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        Проверьте ошибки валидации
                    </div>
                @endif

                <form action="{{ route('url.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Введите URL</label>
                        <input type="url" name="url" class="form-control @error('url') is-invalid @enderror">
                        @error('url')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success">
                        Сохранить
                    </button>
                </form>

                @if (!empty($url->id))
                    <div>
                        <a class="nav-link" href="{{ route('url.show' , ['code' => $url->short_code]) }}">
                            <span>url/{{$url->short_code}}</span>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection

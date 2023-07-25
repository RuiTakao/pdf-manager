@extends('layouts.app')

@section('content')
    @if (session('flash'))
        <div class="alert alert-success">
            <p class="alert-title">{{ session('flash') }}</p>
        </div>
    @endif

    @if (session('message'))
        <div class="alert alert-error">
            <p class="alert-title">&#x26A0; {{ session('message') }}</p>
        </div>
    @endif
    <div class="table_container">
        <table class="table">
            <thead class="thead">
                <tr class="tr">
                    <th class="th">PDF アップロード</th>
                </tr>
            </thead>
            <tbody class="tbody">
                <tr class="tr">
                    <td class="td">
                        <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="file_select_container">
                                <label for="input_file" class="file_select_button button">PDFファイルを選択してください</label>
                                <input id="input_file" class="input_file" type="file" name="pdf" accept=".pdf">
                                <div class="select_file_name" id="select_file_name"></div>
                            </div>
                            <input class="file_upload_button button" type="submit">
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="table_container mt32">
        <table class="table">
            <thead class="thead">
                <tr class="tr"><th class="th">PDF リスト</th></tr>
            </thead>
            <tbody class="tbody">
                @forelse ($file_list as $file)
                    <tr class="tr">
                        <td class="td">
                            <div class="file_list_container">
                                <a class="list_file_name" href="{{ 'storage/' . str_replace('public/', '', $file) }}" target="_blank">{{ str_replace('public/pdf/', '', $file) }}</a>
                                <form action="{{ route('download') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="file" value="{{ $file }}">
                                    <input class="file_download button" type="submit" value="ダウンロード">
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr class="tr">
                        <td class="td">ファイルはありません</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

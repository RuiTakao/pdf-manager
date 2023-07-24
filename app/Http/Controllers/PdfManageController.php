<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PdfManageController extends Controller
{
    /**
     * 画面の表示
     */
    public function index() {
        // ファイルの情報取得
        $file_list = Storage::allFiles('public/pdf');

        return view('index', compact('file_list'));
    }

    /**
     * ファイルアップロード
     */
    public function upload(Request $request) {

        // アップロードファイルのチェック
        if ($request->hasFile('pdf')) {
            if ($request->pdf->getClientOriginalExtension() != 'pdf') {
                return back()->with('message', '不適切な拡張子です。');
            }
        } else {
            return back()->with('message', 'ファイルが選択されていません。');
        }

        // ファイル取得
        $file = $request->file('pdf');
        $file_name = $file->getClientOriginalName();

        // 例外処理
        try {
            if (Storage::putFileAs('/public/pdf', $file, $file_name)) {
                session()->flash('flash', 'ファイルをアップロードしました。');
            }
        } catch (\Throwable $e) {
            return redirect()->route('index')->withErrors('システムでエラーが起こりました。')->withInput();
        }
        return redirect()->route('index');
    }

    /**
     * ファイルダウンロード
     */
    public function download(Request $request) {
        $file_path = $request->file;
        $file_name = explode('/', $file_path)[array_key_last(explode('/', $file_path))];
        $mine_type = Storage::mimeType($file_path);
        $headers = [['Content-type' => $mine_type]];

        return Storage::download($file_path, $file_name, $headers);
    }
}

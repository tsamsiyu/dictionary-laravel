<?php
/**
 * Created by PhpStorm.
 * User: tsamsiyu
 * Date: 02.11.17
 * Time: 23:06
 */

namespace App\Http\Controllers\Frontend;

use App\Core\Controller;
use App\Http\Handlers\TranslationSaveHandler;
use App\Http\Requests\Frontend\TranslationSaveRequest;
use App\Models\Eloquent\OriginalDictum;

class DictaController extends Controller
{
    public function search()
    {
        $models = OriginalDictum::query()
            ->with('translationGroups')
            ->with('translationGroups.translations')
            ->with('translations')
            ->get();

        return response()->json(['data' => $models]);
    }

    public function create(TranslationSaveRequest $request)
    {
        $handler = new TranslationSaveHandler();
        $dictum = $handler->create($request->all());
        return response()->json(['data' => $dictum]);
    }

    public function update(TranslationSaveRequest $request, OriginalDictum $dictum)
    {
        $handler = new TranslationSaveHandler();
        $dictum = $handler->update($dictum, $request->all());
        return response()->json(['data' => $dictum]);
    }

    public function destroy(OriginalDictum $dictum)
    {
        $dictum->delete();
        return response()->json([], 204);
    }
}
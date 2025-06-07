<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crypto;

class CryptoFavoriteController extends Controller
{
    public function toggle(Request $request)
    {
        $request->validate([
            'crypto_id' => 'required|exists:cryptos,id',
        ]);

        $user = auth()->user();
        $cryptoId = $request->crypto_id;

        if ($user->favoriteCryptos()->where('crypto_id', $cryptoId)->exists()) {
            $user->favoriteCryptos()->detach($cryptoId);
            $isFavorite = false;
        } else {
            $user->favoriteCryptos()->attach($cryptoId);
            $isFavorite = true;
        }

        return response()->json(['isFavorite' => $isFavorite]);
    }
}

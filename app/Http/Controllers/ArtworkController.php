<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Artwork;
use App\Models\Asset;
use Illuminate\Http\Request;

class ArtworkController extends Controller {
    public function index(Request $request) {
        $perPage = $request->query('per_page', 15);
        $artworks = Artwork::with('artist')
            ->with('assets')
            ->orderBy('created_at', 'ASC')
            ->paginate($perPage);
        return response()->json($artworks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $artist = $request->user;
        $artist['artist_id'] = $artist['id'];
        $MArtist = Artist::where('artist_id', $artist['artist_id'])->first();
        if ($MArtist) {
            $MArtist->update($artist);
        } else {
            $MArtist = Artist::create($artist);
        }

        $artwork = $request->all();
        $artwork['artist_id'] = $MArtist->id;
        $MArtwork = Artwork::where('hash_id', $request->hash_id)->first();
        if ($MArtwork) {
            $MArtwork->update($artwork);
        } else {
            $MArtwork = Artwork::create($artwork);
        }
        foreach ($artwork['assets'] as $asset) {
            $asset['artwork_id'] = $MArtwork->id;
            $asset['asset_id'] = $asset['id'];
            $MAsset = Asset::where('image_url', $asset['image_url'])->first();
            if ($MAsset) {
                $MAsset->update($asset);
            } else {
                $MAsset = Asset::create($asset);
            }
        }
        return [$MAsset];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Movie extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'judul' => $this->judul,
            'jenis' => $this->jenis,
            'sinopsis' => $this->sinopsis,
            'pemain' => $this->pemain,
            'produser' => $this->produser,
            'sutradara' => $this->sutradara,
            'penulis' => $this->penulis,
            'produksi' => $this->produksi,
            'poster' => $this->poster,
            'trailer' => $this->trailer,
            'umur' => $this->umur,
            'rating' => $this->rating,
            'durasi' => $this->durasi,
            'jadwal' => $this->jadwal
        ];
    }

    public function with($request){
        return[
            'anggota' => 'Galant,Rajesh,Shintya'
        ];
    }
}

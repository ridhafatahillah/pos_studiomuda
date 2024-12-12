<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;





class ModalDetail extends Component
{
    // public $id;
    // public $nama;
    // public $jam;
    // public $tambahan_orang;
    // public $paket;
    // public $tambahan_foto;
    // public $tambahan_waktu;

    // /**
    //  * Create a new component instance.
    //  *
    //  * @return void
    //  */
    // public function __construct($id, $nama, $jam, $tambahan_orang, $paket, $tambahan_foto, $tambahan_waktu)
    // {
    //     $this->id = $id;
    //     $this->nama = $nama;
    //     $this->jam = $jam;
    //     $this->tambahan_orang = $tambahan_orang;
    //     $this->paket = $paket;
    //     $this->tambahan_foto = $tambahan_foto;
    //     $this->tambahan_waktu = $tambahan_waktu;
    // }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.modal-detail');
    }
}

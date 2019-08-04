<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\Datatables\Datatables;

class Collection extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'volume',
        'path',
        'size',
    ];

    /**
     * Get Datatable Data
     * @return array
     */
    public function datatableForAdmin($volume)
    {
        if(is_numeric($volume)) {
            $results = $this->where('volume', $volume)->get();
        } else {
            $results = $this->get();
        }
        return Datatables::of($results)
            ->editColumn('image', function ($data) {
                return '
                <img class="img-small pop pointer" src="' . $data->path . '" alt="IMG-' . $data->id . '">
                ';
            })
            ->editColumn('action', function ($data) {
                $html = '
                <button type="button" class="btn btn-outline-warning btn-admin-edit-collection btn-icon" data-volume="' . $data->volume . '" data-img="' . $data->path . '" data-id="' . $data->id . '">
                    <i aria-hidden="true" class="mdi mdi-pencil"></i>
                </button>

                <button type="button" class="btn btn-outline-danger btn-admin-delete-collection btn-icon" data-id="' .$data->id . '">
                    <i aria-hidden="true" class="mdi mdi-delete"></i>
                </button>
                ';
                return $html;
            })
            ->rawColumns(['image', 'action'])
            ->make(true);
    }
}

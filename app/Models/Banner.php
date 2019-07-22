<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\Datatables\Datatables;

class Banner extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'subtitle',
        'image',
    ];

    /**
     * Get Datatable Data
     * @return array
     */
    public function datatableForAdmin()
    {
        $results = $this->orderBy('id', 'desc')->get();
        return Datatables::of($results)
            ->editColumn('title', function ($data) {
                return ucwords($data->title);
            })
            ->editColumn('subtitle', function ($data) {
                return $data->subtitle;
            })
            ->editColumn('image', function ($data) {
                $html = '<img src="' . $data->image . '" class="img-fluid pop" data-img="' . $data->image . '" />';
                return $html;
            })
            ->editColumn('action', function ($data) {
                $html = '
                <button type="button" class="btn btn-outline-warning btn-admin-edit-banner btn-icon" data-id="' . $data->id . '" data-img="' . $data->image . '" data-title="' . $data->title . '" data-subTitle="' . $data->subtitle . '" >
                     <i aria-hidden="true" class="mdi mdi-pencil"></i>
                </button>

                <button type="button" class="btn btn-outline-danger btn-admin-delete-banner btn-icon" data-id="' . $data->id . '">
                     <i aria-hidden="true" class="mdi mdi-delete"></i>
                </button>
                ';
                return $html;
            })
            ->rawColumns(['image', 'action'])
            ->make(true);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\Datatables\Datatables;

class Brand extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'image',
        'type',
    ];

    /**
     * Get Datatable Data
     * @return array
     */
    public function datatableForAdmin()
    {
        $results = $this->orderBy('id', 'desc')->get();
        return Datatables::of($results)
            ->editColumn('type', function ($data) {
                return ucwords($data->type);
            })
            ->editColumn('image', function ($data) {
                $html = '<img src="' . $data->image . '" class="img-fluid" />';
                return $html;
            })
            ->editColumn('action', function ($data) {
                $html = '
                <button type="button" class="btn btn-outline-warning btn-admin-edit-brand btn-icon" data-img="' . $data->image . '" gender="' . $data->type . '" name="' . $data->name . '" data-id="' . $data->id . '">
                     <i aria-hidden="true" class="mdi mdi-pencil"></i>
                </button>

                <button type="button" class="btn btn-outline-danger btn-admin-delete-brand btn-icon" data-id="' . $data->id . '">
                     <i aria-hidden="true" class="mdi mdi-delete"></i>
                </button>
                ';
                return $html;
            })
            ->rawColumns(['image', 'action'])
            ->make(true);
    }
}

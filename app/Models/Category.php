<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\Datatables\Datatables;

class Category extends Model
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
    ];

    /**
     * Relation to Size
     *
     */
    public function sizes()
    {
        return $this->hasMany('App\Models\Size');
    }

    /**
     * Get Datatable Data
     * @return array
     */
    public function datatableForAdmin()
    {
        $results = $this->orderBy('id', 'desc')->get();
        return Datatables::of($results)
            ->editColumn('action', function ($data) {
                $html = '
                <button type="button" class="btn btn-outline-warning btn-admin-edit-category btn-icon" gender="' . $data->type . '" name="' . $data->name . '" data-id="' . $data->id . '">
                     <i aria-hidden="true" class="mdi mdi-pencil"></i>
                </button>

                <button type="button" class="btn btn-outline-danger btn-admin-delete-category btn-icon" data-id="' . $data->id . '">
                     <i aria-hidden="true" class="mdi mdi-delete"></i>
                </button>
                ';
                return $html;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}

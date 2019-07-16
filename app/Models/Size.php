<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\Datatables\Datatables;

class Size extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'text',
    ];

    /**
     * Relation to Category
     *
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    /**
     * Get Datatable Data
     * @return array
     */
    public function datatableForAdmin()
    {
        $results = $this->with('category')->orderBy('id', 'desc')->get();
        return Datatables::of($results)
            ->editColumn('category', function ($data) {
                return ucwords($data->category->name);
            })
            ->editColumn('action', function ($data) {
                $html = '
                <button type="button" class="btn btn-outline-warning btn-admin-edit-size btn-icon" category-id="' . $data->category_id . '" text="' . $data->text . '" data-id="' . $data->id . '">
                     <i aria-hidden="true" class="mdi mdi-pencil"></i>
                </button>

                <button type="button" class="btn btn-outline-danger btn-admin-delete-size btn-icon" data-id="' . $data->id . '">
                     <i aria-hidden="true" class="mdi mdi-delete"></i>
                </button>
                ';
                return $html;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}

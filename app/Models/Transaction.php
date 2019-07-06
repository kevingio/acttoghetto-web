<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\Datatables\Datatables;

class Transaction extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number',
        'user_id',
        'is_paid',
        'total',
        'shipping_address',
        'status',
    ];

    /**
     * Relation to Transaction Detail
     *
     */
    public function detail()
    {
        return $this->belongsTo('App\Models\TransactionDetail');
    }

    /**
     * Relation to Size
     *
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get Datatable Data
     * @return array
     */
    public function datatable()
    {
        $results = $this->with(['user', 'detail'])->where('user_id', auth()->id())->latest()->get();
        return Datatables::of($results)
            ->editColumn('created_at', function ($data) {
                return date('l, d F Y', strtotime($data->created_at));
            })
            ->editColumn('is_paid', function ($data) {
                if($data->is_paid == 1) {
                    $html = '<span class="badge badge-success">Sudah dibayar</span>';
                } else {
                    $html = '
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-id="' . encrypt($data->id) . '" data-target="#modalUpload">Upload</button>';
                }
                return $html;
            })
            ->rawColumns(['is_paid'])
            ->make(true);
    }
}

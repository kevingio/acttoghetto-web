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
        'receiver',
        'phone_number',
        'user_id',
        'is_paid',
        'total',
        'shipping_address',
        'status',
        'proof',
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
     * Generate Transaction Number
     * @return string
     */
    public function generateTransactionNumber()
    {
        $number = date('YmdHis');
        return 'ACT' . str_pad(rand(1,9999), 4, '0', STR_PAD_LEFT) . $number;
    }

    /**
     * Get Datatable Data
     * @return array
     */
    public function datatable()
    {
        $results = $this->with(['user', 'detail'])->where('user_id', auth()->id())->orderBy('number', 'desc')->get();
        return Datatables::of($results)
            ->editColumn('created_at', function ($data) {
                return date('l, d F Y - H:i', strtotime($data->created_at));
            })
            ->editColumn('total', function ($data) {
                return 'Rp '. number_format($data->total,0,',','.');
            })
            ->editColumn('is_paid', function ($data) {
                if($data->is_paid == 1) {
                    $html = '<span class="badge badge-success">Terverifikasi</span>';
                } else if(empty($data->proof)) {
                    $html = '
                    <button type="button" class="btn btn-primary btn-upload" data-id="' . $data->id . '">Konfirmasi Pembayaran</button>';
                } else {
                    $html = '<span class="badge badge-warning">Menunggu verifikasi penjual</span>';
                }
                return $html;
            })
            ->rawColumns(['is_paid'])
            ->make(true);
    }
}

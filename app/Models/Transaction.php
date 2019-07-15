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
    public function details()
    {
        return $this->hasMany('App\Models\TransactionDetail');
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
     * Retrieve only today's records
     * @return string
     */
    public function scopeThisMonth($query)
    {
        return $query->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'));
    }

    /**
     * Get card info
     * @return string
     */
    public function getCardInfo()
    {
        $transactions = $this->with('details')->thisMonth()->get();
        $transactionTotal = count($transactions);
        $omzet = $productSold = 0;
        foreach ($transactions as $transaction) {
            $omzet += $transaction->total;
            foreach ($transaction->details as $value) {
                $productSold += $value->qty;
            }
        }

        return [
            'transaction' => $transactionTotal,
            'product_sold' => $productSold,
            'omzet' => 'Rp ' . number_format($omzet,0,',','.')
        ];
    }

    /**
     * Get Datatable Data
     * @return array
     */
    public function datatable()
    {
        $results = $this->with(['user', 'details'])->where('user_id', auth()->id())->orderBy('number', 'desc')->get();
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

    /**
     * Get Datatable Data for Admin
     * @return array
     */
    public function datatableForAdmin()
    {
        $results = $this->with(['user', 'details'])->orderBy('number', 'desc')->get();
        return Datatables::of($results)
            ->editColumn('created_at', function ($data) {
                return date('l, d F Y - H:i', strtotime($data->created_at));
            })
            ->editColumn('total', function ($data) {
                return 'Rp '. number_format($data->total,0,',','.');
            })
            ->editColumn('status', function ($data) {
                return strtoupper($data->status);
            })
            ->editColumn('is_paid', function ($data) {
                if($data->is_paid == 1) {
                    $html = '<span class="text-success">Terverifikasi</span>';
                } else if(empty($data->proof)) {
                    $html = '<span class="text-danger">Belum dibayar</span>';
                } else {
                    $html = '<span class="text-warning">Menunggu verifikasi penjual</span>';
                }
                return $html;
            })
            ->editColumn('action', function ($data) {
                $html = '
                <button id="adminButtonModalTransactions" class="btn btn-danger btn-admin-transactions btn-icon" is-paid="' . $data->is_paid . '" transaction-number="' . $data->number . '" status="' . $data->status . '" data-id="' . $data->id .'">
                    Ubah Status
                </button>';
                return $data->status == 'selesai' ? '' : $html;
            })
            ->rawColumns(['is_paid', 'action'])
            ->make(true);
    }
}

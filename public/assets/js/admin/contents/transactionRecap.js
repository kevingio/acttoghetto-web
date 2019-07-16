

$(document).ready(function () {
    var $page = $('#transaction-recap-page');

    var transactionRecapPage = {
        dtTable: {},
        init: function () {
            this.initDatatable();
            this.customFunction();
        },
        customFunction: function () {
            let self = this;
            let dataId = null
            $(document).on('click', '.btn-admin-transactions', function () {
                dataId = $(this).attr('data-id')

                let status = $(this).attr('status')
                let isPaid = $(this).attr('is-paid')
                let transactionNumber = $(this).attr('transaction-number')
                let proofImage = $(this).attr('proof')

                $('select[name=status]').val(status)
                $('select[name=is_paid]').val(isPaid)
                $('#transactionNumber').text(transactionNumber)

                if (proofImage != '') {
                    $('#previewImage').attr('src', proofImage)
                    $('#transactionProofSection').show()
                } else {
                    $('#transactionProofSection').hide()
                }

                $('#adminModalTransactions').modal('show');
            })

            $(document).on('click', '.btn-admin-preview-transactions', function () {
                dataId = $(this).attr('data-id')
                
                $.ajax({
                    url: "/admin/transaction/" + dataId,
                    type: 'GET',
                    data: JSON,
                    success: function(res) {
                        let details = res.details;

                        $('.tabel-body-modal-preview').empty();
                        $('.wrapper-img-proof-transactions').empty();
                        
                        $('.preview-transactions-number').text(res.number)
                        $('.user-name').text(res.user.name)
                        $('.receiver-name').text(res.receiver)
                        $('.receiver-number').text(res.phone_number)
                        $('.receiver-address').text(res.shipping_address)
                        $('.status-order').text(res.status)
                        if (res.is_paid) {
                            $(".status-paid").removeClass("text-danger");
                            $(".status-paid").addClass("text-success");
                            $('.status-paid').text('Terverifikasi')
                        } else {
                            $(".status-paid").removeClass("text-success");
                            $(".status-paid").addClass("text-danger");
                            $('.status-paid').text('Belum Dibayar');
                        }

                        details.map((item, index) => {
                            let total = item.qty * item.product.price
                            let tableBody = '<tr>'
                            +    '<td class="text-left name-product">' + item.product.name + '</td>'
                            +    '<td class="text-right size-product">' + item.size.text + '</td>'
                            +    '<td class="text-right qty-products">' + item.qty + '</td>'
                            +    '<td class="text-right price-product">Rp ' + item.product.price.toLocaleString("de-DE", { minimumFractionDigits: 2 }) + '</td>'
                            +    '<td class="text-right total-price-products">Rp ' + total.toLocaleString("de-DE", { minimumFractionDigits: 2 }) + '</td>'
                            + '</tr>'
                            
                            $('.grand-total-products').text('Rp ' + parseInt(res.total).toLocaleString("de-DE", { minimumFractionDigits: 2 }));
                            
                            if (res.proof != null) {
                                let imgProof = '<img class="w-100" src="' + res.proof + '" alt="IMG-PROOF">'
                                $('.wrapper-img-proof-transactions').append(imgProof);
                            }
                            
                            $('.tabel-body-modal-preview').append(tableBody);
                        })
                    }
                })
                =$('#adminModalPreviewTransactions').modal('show');
            })
        
            $(document).on('submit', '#form-edit-status-transaction', function (e) {
                e.preventDefault()
                var data = $(this).serializeArray();
				$.ajax({
					url: "/admin/transaction/" + dataId,
					data: data,
					type: 'PUT',
					success: function(response) {
						transactionRecapPage.dtTable.ajax.reload(null, false);
                        $('#adminModalTransactions').modal('hide');
                        swal({
                            title: "Berhasil!",
                            text: "Status Pesan Berhasil diubah",
                            icon: "success"
                        });
					}
				});
            })
        },
        initDatatable: function () {
            var $table = $page.find('#transactionRecapDatatable');
            transactionRecapPage.dtTable = $table.DataTable({
                "aaSorting": [],
                "pageLength": 5,
                "processing": true,
                "serverSide": true,
                "searching": true,
                "lengthChange": false,
                "oLanguage": {
                    "sSearch": "Cari Nomor Transaksi"
                },
                "columns": [
                    { data: 'number', name: 'number' },
                    { data: 'total', name: 'total' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'status', name: 'status' },
                    { data: 'is_paid', name: 'is_paid' },
                    { data: 'action', name: 'action' },
                ],
                "ajax": {
                    url: "/admin/ajax/transaction",
                    type: "POST",
                    data: function (d) { d.mode = 'datatable'; }
                },
                "columnDefs": [
                    { targets: 'no-sort', orderable: false },
                    { targets: 'no-search', searchable: false },
                    { targets: 'text-center', className: 'text-center' },
                ]
            });
        }
    };

    if ($page.length) {
        transactionRecapPage.init();
    }
});

<div class="mt-3">
    {{-- Header --}}
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-1">💰 Catatan Keuangan</h2>
                    <p class="text-muted mb-0">Kelola pemasukan dan pengeluaran Anda</p>
                </div>
                <div>
                    <a href="{{ route('auth.logout') }}" class="btn btn-outline-danger">
                        <i class="bi bi-box-arrow-right"></i> Keluar
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Statistik Cards --}}
    <div class="row mb-4">
        <div class="col-md-4 mb-3">
            <div class="card border-0 shadow-sm h-100" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                <div class="card-body text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-1 opacity-75">Total Pemasukan</p>
                            <h3 class="mb-0 fw-bold">Rp {{ number_format($totalIncome, 0, ',', '.') }}</h3>
                        </div>
                        <div class="bg-white bg-opacity-25 rounded-circle p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-up-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0m-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card border-0 shadow-sm h-100" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                <div class="card-body text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-1 opacity-75">Total Pengeluaran</p>
                            <h3 class="mb-0 fw-bold">Rp {{ number_format($totalExpense, 0, ',', '.') }}</h3>
                        </div>
                        <div class="bg-white bg-opacity-25 rounded-circle p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-down-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0M8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card border-0 shadow-sm h-100" style="background: linear-gradient(135deg, {{ $balance >= 0 ? '#4facfe 0%, #00f2fe' : '#fa709a 0%, #fee140' }} 100%);">
                <div class="card-body text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-1 opacity-75">Saldo</p>
                            <h3 class="mb-0 fw-bold">Rp {{ number_format($balance, 0, ',', '.') }}</h3>
                        </div>
                        <div class="bg-white bg-opacity-25 rounded-circle p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
                                <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  {{-- Chart Statistik --}}
<div class="card shadow-sm mb-4">
    <div class="card-header bg-white border-0 pt-4 pb-3">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mb-1 fw-bold">📊 Grafik Keuangan</h5>
                <p class="text-muted small mb-0">Perbandingan pemasukan dan pengeluaran 6 bulan terakhir</p>
            </div>
            <div>
                <small class="text-muted">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-info-circle me-1" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533z"/>
                        <circle cx="8" cy="4.5" r="1"/>
                    </svg>
                    Klik menu garis tiga di bawah untuk download
                </small>
            </div>
        </div>
    </div>
    <div class="card-body pt-2">
        <div id="transactionChart"></div>
    </div>
</div>

    {{-- Filter & Search --}}
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text bg-light border-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                            </svg>
                        </span>
                        <input type="text" class="form-control border-0 bg-light" placeholder="Cari kategori atau deskripsi..." wire:model.live="search">
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="form-select border-0 bg-light" wire:model.live="filterType">
                        <option value="">🔍 Semua Tipe</option>
                        <option value="income">💰 Pemasukan</option>
                        <option value="expense">💸 Pengeluaran</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select border-0 bg-light" wire:model.live="filterCategory">
                        <option value="">📂 Semua Kategori</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}">{{ $cat }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary w-100 shadow-sm" data-bs-toggle="modal" data-bs-target="#addTransactionModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle me-1" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                        </svg>
                        Tambah
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Tabel Transaksi --}}
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="px-4 py-3">No</th>
                            <th class="py-3">Tanggal</th>
                            <th class="py-3">Tipe</th>
                            <th class="py-3">Kategori</th>
                            <th class="py-3 text-end">Jumlah</th>
                            <th class="py-3">Deskripsi</th>
                            <th class="py-3 text-center">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $key => $transaction)
                        <tr>
                            <td class="px-4">{{ ($transactions->currentPage() - 1) * $transactions->perPage() + $key + 1 }}</td>
                            <td>
                                <small class="text-muted">{{ date('d M Y', strtotime($transaction->transaction_date)) }}</small>
                            </td>
                            <td>
                                @if($transaction->type === 'income')
                                    <span class="badge rounded-pill" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                                        💰 Pemasukan
                                    </span>
                                @else
                                    <span class="badge rounded-pill" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                                        💸 Pengeluaran
                                    </span>
                                @endif
                            </td>
                            <td>
                                <span class="fw-semibold">{{ $transaction->category }}</span>
                            </td>
                            <td class="text-end">
                                <span class="fw-bold {{ $transaction->type === 'income' ? 'text-success' : 'text-danger' }}">
                                    Rp {{ number_format($transaction->amount, 0, ',', '.') }}
                                </span>
                            </td>
                            <td>
                                <small class="text-muted">{{ \Illuminate\Support\Str::limit(strip_tags($transaction->description), 30) }}</small>
                            </td>
                            <td class="text-center">
    <div class="d-flex gap-2 justify-content-center">
        <a href="{{ route('app.transactions.detail', ['transaction_id' => $transaction->id]) }}" 
           class="btn btn-sm btn-outline-primary d-flex align-items-center"
           style="border-radius: 8px; padding: 6px 12px; font-size: 12px; font-weight: 500;">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="me-1" viewBox="0 0 16 16">
                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
            </svg>
            Detail
        </a>
        <button wire:click="prepareEditTransaction({{ $transaction->id }})" 
                class="btn btn-sm btn-outline-warning d-flex align-items-center"
                style="border-radius: 8px; padding: 6px 12px; font-size: 12px; font-weight: 500;">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="me-1" viewBox="0 0 16 16">
                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
            </svg>
            Edit
        </button>
        <button wire:click="prepareDeleteTransaction({{ $transaction->id }})" 
                class="btn btn-sm btn-outline-danger d-flex align-items-center"
                style="border-radius: 8px; padding: 6px 12px; font-size: 12px; font-weight: 500;">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="me-1" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
            </svg>
            Hapus
        </button>
    </div>
</td>
                        </tr>
                        @endforeach
                        @if (count($transactions) === 0)
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <div class="text-muted">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-inbox mb-3" viewBox="0 0 16 16">
                                        <path d="M4.98 4a.5.5 0 0 0-.39.188L1.54 8H6a.5.5 0 0 1 .5.5 1.5 1.5 0 1 0 3 0A.5.5 0 0 1 10 8h4.46l-3.05-3.812A.5.5 0 0 0 11.02 4zm9.954 5H10.45a2.5 2.5 0 0 1-4.9 0H1.066l.32 2.562a.5.5 0 0 0 .497.438h12.234a.5.5 0 0 0 .496-.438zM3.809 3.563A1.5 1.5 0 0 1 4.981 3h6.038a1.5 1.5 0 0 1 1.172.563l3.7 4.625a.5.5 0 0 1 .105.374l-.39 3.124A1.5 1.5 0 0 1 14.117 13H1.883a1.5 1.5 0 0 1-1.489-1.314l-.39-3.124a.5.5 0 0 1 .106-.374z"/>
                                    </svg>
                                    <p class="mb-0">Belum ada data transaksi</p>
                                    <small>Klik tombol "Tambah" untuk membuat transaksi baru</small>
                                </div>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            
            {{-- Pagination --}}
            @if($transactions->hasPages())
            <div class="p-3 border-top">
                {{ $transactions->links() }}
            </div>
            @endif
        </div>
    </div>

    {{-- Modals --}}
    @include('components.modals.transactions.add')
    @include('components.modals.transactions.edit')
    @include('components.modals.transactions.delete')
</div>

@push('scripts')
<script>
    document.addEventListener('livewire:initialized', () => {
        const chartData = @json($chartData);
        
        const options = {
            series: [{
                name: 'Pemasukan',
                data: chartData.income
            }, {
                name: 'Pengeluaran',
                data: chartData.expense
            }],
            chart: {
                type: 'area',
                height: 320,  // ← Tambah tinggi sedikit
                toolbar: {
                    show: true,
                    tools: {
                        download: true,
                        selection: false,
                        zoom: false,
                        zoomin: false,
                        zoomout: false,
                        pan: false,
                        reset: false
                    },
                    export: {
                        csv: {
                            filename: 'Laporan-Keuangan-' + new Date().toLocaleDateString('id-ID'),
                        },
                        svg: {
                            filename: 'Grafik-Keuangan-' + new Date().toLocaleDateString('id-ID'),
                        },
                        png: {
                            filename: 'Grafik-Keuangan-' + new Date().toLocaleDateString('id-ID'),
                        }
                    }
                },
                fontFamily: 'inherit',
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                width: 2
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.4,
                    opacityTo: 0.05,
                }
            },
            xaxis: {
                categories: chartData.months,
                labels: {
                    style: {
                        fontSize: '12px',
                        colors: '#6c757d'
                    }
                }
            },
            yaxis: {
                labels: {
                    formatter: function (val) {
                        if (val >= 1000000) return 'Rp ' + (val / 1000000).toFixed(1) + 'jt';
                        if (val >= 1000) return 'Rp ' + (val / 1000).toFixed(0) + 'rb';
                        return 'Rp ' + val.toLocaleString('id-ID');
                    },
                    style: {
                        fontSize: '11px',
                        colors: '#6c757d'
                    }
                }
            },
            tooltip: {
                shared: true,
                y: {
                    formatter: function (val) {
                        return 'Rp ' + val.toLocaleString('id-ID');
                    }
                }
            },
            legend: {
                position: 'bottom',  // ← PINDAH KE BAWAH
                horizontalAlign: 'center',  // ← CENTER
                fontSize: '13px',
                fontWeight: 500,
                markers: {
                    width: 10,
                    height: 10,
                    radius: 10,
                },
                itemMargin: {
                    horizontal: 15,
                    vertical: 8
                }
            },
            colors: ['#667eea', '#f5576c'],
            grid: {
                borderColor: '#f1f1f1',
                padding: {
                    bottom: 10
                }
            }
        };

        const chart = new ApexCharts(document.querySelector("#transactionChart"), options);
        chart.render();
    });
</script>
@endpush
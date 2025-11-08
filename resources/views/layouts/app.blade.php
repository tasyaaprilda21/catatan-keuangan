<!doctype html>
<html lang="id">
<head>
    {{-- Meta --}}
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Icon --}}
    <link rel="icon" href="/logo.png" type="image/x-icon" />

    {{-- Judul --}}
    <title>Catatan Keuangan</title>

    {{-- Styles --}}
    @livewireStyles
    <link rel="stylesheet" href="/assets/vendor/bootstrap-5.3.8-dist/css/bootstrap.min.css">
    
    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   {{-- ApexCharts --}}
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> 

{{-- Trix Editor --}}
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
<script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
<style>
    .trix-content {
        border: 1px solid #dee2e6;
        border-radius: 0.375rem;
        min-height: 150px;
    }
    
    trix-toolbar {
        border-radius: 0.375rem 0.375rem 0 0;
    }
    
    trix-editor {
        border-radius: 0 0 0.375rem 0.375rem;
    }
</style>



</head>
<body class="bg-light">
    <div class="container-fluid">
        @yield('content')
    </div>

    {{-- Scripts --}}
    <script src="/assets/vendor/bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("livewire:initialized", () => {
            Livewire.on("closeModal", (data) => {
                const modal = bootstrap.Modal.getInstance(
                    document.getElementById(data.id)
                );
                if (modal) {
                    modal.hide();
                }
            });
            Livewire.on("showModal", (data) => {
                const modal = bootstrap.Modal.getOrCreateInstance(
                    document.getElementById(data.id)
                );
                if (modal) {
                    modal.show();
                }
            });
            
            // SweetAlert2 Handler
            Livewire.on("showAlert", (data) => {
                Swal.fire({
                    icon: data.type,
                    title: data.type === 'success' ? 'Berhasil!' : 'Gagal!',
                    text: data.message,
                    timer: 3000,
                    showConfirmButton: false
                });
            });
        });
    </script>
    @livewireScripts
    
    @stack('scripts')
</body>
</html>
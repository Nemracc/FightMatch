<!DOCTYPE html>
<html>

<head>
    <title>FightMatch</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap5.min.css">
    <style>
        body {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background: #343a40;
            color: white;
            padding: 15px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
        }

        .sidebar a:hover {
            background: #495057;
        }

        .content {
            flex-grow: 1;
            padding: 20px;
        }

        .column-1 {
            background: linear-gradient(to right, #ffcccc, #ff6666);
        }

        .column-2 {
            background: linear-gradient(to right, #ccccff, #6666ff);
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <h4>Menú</h4>
        <a href="{{ route('peleadores.index') }}"><i class="fa-solid fa-people-group"></i></i> Peleadores</a>
        <a href="{{ route('emparejamientos.generate') }}"><i class="fa-solid fa-people-arrows"></i> Emparejar</a>
        <a href="{{ route('emparejamientos.index') }}"><i class="fas fa-file-alt"></i> Emparejamientos</a>
        <a href="{{ route('modalidad.index') }}"><i class="fa-solid fa-file-shield"></i></i> Modalidad</a>
    </div>

    <div class="content">
        <div class="container">
            @yield('content')
        </div>
    </div>
</body>

<!-- DataTables JS -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function() {
        $('#tablaEmparejamientos').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            language: {
                url: '/datatables/i18n/es-ES.json'
            },
            columnDefs: [{
                targets: -1, // Última columna (Acción)
                orderable: false,
                searchable: false
            }]
        });

        // Aplicar clases a las columnas correspondientes
        $('#tablaEmparejamientos thead th').each(function(index) {
            if ($(this).text().includes('1')) {
                $('#tablaEmparejamientos tbody tr td:nth-child(' + (index + 1) + ')').addClass(
                    'column-1');
            } else if ($(this).text().includes('2')) {
                $('#tablaEmparejamientos tbody tr td:nth-child(' + (index + 1) + ')').addClass(
                    'column-2');
            }
        });
    });
</script>

</html>

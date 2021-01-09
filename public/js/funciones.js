$(document).ready(function() {

    var dataSet;
    $.ajax({
        url: "/client/list",
        type: 'GET',
        data: "",
        success: function(data) {
            dataSet = data;
            var table = $('#client_table').DataTable();
            $.each(data, function(i, dat) {

                if (dat.id != 0) {
                    table.row.add([dat.id, dat.identification, dat.name, dat.address, dat.phone, dat.email])
                        .draw()
                        .node().id = dat.id;
                }
            });


        },
        error: function(xhr) {
            console.log(xhr.responseText);
        },
    });


    var table = $('#client_table').DataTable({
        data: dataSet,
        render: function(data, type, full, meta) {
            Utils.formatString(buttonTemplate, data)
        },

        columns: [
            { title: "Id" },
            { title: "Identificacion" },
            { title: "Nombre" },
            { title: "Dirección" },
            { title: "Celular" },
            { title: "Correo" },
            { title: "Acciones" }

        ],
        columnDefs: [{
                render: createManageBtn,
                data: dataSet,
                targets: [6]
            },
            {
                "targets": [0],
                "visible": false
            }
        ],

        //para cambiar el lenguaje a español
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "sProcessing": "Procesando...",
        }
    });

    $('#client_table tbody').on('click', '#editClientBtn', function() {
        var data = table.row($(this).parents('tr')).data();

        $("#clientModal").modal("show");
        $("#title-modal").text("Editar cliente -" + data[2]);
        $('#formRegisterClient').attr('action', '/client/edit/' + data[0]);
        $("#identification").val(data[1]);
        $("#name").val(data[2]);
        $("#address").val(data[3]);
        $("#phone").val(data[4]);
        $("#email").val(data[5]);
        $('#password').hide();
        $('#txt-password').hide();
        $('#password_confirm').hide();
        $('#txt-password-confirm').hide();



    });

    $('#client_table tbody').on('click', '#deleteClientBtn', function() {
        var data = table.row($(this).parents('tr')).data();
        table.row("tr[id=" + data[0] + "]").remove().draw(false);

        $.ajax({
            url: '/client/delete/' + data[0],
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'POST',
            data: {
                "id": data[0],
                "_method": 'DELETE',
            },
            success: function(data) {

                if (data == 200) {

                    toastr.options = {
                        "debug": false,
                        "newestOnTop": false,
                        "positionClass": "toast-top-center",
                        "closeButton": true,
                        "toastClass": "animated fadeInDown",
                    };

                    toastr.success('Se elimino correctamente.');

                } else {
                    toastr.options = {
                        "debug": false,
                        "newestOnTop": false,
                        "positionClass": "toast-top-center",
                        "closeButton": true,
                        "toastClass": "animated fadeInDown",
                    };

                    toastr.error('Error, elimine nuevamente.');
                }


            },
            error: function(xhr) {
                console.log(xhr.responseText);
            },
        });
    });



    $('#btn-cerrar').on('click', function() {
        $('#clientModal').modal('hide');
    });

    //fin 
});

function registrarClientModal() {
    $("#clientModal").modal("show");
    $("#title-modal").text("Nuevo cliente");
    $('#formRegisterClient').attr('action', '/client/register');
    $("#identification").val("");
    $("#name").val("");
    $("#address").val("");
    $("#phone").val("");
    $("#email").val("");
}

function createManageBtn(dataSet) {
    return '<button id="editClientBtn" type="button"  class="btn btn-secondary btn-xs"><i class="fas fa-edit"></i></button><button id="deleteClientBtn" type="button"  class="btn btn-danger btn-xs" style="margin-left: 0.5rem;"><i class="fas fa-trash"></i></button>';
}
let idEst=0;
let urlBase = "";
$(document).ready(function() {
    $('.js-example-basic-multiple').select2({
        
    });
    $('#mSelect').select2({
        dropdownParent: $("#modalCenter")
    });
    
});
function deleteEmpleado(url) {
    urlBase = url
    var id = $('#modalEmp').val();
    $.ajax({
        type: "post",
        url: url + 'eliminarEmpleado',
        data: { id: id },
        success: function (r) {
            window.location.href = url + "empleados";
        },
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
    }); 
    
}
function idEmpleado(id) {
    $('#modalEmp').val(id);
}
function llenarModalEditE(id, nombre, apellido, direccion, identificacion, salario, rol){
    $("#midEmp").val(id);
    $("#mnombreEmp").val(nombre);
    $("#mapellidoEmp").val(apellido);
    $("#mdireccionEmp").val(direccion);
    $("#midentificacionEmp").val(identificacion);
    $("#msalarioEmp").val(salario);
    $("#mrolEmp option:selected").attr("selected", false);
    $(`#mrolEmp option:contains("${rol}")`).attr("selected", true).change();
}
function llenarModalEditTrabajos(id, detalle, fecha, direccion, telefono, total,propietario){
    alert(id, detalle, fecha, direccion, telefono, total,propietario);
    $("#midTrb").val(id);
    $("#mdetalleTrb").val(detalle);
    $("#mfechaTrb").val(fecha);
    $("#mdireccionTrb").val(direccion);
    $("#mtelefonoTrb").val(telefono);
    $("#mtotalTrb").val(total);
    $("#mpropietarioTrb").val(propietario);
}
function idTrabajo(id) {
    $('#modalTrb').val(id);
}
function alertazzzzz (){
    alert('hola');
}
function deleteTrabajo(url) {
    urlBase = url
    var id = $('#modalTrb').val();
    $.ajax({
        type: "post",
        url: url + 'eliminarTrabajo',
        data: { id: id },
        success: function (r) {
            window.location.href = url + "trabajos";
        },
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
    }); 
    
}


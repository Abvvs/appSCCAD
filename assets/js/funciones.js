let idEst=0;
let urlBase = "";
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
function llenarModalEditE(id, nombre, apellido, direccion, identificacion, salario){
    $("#midEmp").val(id);
    $("#mnombreEmp").val(nombre);
    $("#mapellidoEmp").val(apellido);
    $("#mdireccionEmp").val(direccion);
    $("#midentificacionEmp").val(identificacion);
    $("#msalarioEmp").val(salario);
}
function editarEmp(url) {
    var midEmp = $('#midEmp').val();
    var mnombreEmp = $('#mnombreEmp').val();
    var mapellidoEmp = $('#mapellidoEmp').val();
    var mdireccionEmp = $('#mdireccionEmp').val();
    var midentificacionEmp = $('#midentificacionEmp').val();
    var msalarioEmp = $('#msalarioEmp').val();
    console.log( midEmp, mnombreEmp, mapellidoEmp, mdireccionEmp, midentificacionEmp, msalarioEmp);
    $.ajax({
        type: "post",
        url: url + 'editarEmpleado',
        data: { midEmp: midEmp, mnombreEmp:mnombreEmp, mapellidoEmp:mapellidoEmp, mdireccionEmp:mdireccionEmp, midentificacionEmp:midentificacionEmp, msalarioEmp:msalarioEmp},
        success: function (r) {
            window.location.href = url + "empleados";
        },
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
    }); 
    
}
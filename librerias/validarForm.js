 //SELECCION DEL FORMULARIO

var formulario = document.getElementById("frmReg");


window.onload = iniciar; //Sin paréntesis


function iniciar() {
    document.getElementById("limpiar").addEventListener('click',validar1,false);
              
                console.log('siiii');
              document.getElementById("descripcion").value="";
              document.frmReg.idProducto.value="";
              document.frmReg.descripcion.value="";
              document.frmReg.costoBS.value="";
              document.frmReg.precioDolar.value="";
              document.frmReg.dia.value="d";
              document.frmReg.mes.value="m";
              document.frmReg.ano.value="a";
              //alertify.success("Limpiado");
}

function validar(e) {
    var a='1';
    var b='2';
    if (a===b) {
        return true;
    } else {
        e.preventDefault();
        return false;
    }
}
function validar1() {
  
        return false;
    
}

function FormVacio(){
    document.getElementById("descripcion").value="";
              
              document.frmReg.descripcion.value="";
    
}
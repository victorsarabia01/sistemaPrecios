*-----------------------------
* obtener cotización del dólar en bolívares
* desde https://s3.amazonaws.com/dolartoday/data.json
* requiere nfjsonRead.prg
* descargar desde vfpx: https://vfpx.codeplex.com/releases/view/620040
*--------------------------------

#Define crlf Chr(13)+Chr(10)

Public oDolar,cJson  && puedes explorar oDolar en el depurador
cJson = .Null.

Set Path To \proyectos\nfjson

Wait 'Obteniendo cotización...' Window Nowait
urlFuenteJson = 'https://s3.amazonaws.com/dolartoday/data.json'

cJson = descargar( m.urlFuenteJson )

Try
    oDolar =  nfjsonread(  m.cJson )
    jsonOk = .T.

Catch To oError

    Messagebox(oError.Message,0)

    jsonOk = .F.

Endtry

If !m.jsonOk
    Return
Endif

With oDolar.usd

    cotización = Concat( ;
        'Cotización Dólar/Bs a ',oDolar.__timestamp.fecha,':',crlf,;
        'Dolartoday:',.dolartoday,crlf,;
        'Cencoex:',.cencoex,crlf,;
        'Efectivo:',.efectivo_real,crlf,;
        'Promedio:',.promedio,crlf,;
        'Sicad2:',.sicad2,crlf,;
        'Transferencias.:',.transferencia)

Endwith

Messagebox( m.cotización,0)



*------------------------------------------
Function descargar( url )
*------------------------------------------

Local oError
Local loXMLHTTP As "MSXML2.XMLHTTP"
loXMLHTTP = Createobject("MSXML2.XMLHTTP")

With loXMLHTTP As msxml.XMLHTTP
    Try
        .Open("GET", m.url ,.F.)
        .setRequestHeader('Accept','text/html')
        .Send()
        cres = STRCONV(.ResponseBody,1)
    Catch To oError
        Messagebox('Error obteniendo datos desde '+m.url,0)
        cres = .Null.
    Endtry

    Return cres

Endwith

*----------------------------------------------------------------------------------------------------------------
Function Concat(p1,p2,p3,p4,p5,p6,p7,p8,p9,p10,p11,p12,p13,p14,p15,p16,p17,p18,p19,p20,p21,p22,p23,p24,p25,p26)
*----------------------------------------------------------------------------------------------------------------
Local ss
ss= ''
For x = 1 To Pcount()
    ss = ss+Transform(Nvl( Evaluate(Transform('P'+Tran(x,'@B 99'))),'') )+' '
Endfor

Return ss


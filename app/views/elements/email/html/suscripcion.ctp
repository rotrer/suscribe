<br /><br />
<table width="600" border="0" align="center" cellpadding="20" cellspacing="0"   style ="border:1px solid #ccc">
  <tr>
    <td><table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="40" align="right"><img src="https://www.rutamaipo.cl/suscribetutag/images/rutamaipo.jpg" alt="Ruta Maipo" width="201" height="79"></td>
      </tr>
      <tr>
        <td><br />
<br />
<table width="600" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="288"><span style="font-family:Arial, Helvetica, sans-serif;  font-size:13px; line-height:160%;">
              Sr (a)<br />
              <?php echo $usuario['first_name'] . ' ' . $usuario['last_name'] ?> <br />
              <?php if( $usuario['who'] == 2 ) { ?>
              Razón Social (Caso Cuenta Comercial)<br />
              <?php } ?>
              <?php echo $usuario['address'] ?><br />
              <?php echo $usuario['comuna'] ?></p>
              <strong><?php echo $usuario['region'] ?>  </strong></span></td>
            <td width="10">&nbsp;</td>
            <td width="302"><table width="279" border="0" align="right" cellpadding="0" cellspacing="0" style="font-family:Arial, Helvetica, sans-serif;  font-size:13px; line-height:160%;">
              <tr>
                <td width="138" height="20" valign="middle"><p>Correspondencia Nº<br />
                </p></td>
                <td width="113" height="20" align="right" valign="middle"><?php echo $usuario['newUserId'] ?></td>
              </tr>
              <tr>
                <td height="20" valign="middle">Fecha </td>
                <td height="20" align="right" valign="middle"><?php echo date('d-m-Y') ?></td>
              </tr>
              <tr>
                <td height="20" valign="middle">Número de Cuenta </td>
                <td height="20" align="right" valign="middle"><?php echo $usuario['id_user_webfacade'] ?></td>
              </tr>
            </table></td>
          </tr>
        </table>
        </td>
      </tr>
      <tr>
        <td><table width="600" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><p>&nbsp;</p></td>
          </tr>
          <tr>
            <td><span style="font-family:Arial, Helvetica, sans-serif;  font-size:13px; line-height:160%;"><strong>ASUNTO: </strong>CARTA DE BIENVENIDA CLIENTE</span></td>
          </tr>
          <tr>
            <td><span style="font-family:Arial, Helvetica, sans-serif;  font-size:13px; line-height:180%;"><br />
              Estimado (a) Sr (a) <?php echo $usuario['first_name'] . ' ' . $usuario['last_name'] ?>, <br />
              Junto con saludar, queremos darle la bienvenida al Sistema de TAG Interurbano de Ruta del Maipo. <br />
              Sus datos de Cliente y vehículo(s) asociado(s) ya se encuentra registrado en nuestros sistemas y en consecuencia, a partir de hoy puede comenzar a utilizar su(s) dispositivo(s) TAG(s) en la infraestructura del Sistema de TAG Interurbano implementado en todas las plazas de peajes de la Concesión. <br />
              Ante cualquier consulta no dude en contactarse a través de nuestra página Web <a href="http://www.rutamaipo.cl\" style="color:#003359;">www.rutamaipo.cl</a> o a través del servicio de atención telefónica al 600 252 5000.</span><br /><br />
             <span style="font-family:Arial, Helvetica, sans-serif;  font-size:13px; line-height:160%;">Le saluda atentamente,<br />
                <strong>Servicio Atención al Cliente.</strong></span></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td align="right"><span style="font-family:Arial, Helvetica, sans-serif;  font-size:13px; line-height:160% ; color:"><strong style="color:#003359;">RUTA DEL MAIPO SOCIEDAD CONCESIONARIA S.A.</strong><br />
Una concesión de <strong  style="color:#003359;">INTERVIAL CHILE S.A.</strong><br />
Oficina Comercial Principal Km 57 Ruta 5 Sur, Mostazal<br />
<strong style="color:#003359;">www.rutamaipo.cl</strong><br />

FONO CALL CENTER 600 252 5000
</span><br /><br />
</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table><br /><br />
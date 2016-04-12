<table width="64%" border="0" align="left">
  <tr>
    <td colspan="3"><div align="center">
      <h3 align="left">Contact Information</h3>
    </div></td>
  </tr>
  <tr>
    <td width="25%">&nbsp;</td>
    <td width="4%">&nbsp;</td>
    <td width="71%">&nbsp;</td>
  </tr>
  <tr>
    <td><div align="left"><strong>Nombre</strong></div></td>
    <td>&nbsp;</td>
    <td><div align="left">{{ $data->name }} </div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>E-mail</strong></div></td>
    <td>&nbsp;</td>
    <td><div align="left">{{ $data->email }}</div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Teléfono</strong></div></td>
    <td>&nbsp;</td>
    <td><div align="left">{{ $data->mobile }}</div></td>
  </tr>
  <tr>
    <td><div align="left"><strong>Mensaje</strong></div></td>
    <td>&nbsp;</td>
    <td rowspan="4" valign="top"><div align="left">{{ $data->message }}</div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="left"></div></td>
  </tr>
  <tr>
    <td><strong>Date of contact</strong></td>
    <td>&nbsp;</td>
    <td><div align="left">{{ date('d-m-Y H:i:s') }}</div></td>
  </tr>
</table>

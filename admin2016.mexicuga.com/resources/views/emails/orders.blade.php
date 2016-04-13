<style type="text/css">
    body {
        margin-left: 0px;
        margin-top: 0px;
        margin-right: 0px;
        margin-bottom: 0px;
    }
</style>

<body>
<table width="600" cellpadding="4" cellspacing="0">
    <tr bgcolor="#fe0000">
        <td colspan="3"></td>
    </tr>
    <tr>
        <td align="center" colspan="3"><a href="https://www.mexicuga.com" target="_blank"><img src="{{ asset('resources/assets/front/img') }}/mexicuga-emailing-logo.jpg" width="292" height="87"/></a></td>
    </tr>
    <tr bgcolor="#1460ab">
        <td><font face="Verdana, Geneva, sans-serif" color="#FFFFFF" size="+1">t. <strong>6798-6452</strong></font></td>
        <td align="center"><font face="Verdana, Geneva, sans-serif" color="#FFFFFF" size="+1">t. <strong>7045-4837</strong></font></td>
        <td align="right"><a href="mailto:info@mexicuga.com"><font face="Verdana, Geneva, sans-serif" color="#FFFFFF" size="+1"><strong>info@mexicuga.com</strong></font></a></td>
    </tr>
    <tr>
        <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="3"><font face="Verdana, Geneva, sans-serif" color="#333" size="+1"><strong>{{ Auth::user()->name }} :</strong></font></td>
    </tr>
    <tr>
        <td colspan="3" align="justify"><font face="Verdana, Geneva, sans-serif" color="#333" size="-1">¡Gracias! En breve nos comunicaremos con usted para decirle la fecha y hora de entrega.
                <br /><br />
                Su <strong>número de pedido es {{ $orders->invoice_number }}</strong> e incluye lo siguiente:
            </font></td>
    </tr>
    <tr>
        <td colspan="3">
            <table width="600">
                <tr><td colspan="4"><hr /></td></tr>
                <tr>
                    <td><font face="Verdana, Geneva, sans-serif" color="#333" size="-1"><strong>Cantidad</strong></font></td>
                    <td><font face="Verdana, Geneva, sans-serif" color="#333" size="-1"><strong>Imagen</strong></font></td>
                    <td><font face="Verdana, Geneva, sans-serif" color="#333" size="-1"><strong>Producto</strong></font></td>
                    <td align="right"><font face="Verdana, Geneva, sans-serif" color="#333" size="-1"><strong>Precio</strong></font></td>
                </tr>
                @foreach($orders->getCart as $item)
                <tr bgcolor="#efefef">
                    <td><font face="Verdana, Geneva, sans-serif" color="#333" size="-1">{{ $item->qty }}</font></td>
                    <td><img src="{{ asset('public/images/product/'.$item->image) }}" width="15" height="15" /></td>
                    <td><font face="Verdana, Geneva, sans-serif" color="#333" size="-1"><strong>{{ $item->code }}</strong>{{ $item->name }}</font></td>
                    <td align="right"><font face="Verdana, Geneva, sans-serif" color="#333" size="-1">${{ number_format(($item->price*$item->qty),2) }}</font></td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="3" align="right"><font face="Verdana, Geneva, sans-serif" color="#333" size="-1">Subtotal</font></td>
                    <td align="right"><font face="Verdana, Geneva, sans-serif" color="#333" size="-1">$ {{ $orders->amount-$orders->shipping_charge }}</font></td>
                </tr>
                <tr>
                    <td colspan="3" align="right"><font face="Verdana, Geneva, sans-serif" color="#333" size="-1">I.V.A.</font></td>
                    <td align="right"><font face="Verdana, Geneva, sans-serif" color="#333" size="-1">$ 0</font></td>
                </tr>
                <tr>
                    <td colspan="3" align="right"><font face="Verdana, Geneva, sans-serif" color="#333" size="-1">Envío</font></td>
                    <td align="right"><font face="Verdana, Geneva, sans-serif" color="#333" size="-1">$ {{ $orders->shipping_charge }}</font></td>
                </tr>
                <tr>
                    <td colspan="3" align="right"><font face="Verdana, Geneva, sans-serif" color="#1460ab" size="-1"><strong>Total</strong></font></td>
                    <td align="right"><font face="Verdana, Geneva, sans-serif" color="#1460ab" size="-1"><strong>$ {{ $orders->amount }}</strong></font></td>
                </tr>
                <tr><td colspan="4"><hr /></td></tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="3">
            <table width="600" cellpadding="5">
                <tr>
                    <td colspan="5"><font face="Verdana, Geneva, sans-serif" color="#333" size="-1"><strong>Status de su Pedido</strong></font></td>
                </tr>
                <tr>
                    @if($orders->status == 0)
                        <td align="center" bgcolor="#f4f4f4">
                            <font face="Verdana, Geneva, sans-serif" color="#666" size="+1">2</font>
                            <br />
                            <font face="Verdana, Geneva, sans-serif" color="#666" size="-1">Pedido Confirmado</font>
                            <br />
                            <img src="{{ asset('resources/assets/front/img') }}/mexicuga-email-spinner.png" width="25" height="23" />
                        </td>
                    @else
                        <td align="center" bgcolor="#d8339c">
                            <font face="Verdana, Geneva, sans-serif" color="#fff" size="+1">1</font>
                            <br />
                            <font face="Verdana, Geneva, sans-serif" color="#fff" size="-1">Pedido Confirmado</font>
                            <br />
                            <img src="{{ asset('resources/assets/front/img') }}/mexicuga-emailing-check.png" width="25" height="23" />
                        </td>
                    @endif

                    @if($orders->status > 1)
                        <td align="center" bgcolor="#d8339c">
                            <font face="Verdana, Geneva, sans-serif" color="#fff" size="+1">2</font>
                            <br />
                            <font face="Verdana, Geneva, sans-serif" color="#fff" size="-1">Pedido en Ruta</font>
                            <br />
                            <img src="{{ asset('resources/assets/front/img') }}/mexicuga-emailing-check.png" width="25" height="23" />
                        </td>
                    @else
                        <td align="center" bgcolor="#f4f4f4">
                            <font face="Verdana, Geneva, sans-serif" color="#666" size="+1">2</font>
                            <br />
                            <font face="Verdana, Geneva, sans-serif" color="#666" size="-1">Pedido en Ruta</font>
                            <br />
                            <img src="{{ asset('resources/assets/front/img') }}/mexicuga-email-spinner.png" width="25" height="23" />
                        </td>
                    @endif

                    @if($orders->payment_type != "cash_on_delivery")
                        <td align="center" bgcolor="#d8339c">
                            <font face="Verdana, Geneva, sans-serif" color="#fff" size="+1">3</font>
                            <br />
                            <font face="Verdana, Geneva, sans-serif" color="#fff" size="-1">Pago Confirmado</font>
                            <br />
                            <img src="{{ asset('resources/assets/front/img') }}/mexicuga-emailing-check.png" width="25" height="23" />
                        </td>
                    @else
                        <td align="center" bgcolor="#f4f4f4">
                            <font face="Verdana, Geneva, sans-serif" color="#666" size="+1">3</font>
                            <br />
                            <font face="Verdana, Geneva, sans-serif" color="#666" size="-1">Pago Confirmado</font>
                            <br />
                            <img src="{{ asset('resources/assets/front/img') }}/mexicuga-email-spinner.png" width="25" height="23" />
                        </td>
                    @endif

                    @if($orders->status > 2)
                        <td align="center" bgcolor="#d8339c">
                            <font face="Verdana, Geneva, sans-serif" color="#fff" size="+1">4</font>
                            <br />
                            <font face="Verdana, Geneva, sans-serif" color="#fff" size="-1">Pedido Entregado</font>
                            <br />
                            <img src="{{ asset('resources/assets/front/img') }}/mexicuga-emailing-check.png" width="25" height="23" />
                        </td>
                    @else
                        <td align="center" bgcolor="#f4f4f4">
                            <font face="Verdana, Geneva, sans-serif" color="#666" size="+1">4</font>
                            <br />
                            <font face="Verdana, Geneva, sans-serif" color="#666" size="-1">Pedido Entregado</font>
                            <br />
                            <img src="{{ asset('resources/assets/front/img') }}/mexicuga-email-spinner.png" width="25" height="23" />
                        </td>
                    @endif

                    @if($orders->status > 2)
                        <td align="center" bgcolor="#d8339c">
                            <font face="Verdana, Geneva, sans-serif" color="#fff" size="+1">5</font>
                            <br />
                            <font face="Verdana, Geneva, sans-serif" color="#fff" size="-1">Disfrute su Compra</font>
                            <br />
                            <img src="{{ asset('resources/assets/front/img') }}/mexicuga-emailing-happy-face-active.png" width="25" height="23" />
                        </td>
                    @else
                        <td align="center" bgcolor="#f4f4f4">
                            <font face="Verdana, Geneva, sans-serif" color="#666" size="+1">5</font>
                            <br />
                            <font face="Verdana, Geneva, sans-serif" color="#666" size="-1">Disfrute su Compra</font>
                            <br />
                            <img src="{{ asset('resources/assets/front/img') }}/mexicuga-email-spinner.png" width="25" height="23" />
                        </td>
                    @endif
                </tr>
            </table>
        </td>
    <tr>
        <td colspan="3"></td>
    </tr>
    <tr>
        <td colspan="3" align="justify"><font face="Verdana, Geneva, sans-serif" color="#333" size="-1">Atte,<br />
                <strong>Mexicuga.com</strong></font>
        </td>
    </tr>
</table>
<table width="600" cellpadding="4" cellspacing="0">
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td width="54"><img src="{{ asset('resources/assets/front/img') }}/img-envio-gratis-emailing.jpg" width="54" height="55" alt="Envíos" /></td>
        <td bgcolor="#3aa9e4">&nbsp;&nbsp;<font face="Verdana, Geneva, sans-serif" color="#fff" size="+1"><strong>ENVÍOS GRATIS</strong></font>
            <br />
            <font face="Verdana, Geneva, sans-serif" color="#fff" size="-1">&nbsp;&nbsp;*Sólo D.F. Mínimo de compra $599.00 pesos mx. Aplican restricciones.</font>
        </td>
    </tr>
</table>
<table width="600" cellpadding="4" cellspacing="0">
    <tr bgcolor="#1460ab">
        <td colspan="3"><font face="Verdana, Geneva, sans-serif" color="#FFFFFF" size="-1">Atención: Lun a Vie de 9am a 6pm</font></td>
        <td colspan="3" align="right"><font face="Verdana, Geneva, sans-serif" color="#FFFFFF" size="-1">Síguenos:</font> <a href="https://www.facebook.com/mexicugacom-1540218352858489/?ref=hl" target="_blank"><font face="Verdana, Geneva, sans-serif" color="#FFFFFF" size="+1"><strong>facebook</strong></font></a>&nbsp;&nbsp;<a href="https://twitter.com/mexicuga" target="_blank"><font face="Verdana, Geneva, sans-serif" color="#FFFFFF" size="+1"><strong>twitter</strong></font></a></td>
    </tr>
    <tr bgcolor="#efefef">
        <td colspan="6" align="center"><font face="Verdana, Geneva, sans-serif" color="#666" size="-2"><strong>Grupo Mexicuga S.A. de C.V. © 2016 V. 3.0 Todos los derechos reservados.</strong><br />Revisa nuestras políticas de privacidad en:</font> <a href="https:www.mexicuga.com/terminos-condiciones-uso#politicas_privacidad" target="_blank"><font face="Verdana, Geneva, sans-serif" color="#666" size="-2">www.mexicuga.com/terminos-condiciones-uso#politicas_privacidad</font></a></td>
    </tr>
</table>
</body>
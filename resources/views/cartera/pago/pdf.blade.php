<!DOCTYPE html>
<html><body>
        <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>Cliente</td>
                <td>Factura</td>
                <td>Valor pagado</td>
                <td>Valor a pagar</td>
                <td>Plazo crédito</td>
                <td>Estado</td>

                <!--<td colspan="2"></td>-->
            </tr>
        </thead>
        <tbody>
        @foreach($paz as $pac)
            <tr>
              <td>Nombre usuario</td>
              <td>{{ $pac->hora }}</td>


                  
                  



            </tr>
        @endforeach
        </tbody>
    </table>
  </body>
</html>
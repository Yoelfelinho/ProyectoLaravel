<div class="mb-3">
    <label>N° Factura</label>
    <input type="text" name="Nnm_factura" class="form-control" value="{{ $factura->Nnm_factura ?? '' }}" required>
</div>

<div class="mb-3">
    <label>Cliente</label>
    <select name="cod_cliente" class="form-control" required>
        @foreach($clientes as $cli)
            <option value="{{ $cli->Documento }}" 
                @if(isset($factura) && $factura->cod_cliente == $cli->Documento) selected @endif>
                {{ $cli->Nombres }} {{ $cli->Apellidos }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Empleado</label>
    <input type="text" name="Nombre_empleado" class="form-control" value="{{ $factura->Nombre_empleado ?? '' }}" required>
</div>

<div class="mb-3">
    <label>Fecha Facturación</label>
    <input type="text" name="Fecha_facturacion" class="form-control" value="{{ $factura->Fecha_facturacion ?? '' }}" required>
</div>

<div class="mb-3">
    <label>Forma de Pago</label>
    <select name="id_formapago" class="form-control" required>
        @foreach($formas as $fp)
            <option value="{{ $fp->id_formapago }}" 
                @if(isset($factura) && $factura->id_formapago == $fp->id_formapago) selected @endif>
                {{ $fp->Descripcion_formapago }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>IVA</label>
    <input type="number" step="0.01" name="iva" class="form-control" value="{{ $factura->iva ?? '' }}" required>
</div>

<div class="mb-3">
    <label>Total Factura</label>
    <input type="number" step="0.01" name="total_factura" class="form-control" value="{{ $factura->total_factura ?? '' }}" required>
</div>

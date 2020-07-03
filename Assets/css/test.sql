create view vista_cliente as
    SELECT id_Ventas, C.id_Cliente, Fecha_Alta, C.Nombre
    FROM cliente_tb C JOIN empleados_tb E ON C.Id_Cliente = E.Id_Cliente
    WHERE E.Nombre = "GABRIEL MAURICIO NIETO BUSTOS"

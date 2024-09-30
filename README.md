Proyecto:  Tienda ECOMMERCE.

Nombre participante: Carlos Adrián Alderete

Este proyecto consiste en una tienda online desarrollada en PHP/Laravel, que permite a los administradores gestionar productos mediante un CRUD, incluyendo la adición, eliminación y modificación de productos, así como la administración de categorías. Los usuarios pueden agregar productos al carrito, obtener facturas descargables y recibirlas por correo electrónico. Se ha integrado el método de pago MercadoPago y se implementó una sección de búsqueda y filtrado de productos utilizando Livewire. Los usuarios pueden registrarse y acceder mediante un inicio de sesión tradicional o a través de GitHub.

## TARJETAS PARA PROBAR

### MÉTODOS PAGO MERCADOPAGO (ARG)

Saldo: **$50.000**

| Tipo de Tarjeta      | Número de Tarjeta      | CVV  | Exp   |
|---------------------|-----------------------|------|-------|
| Mastercard          | 5031 7557 3453 0604   | 123  | 11/25 |
| Visa                | 4509 9535 6623 3704   | 123  | 11/25 |
| American Express     | 3711 8030 3257 522    | 1234 | 11/25 |

---

## ESTADOS

| Estado | Descripción                              |
|--------|------------------------------------------|
| APRO   | Pago aprobado                            |
|        | DNI: 12345678                           |
| OTHE   | Rechazado por error general              |
|        | DNI: 12345678                           |
| CONT   | Pendiente de pago                        |
|        | -                                        |
| CALL   | Rechazado con validación para autorizar  |
|        | -                                        |
| FUND   | Rechazado por importe insuficiente      |
|        | -                                        |

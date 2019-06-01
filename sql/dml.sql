-- tipo_contrato --
INSERT INTO public.tipo_contrato(
id,
nombre,
descripcion,
abreviacion,
orden,
activo
)
VALUES (
'1',
'Obra o Labor',
null,
'OL',
null,
true
);

INSERT INTO public.tipo_contrato(
id,
nombre,
descripcion,
abreviacion,
orden,
activo
)
VALUES (
'2',
'Indefinido',
null,
'I',
null,
true
);

INSERT INTO public.tipo_contrato(
id,
nombre,
descripcion,
abreviacion,
orden,
activo
)
VALUES (
'3',
'Fijo',
null,
'F',
null,
true
);

INSERT INTO public.tipo_contrato(
id,
nombre,
descripcion,
abreviacion,
orden,
activo
)
VALUES (
'4',
'De servicio',
null,
'S',
null,
true
);

INSERT INTO public.tipo_contrato(
id,
nombre,
descripcion,
abreviacion,
orden,
activo
)
VALUES (
'5',
'Pasante',
null,
'P',
null,
true
);

INSERT INTO public.tipo_contrato(
id,
nombre,
descripcion,
abreviacion,
orden,
activo
)
VALUES (
'6',
'Aprendizaje',
null,
'A',
null,
true
);

SELECT pg_get_serial_sequence('public.tipo_contrato', 'id');
SELECT currval(pg_get_serial_sequence('public.tipo_contrato', 'id'));
ALTER SEQUENCE tipo_contrato_id_seq RESTART WITH 7;
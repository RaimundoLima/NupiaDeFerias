CREATE TABLE public.acao
(
  id integer serial,
  ideixo integer NOT NULL,
  idprojeto integer NOT NULL,
  idresumo integer NOT NULL,
  titulo character varying(100),
  palavrachave character varying(100),
  datainicio date,
  datatermino date,
  previnicio date,
  prevtermino date,
  edital oid,
  cronograma oid,
  situacao boolean,
  tema character varying(100),

  CONSTRAINT acao_pkey PRIMARY KEY (id),
  CONSTRAINT acao_ideixo_fkey FOREIGN KEY (ideixo)
      REFERENCES public.eixo (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT acao_idprojeto_fkey FOREIGN KEY (idprojeto)
      REFERENCES public.projeto (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT idresumo FOREIGN KEY (idresumo)
      REFERENCES public.resumo (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)

CREATE TABLE public.eixo
(
  id serial,
  nome character varying(100),
  descricao character varying(1000),
  CONSTRAINT eixo_pkey PRIMARY KEY (id)
);

CREATE TABLE public.projeto
(
  id serial,
  nome character varying(100),
  descricao character varying(1000),
  link text,
  CONSTRAINT projeto_pkey PRIMARY KEY (id)
);

CREATE TABLE public.ator
(
  id serial,
  idinstituicao integer,
  nome character varying(100),
  tipo character varying(100),
  senha character varying(100),
  email character varying(100),
  codigo character varying(100),
  CONSTRAINT ator_pkey PRIMARY KEY (id)
);

CREATE TABLE public.resumo
(
  id serial,
  titulo character varying(100),
  justificativa character varying(10000),
  objetivo character varying(10000),
  metodologia character varying(10000),
  resultadoesperado character varying(10000),
  impactoesperado character varying(10000),
  idator integer,
  CONSTRAINT resumo_pkey PRIMARY KEY (id),
  CONSTRAINT idator FOREIGN KEY (idator)
      REFERENCES public.ator (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE public.acao
(
  id serial,
  ideixo integer NOT NULL,
  idprojeto integer NOT NULL,
  idresumo integer,
  titulo character varying(100),
  palavrachave character varying(100),
  datainicio date,
  datatermino date,
  previnicio date,
  prevtermino date,
  edital oid,
  cronograma oid,
  situacao boolean,
  tema text,

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
);

CREATE TABLE public.acaoator
(
  id serial,
  idator integer not null,
  idacao integer NOT NULL,
  CONSTRAINT acaoator_pkey PRIMARY KEY (id),
  CONSTRAINT acaoator_idator_fkey FOREIGN KEY (idator)
      REFERENCES public.ator (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT idacao FOREIGN KEY (idacao)
      REFERENCES public.acao (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE public.acaovinculada
(
  id serial,
  idacao1 integer not null,
  idacao2 integer not null,
  CONSTRAINT acaovinculada_pkey PRIMARY KEY (id),
  CONSTRAINT acaovinculada_idacao1_fkey FOREIGN KEY (idacao1)
      REFERENCES public.acao (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT acaovinculada_idacao2_fkey FOREIGN KEY (idacao2)
      REFERENCES public.acao (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE public.arquivo
(
  id serial,
  idacao integer not null,
  documento oid,
  diretorio text,
  nome character varying(100),
  tipo text,
  CONSTRAINT arquivo_pkey PRIMARY KEY (id),
  CONSTRAINT arquivo_idacao_fkey FOREIGN KEY (idacao)
      REFERENCES public.acao (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE public.artigoexterno
(
  id serial,
  idacao integer not null,
  link text,
  CONSTRAINT artigoexterno_pkey PRIMARY KEY (id),
  CONSTRAINT artigoexterno_idacao_fkey FOREIGN KEY (idacao)
      REFERENCES public.acao (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);

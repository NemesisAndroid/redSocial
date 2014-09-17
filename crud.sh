#!/bin/bash
#ejecutar crud en while
ENTITIES=('DataExtra' 'Debate' 'Estudio' 'GeneroExtra' 'NivelEstudio' 'RespuestasComentario' 'RespuestasDebate' 'TipoComentario' 'TipoTema')
for i in $ENTITIES; do
  php app/console gen:doc:crud --entity='"FusionGrupRedBundle:'$i'"'
done

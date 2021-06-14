const getters = {
  catalogoId: (state) => {
    if (!state.catalogo.id) {
      return 0
    }

    return state.catalogo.id
  },
  catalogoTitulo: (state) => {
    if (!state.catalogo.titulo) {
      return 'DLirio'
    }

    return 'DLirio - '+state.catalogo.titulo
  },
  catalogoPdf: (state) => {
    if (!state.catalogo.pdf) {
      return ''
    }

    return state.catalogo.pdf
  },
  nroPagina: (state) => {
    if (!state.nroPagina) {
      return 0
    }

    return state.nroPagina
  },
  paginas: (state) => {
    if (!state.paginas) {
      return []
    }

    return state.paginas
  },
  paginasEnDos: (state) => {
    let paginas = []

    if (!state.paginas) {
      return paginas
    }
    let nro_paginas = 0
    if (state.paginas.length % 2 == 0) {
      nro_paginas = state.paginas.length / 2 + 1
    } else {
      nro_paginas = (state.paginas.length + 1) / 2
    }
    for (let i = 0; i < nro_paginas; i++) {
      paginas.push({
        id: i + 1,
        catalogo_id: 0,
        nro_pagina_1: 0,
        imagen_1: '',
        nro_pagina_2: 0,
        imagen_2: ''
      })
    }
    state.paginas.forEach(element => {
      let pos = 0
      if (element.nro_pagina % 2 == 0) {
        pos = element.nro_pagina / 2
        paginas[pos].catalogo_id = element.catalogo_id
        paginas[pos].nro_pagina_1 = element.nro_pagina
        paginas[pos].imagen_1 = element.imagen_small
      } else {
        pos = (element.nro_pagina - 1) / 2
        paginas[pos].catalogo_id = element.catalogo_id
        paginas[pos].nro_pagina_2 = element.nro_pagina
        paginas[pos].imagen_2 = element.imagen_small
      }
    });

    return paginas
  }
}

export default getters

const mutations = {
  catalogoUpdate (state, payload) {
    state.catalogo.id = payload.id
    state.catalogo.titulo = payload.titulo
    state.catalogo.pdf = payload.pdf
  },
  catalogoClear (state) {
    state.catalogo.id = 0
    state.catalogo.titulo = ''
    state.catalogo.pdf = ''
  },
  paginasClear (state) {
    state.paginas = []
  },
  paginasAddItem (state, payload) {
    state.paginas.push(payload)
  },
  paginasAddArray (state, payload) {
    payload.forEach(element => {
      state.paginas.push(element)
    });
  }
}

export default mutations

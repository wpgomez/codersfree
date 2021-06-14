export default class PaginaProxy {
  constructor (axios, url) {
    this.axios = axios
    this.url = url
  }

  getAll (catalogoId) {
    return this.axios.get(this.url + `paginas.php?catalogo_id=${catalogoId}`)
  }

  getAllPorRef (ref) {
    return this.axios.get(this.url + `paginas.php?ref=${ref}`)
  }

  getAllPorCatalogoRef (catalogoId, ref) {
    return this.axios.get(this.url + `paginas.php?catalogo_id=${catalogoId}&ref=${ref}`)
  }

  get (id) {
    return this.axios.get(this.url + `paginas.php?id=${id}`)
  }
}

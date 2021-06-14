export default class CatalogoProxy {
  constructor (axios, url) {
    this.axios = axios
    this.url = url
  }

  getAll () {
    return this.axios.get(this.url + 'catalogos.php')
  }

  get (id) {
    return this.axios.get(this.url + `catalogos.php?id=${id}`)
  }
}

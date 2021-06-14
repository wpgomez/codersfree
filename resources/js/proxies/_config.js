import Axios from 'axios'
import CatalogoProxy from './CatalogoProxy'
import PaginaProxy from './PaginaProxy'

// Axios default behavior
Axios.defaults.headers.common.Accept = 'application/json'

// let url = 'http://localhost/php-catalogo/'
let url = 'https://api.catalogo.dlirio.pe/'

export default {
  url: 'https://catalogo.dlirio.pe/',
  catalogoProxy: new CatalogoProxy(Axios, url),
  paginaProxy: new PaginaProxy(Axios, url)
}

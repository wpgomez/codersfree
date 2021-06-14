<template>
  <v-app id="inspire">
    <v-navigation-drawer v-model="drawer" app>
      <v-list-item class="px-2 red darken-1">
        <v-list-item-title class="white--text">D´Lirio</v-list-item-title>
        <v-btn icon dark
          @click.stop="setClickNavigationDrawer">
          <v-icon>mdi-chevron-left</v-icon>
        </v-btn>
      </v-list-item>
      <v-divider></v-divider>
      <v-list dense>
        <v-list-item link @click="setDescagarCatalogo">
          <v-list-item-icon>
            <v-icon>mdi-cloud-download-outline</v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>Descargar Catálogo</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <!-- <v-list-item link>
          <v-list-item-icon>
            <v-icon>mdi-heart</v-icon>
          </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title>Favoritos</v-list-item-title>
          </v-list-item-content>
        </v-list-item> -->
      </v-list>
      <v-divider></v-divider>
      <v-list dense>
        <router-link class="text-decoration-none"
          :to="{ path: '/' }">
          <v-list-item link>
            <v-list-item-icon>
              <v-icon>mdi-book-open-variant</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title>Catálogos</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </router-link>
        <v-list-item>
          <v-list-item-content class="py-2 px-0">
            <v-container class="py-1 px-3">
              <v-row>
                <v-col class="pa-1"
                  v-for="card in catalogos" :key="card.id"
                  cols="6">
                  <router-link class="text-decoration-none"
                    :to="{ path: `/catalogo/${card.id}` }">
                    <v-card>
                      <v-img
                        :src="card.imagen"
                        class="white--text align-end"
                        aspect-ratio="0.8">
                      </v-img>
                      <v-card-title class="pa-2 caption"
                        :class="{ 'font-weight-bold' : getExisteCatalogoId(card.id)}"
                        v-text="card.titulo">
                      </v-card-title>
                    </v-card>
                  </router-link>
                </v-col>
              </v-row>
            </v-container>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar app dark
      color="red darken-1" dense>
      <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>

      <v-toolbar-title class="pl-0">{{ catalogoTitulo }}</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-dialog
        v-model="isDialogBuscar"
        transition="dialog-bottom-transition"
        scrollable hide-overlay
        max-width="760px">
        <template v-slot:activator="{ on, attrs }">
          <v-btn icon
            v-bind="attrs" v-on="on"
            @click="setClickBuscar">
            <v-icon>mdi-magnify</v-icon>
          </v-btn>
        </template>
        <v-card>
          <v-toolbar dark height="45"
            class="py-1"
            color="red darken-1">
            <v-btn icon
              @click="isDialogBuscar = false">
              <v-icon>mdi-close</v-icon>
            </v-btn>
            <v-divider></v-divider>
            <v-text-field v-model="textBuscar" dense
              height="35"
              placeholder="Buscar" autofocus>
            </v-text-field>
            <v-divider></v-divider>
            <v-btn icon @click="setClickBuscarPaginas">
              <v-icon>mdi-magnify</v-icon>
            </v-btn>
          </v-toolbar>
          <v-divider></v-divider>
          <v-card-text class="pa-1" style="height: 640px;">
            <v-container>
              <div class="d-flex align-center justify-center" v-if="isLoadingBuscar"
                style="height: 600px;">
                <v-progress-circular
                  indeterminate
                  color="red"
                ></v-progress-circular>
              </div>
              <v-row v-if="!isLoadingBuscar">
                <v-col class="pa-1"
                  v-for="card in paginasBuscar" :key="card.id"
                  cols="6" sm="3">
                  <router-link v-if="card.nro_pagina" class="text-decoration-none"
                    :to="{ path: `/catalogo/${card.catalogo_id}/${card.nro_pagina}` }"
                    @click.native="isDialogBuscar = false">
                    <v-card tile>
                      <v-img
                        :src="card.imagen"
                        class="white--text align-end"
                        aspect-ratio="0.8">
                      </v-img>
                      <p class="ma-0 pa-2 text-center caption">{{card.nro_pagina}}</p>
                    </v-card>
                  </router-link>
                </v-col>
              </v-row>
            </v-container>
          </v-card-text>
        </v-card>
      </v-dialog>
    </v-app-bar>

    <!-- <v-main> -->
    <router-view></router-view>
    <!-- </v-main> -->

    <v-bottom-navigation app v-model="value"
      color="red darken-1">
      <v-dialog
        v-model="isDialogPaginas"
        transition="dialog-bottom-transition"
        scrollable hide-overlay
        max-width="760px">
        <template v-slot:activator="{ on, attrs }">
          <v-btn small value="pages"
            v-bind="attrs" v-on="on"
            @click="setClickPaginas">
            <span>Páginas</span>
            <v-icon>mdi-view-module</v-icon>
          </v-btn>
        </template>
        <v-card>
          <v-toolbar dark height="40"
            color="red darken-1">
            <v-btn icon dark
              @click="isDialogPaginas = false">
              <v-icon>mdi-close</v-icon>
            </v-btn>
            <v-toolbar-title>Páginas</v-toolbar-title>
          </v-toolbar>
          <v-divider></v-divider>
          <v-card-text class="px-2 py-4" style="height: 640px;">
            <v-container class="py-1 px-3">
              <v-row>
                <v-col class="py-3 px-4"
                  v-for="card in paginasEnDos" :key="card.id"
                  cols="12" sm="6">
                  <v-row>
                    <v-col cols="6" class="py-1 px-0">
                      <router-link v-if="card.nro_pagina_1" class="text-decoration-none"
                        :to="{ path: `/catalogo/${card.catalogo_id}/${card.nro_pagina_1}` }"
                        @click.native="isDialogPaginas = false">
                        <v-card tile>
                          <v-img
                            :src="card.imagen_1"
                            class="white--text align-end"
                            aspect-ratio="0.8">
                          </v-img>
                          <p class="pa-2 text-center caption">{{card.nro_pagina_1}}</p>
                        </v-card>
                      </router-link>
                    </v-col>
                    <v-col cols="6" class="py-1 px-0">
                      <router-link v-if="card.nro_pagina_2" class="text-decoration-none"
                        :to="{ path: `/catalogo/${card.catalogo_id}/${card.nro_pagina_2}` }"
                        @click.native="isDialogPaginas = false">
                        <v-card tile>
                          <v-img
                            :src="card.imagen_2"
                            class="white--text align-end"
                            aspect-ratio="0.8">
                          </v-img>
                          <p class="pa-2 text-center caption">{{card.nro_pagina_2}}</p>
                        </v-card>
                      </router-link>
                    </v-col>
                  </v-row>
                </v-col>
              </v-row>
            </v-container>
          </v-card-text>
        </v-card>
      </v-dialog>
      <v-dialog
        v-model="isDialogDescargar"
        persistent
        max-width="290">
        <template v-slot:activator="{ on, attrs }">
          <v-btn small value="download"
            v-bind="attrs" v-on="on"
            @click="setDescagarCatalogo">
            <span>Descargar</span>
            <v-icon>mdi-cloud-download-outline</v-icon>
          </v-btn>
        </template>
        <v-card>
          <v-card-title class="subtitle-1">
            ¿Desea descargar el Catálogo?
          </v-card-title>
          <v-card-text>{{ catalogoTitulo }}</v-card-text>
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="green darken-1" text
              @click="isDialogDescargar = false">
              Cancelar
            </v-btn>
            <a class="text-decoration-none text-button green--text text--darken-1"
              v-if="catalogoId"
              :href="getUrlPdf" download @click="isDialogDescargar = false">
              ACEPTAR
            </a>
          </v-card-actions>
        </v-card>
      </v-dialog>
      <v-dialog
        v-model="isDialogCatalogos"
        transition="dialog-bottom-transition"
        scrollable hide-overlay
        max-width="760px">
        <template v-slot:activator="{ on, attrs }">
          <v-btn small value="catalogs"
            v-bind="attrs"
            v-on="on" @click="setClickCatalogos">
            <span>Catálogos</span>
            <v-icon>mdi-book-open-variant</v-icon>
          </v-btn>
        </template>
        <v-card>
          <v-toolbar dark height="40"
            color="red darken-1">
            <v-btn icon dark
              @click="isDialogCatalogos = false">
              <v-icon>mdi-close</v-icon>
            </v-btn>
            <v-toolbar-title>Catálogos</v-toolbar-title>
          </v-toolbar>
          <v-divider></v-divider>
          <v-card-text class="px-2 py-4" style="height: 640px;">
            <v-container class="py-1 px-3">
              <v-row>
                <v-col class="pa-1"
                  v-for="card in catalogos" :key="card.id"
                  cols="6" sm="3">
                  <router-link class="text-decoration-none"
                    :to="{ path: `/catalogo/${card.id}` }"
                    @click.native="isDialogCatalogos = false">
                    <v-card>
                      <v-img
                        :src="card.imagen"
                        class="white--text align-end"
                        aspect-ratio="0.8">
                      </v-img>
                      <v-card-title class="pa-2 caption"
                        :class="{ 'font-weight-bold' : getExisteCatalogoId(card.id)}"
                        v-text="card.titulo">
                      </v-card-title>
                    </v-card>
                  </router-link>
                </v-col>
              </v-row>
            </v-container>
          </v-card-text>
        </v-card>
      </v-dialog>
      <!-- <v-btn small value="favorites">
        <span>Favoritos</span>
        <v-icon>mdi-heart</v-icon>
      </v-btn> -->
      <v-dialog
        v-model="isDialogShare"
        transition="dialog-bottom-transition"
        scrollable hide-overlay
        max-width="380px">
        <template v-slot:activator="{ on, attrs }">
          <v-btn small value="share"
            v-bind="attrs"
            v-on="on" @click="setClickShare">
            <span>Compartir</span>
            <v-icon>mdi-share-variant</v-icon>
          </v-btn>
        </template>
        <v-card>
          <v-toolbar dark height="40"
            color="red darken-1">
            <v-btn icon dark
              @click="isDialogShare = false">
              <v-icon>mdi-close</v-icon>
            </v-btn>
            <v-toolbar-title>Compartir la Página</v-toolbar-title>
          </v-toolbar>
          <v-divider></v-divider>
          <v-card-text class="px-1 py-3" style="height: 80px;">
            <v-container class="py-0 px-0">
              <v-row justify="center" class="ma-0">
                <v-col cols="4">
                  <v-row justify="center">
                    <facebook :url="getUrl" scale="3"></facebook>
                  </v-row>
                </v-col>
                <v-col cols="4">
                  <v-row justify="center">
                    <twitter :url="getUrl" :title="catalogoTitulo" scale="3"></twitter>
                  </v-row>
                </v-col>
                <v-col cols="4">
                  <v-row justify="center">
                    <pinterest :url="getUrl" scale="3"></pinterest>
                  </v-row>
                </v-col>
              </v-row>
            </v-container>
          </v-card-text>
        </v-card>
      </v-dialog>
    </v-bottom-navigation>
  </v-app>
</template>

<script>
import { mapGetters, mapMutations } from 'vuex'
import {
  Facebook,
  Twitter,
  Linkedin,
  Pinterest,
  Reddit,
  Telegram,
  WhatsApp,
  Email,
  Google
} from "vue-socialmedia-share"
import proxyConfig from './proxies/_config'

export default {
  name: 'App',
  components: {
    Facebook,
    Twitter,
    Linkedin,
    Pinterest,
    Reddit,
    Telegram,
    WhatsApp,
    Email,
    Google
  },
  data: () => ({
    drawer: false,
    value: 'pages',
    catalogos: [],
    isDialogCatalogos: false,
    isDialogPaginas: false,
    isDialogShare: false,
    isDialogDescargar: false,
    isDialogBuscar: false,
    textBuscar: '',
    paginasBuscar: [],
    isLoadingCatalogo: false,
    isLoadingBuscar: false
  }),
  mounted () {
    const self = this
    self.setLoadAsyncData()
  },
  computed: {
    ...mapGetters([
      'catalogoId',
      'catalogoTitulo',
      'catalogoPdf',
      'paginas',
      'paginasEnDos',
      'nroPagina'
    ]),
    getUrl () {
      const self = this
      let url= proxyConfig.url
      if (self.catalogoId) {
        url = url + `#/catalogo/${self.catalogoId}`
        if (self.nroPagina) {
          url = url + `/${self.nroPagina}`
        }
      }
      return url
    },
    getUrlPdf () {
      const self = this
      return self.catalogoPdf
    }
  },
  methods: {
    ...mapMutations([
      'catalogoUpdate',
      'catalogoClear'
    ]),
    setLoadAsyncData () {
      const self = this

      self.isLoadingCatalogo = true
      self.catalogos = []
      self.$proxies.catalogoProxy
        .getAll()
        .then(x => {
          // setTimeout(() => { self.grilla.isLoading = false }, 1000)
          self.isLoadingCatalogo = false
          if (x.data && x.data.items) {
            self.catalogos = x.data.items
          } else {
            console.log(x.data.mensaje)
          }
        })
        .catch(x => {
          self.isLoadingCatalogo = false
          console.log(x.data.mensaje)
        })
    },
    setLoadAsyncDataBuscar (ref) {
      const self = this

      self.isLoadingBuscar = true
      self.paginasBuscar = []
      self.$proxies.paginaProxy
        .getAllPorRef(ref)
        .then(x => {
          // setTimeout(() => { self.grilla.isLoading = false }, 1000)
          self.isLoadingBuscar = false
          if (x.data && x.data.items) {
            self.paginasBuscar = x.data.items
          } else {
            console.log(x.data.mensaje)
          }
        })
        .catch(x => {
          self.isLoadingBuscar = false
          console.log(x.data.mensaje)
        })
    },
    setLoadAsyncDataBuscarCatalogo (catalogoId, ref) {
      const self = this

      self.isLoadingBuscar = true
      self.paginasBuscar = []
      self.$proxies.paginaProxy
        .getAllPorCatalogoRef(catalogoId, ref)
        .then(x => {
          // setTimeout(() => { self.grilla.isLoading = false }, 1000)
          self.isLoadingBuscar = false
          if (x.data && x.data.items) {
            self.paginasBuscar = x.data.items
          } else {
            console.log(x.data.mensaje)
          }
        })
        .catch(x => {
          self.isLoadingBuscar = false
          console.log(x.data.mensaje)
        })
    },
    setClickNavigationDrawer () {
      const self = this
      self.drawer = !self.drawer
    },
    setVerCatalogo (id) {
      const self = this
      self.$router.push(`/catalogo/${id}`)
    },
    setClickCatalogos () {
      const self = this
      self.isDialogPaginas = false
      self.isDialogShare = false
      self.isDialogDescargar = false
      self.isDialogBuscar = false
    },
    setClickPaginas () {
      const self = this
      self.isDialogCatalogos = false
      self.isDialogShare = false
      self.isDialogDescargar = false
      self.isDialogBuscar = false
    },
    setClickShare () {
      const self = this
      self.isDialogCatalogos = false
      self.isDialogPaginas = false
      self.isDialogDescargar = false
      self.isDialogBuscar = false
    },
    setClickBuscar () {
      const self = this
      self.isDialogCatalogos = false
      self.isDialogShare = false
      self.isDialogDescargar = false
      self.isDialogPaginas = false
      self.textBuscar = ''
      self.paginasBuscar = []
    },
    setDescagarCatalogo () {
      const self = this
      self.isDialogCatalogos = false
      self.isDialogPaginas = false
      self.isDialogShare = false
      self.isDialogBuscar = false
      self.isDialogDescargar = true
    },
    setClickBuscarPaginas () {
      const self = this
      if (self.textBuscar) {
        if (self.catalogoId) {
          self.setLoadAsyncDataBuscarCatalogo(self.catalogoId, self.textBuscar)
        } else {
          self.setLoadAsyncDataBuscar(self.textBuscar)
        }
      }
    },
    getExisteCatalogoId (id) {
      const self = this
      let value = false
      if (id == self.catalogoId) {
        value = true
      }
      return value
    }
  }
};
</script>

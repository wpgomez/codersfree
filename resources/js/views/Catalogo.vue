<template>
  <v-main id="app-main"
    :class="{ 'has-mouse': hasMouse }"
    @touchstart="hasMouse = false">
    <div v-if="isLoading" class="loading">
      <v-progress-circular
        indeterminate
        color="primary"
      ></v-progress-circular>
    </div>
    <Flipbook v-if="!isLoading"
      class="flipbook"
      :pages="pages"
      ref="flipbook"
      :zooms="zooms"
      :startPage="startPage"
      @flip-left-start="onFlipLeftStart"
      @flip-left-end="onFlipLeftEnd"
      @flip-right-start="onFlipRightStart"
      @flip-right-end="onFlipRightEnd"
    >
    </Flipbook>
  </v-main>
</template>

<script>
import Flipbook from '../components/Flipbook2'
import { mapGetters, mapMutations } from 'vuex'

export default {
  name: 'Catalogo',
  components: { Flipbook },
  data: () => ({
    isLoading: false,
    paginas: [],
    pages: [],
    zooms: [1],
    startPage: 1,
    displayedPages: 1,
    hasMouse: true,
    nroRefs: {
      start: 1,
      end: 1
    }
  }),
  mounted () {
    const self = this
    window.addEventListener("keydown",  function(ev)
    {
      const flipbook = self.$refs.flipbook
      if (!flipbook) {
        return;
      }
      if (ev.keyCode === 37 && flipbook.canFlipLeft) {
        return flipbook.flipLeft()
      }
      if (ev.keyCode === 39 && flipbook.canFlipRight) {
        return flipbook.flipRight()
      }
    })
    self.setLoadAsyncData()
  },
  computed: {
    ...mapGetters([
      'catalogoId',
      'catalogoTitulo',
      'nroPagina'
    ])
  },
  watch: {
    '$route': 'setLoadAsyncData'
  },
  methods: {
    ...mapMutations([
      'catalogoUpdate',
      'paginasAddArray',
      'paginasClear'
    ]),
    setLoadAsyncData () {
      const self = this
      const catalogoId = parseInt(self.$route.params.id)
      const nroPagina = parseInt(self.$route.params.pagina)
      const flipbook = self.$refs.flipbook

      if (flipbook && flipbook.displayedPages) {
        self.displayedPages = flipbook.displayedPages
      }
      if (!(catalogoId == self.catalogoId)) {
        if (!nroPagina) {
          self.startPage = 1
        } else {
          if (!(nroPagina == self.nroPagina)) {
            if (self.displayedPages > 1) {
              if (nroPagina % 2 == 0) {
                self.startPage = nroPagina
              } else {
                self.startPage = nroPagina - 1
              }
            } else {
              self.startPage = nroPagina
            }
          }
        }
        self.isLoading = true
        self.paginas = []
        self.nroRefs.start = 1
        self.nroRefs.end = 1
        self.$proxies.paginaProxy
          .getAll(catalogoId)
          .then(x => {
            // setTimeout(() => { self.grilla.isLoading = false }, 1000)
            self.isLoading = false
            if (x.data && x.data.catalogoId) {
              self.catalogoUpdate({ 
                id: x.data.catalogoId, 
                titulo: x.data.catalogoTitulo,
                pdf: x.data.catalogoPdf
              })
            }
            if (x.data && x.data.items) {
              self.paginas = x.data.items
              self.paginasClear()
              self.paginasAddArray(self.paginas)
              self.setLoadPages()
            } else {
              console.log(x.data.mensaje)
            }
          })
          .catch(x => {
            self.isLoading = false
            console.log(x.data.mensaje)
          })
      } else {
        if (!nroPagina) {
          self.startPage = 1
        } else {
          if (!(nroPagina == self.nroPagina)) {
            if (self.displayedPages > 1) {
              if (nroPagina % 2 == 0) {
                self.startPage = nroPagina
              } else {
                self.startPage = nroPagina - 1
              }
            } else {
              self.startPage = nroPagina
            }
          }
        }
      }
    },
    setLoadPages () {
      const self = this
      self.pages = []
      if (self.paginas.length > 0) {
        self.pages.push(null)
        self.paginas.forEach(element => {
          self.pages.push(element.imagen)
        })
      }
    },
    onFlipLeftStart (page) {
      const self = this
      self.nroRefs.start = page.page
    },
    onFlipLeftEnd (page) {
      const self = this
      self.nroRefs.end = page.page
      self.displayedPages = page.displayedPages
    },
    onFlipRightStart (page) {
      const self = this
      self.nroRefs.start = page.page
    },
    onFlipRightEnd (page) {
      const self = this
      self.nroRefs.end = page.page
      self.displayedPages = page.displayedPages
    }
  }
}
</script>

<style>
#app-main {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  background-color: #FFFFFF;
  color: #ccc;
  overflow: hidden;
}
.flipbook .viewport {
  width: 100vw;
  height: calc(100vh - 48px - 56px);
}
.flipbook .bounding-box {
  box-shadow: 0 0 20px #000;
}
.loading {
  position: absolute;
  height: 100%;
  top: 50%;
  user-select: none;
}
</style>

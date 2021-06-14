<template>
  <v-main :class="{ 'app-main': isLoading }">
    <div v-if="isLoading" class="loading">
      <v-progress-circular
        indeterminate
        color="primary"
      ></v-progress-circular>
    </div>
    <v-container fluid v-if="!isLoading">
      <v-row class="pa-1">
        <v-col class="pa-1"
          v-for="card in cards" :key="card.id"
          cols="6" sm="4" md="3">
          <v-card class="pt-5 pb-3">
            <v-img
              :src="card.imagen"
              class="white--text align-end"
              aspect-ratio="0.9" contain>
            </v-img>

            <v-card-title class="py-2 px-4 caption font-weight-bold"
              v-text="card.titulo">
            </v-card-title>
            <v-card-subtitle v-if="card.subtitulo" v-text="card.subtitulo"></v-card-subtitle>

            <v-card-text v-if="card.contenido">
              <div class="text--primary">
                {{ card.contenido }}
              </div>
            </v-card-text>

            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn block color="red darken-1 white--text" 
                @click="setVerCatalogo(card.id)">
                Ver Catalogo
              </v-btn>
              <v-spacer></v-spacer>
            </v-card-actions>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </v-main>
</template>

<script>
import { mapMutations } from 'vuex'

export default {
  name: 'Home',
  data: () => ({
    isLoading: false,
    cards: [],
  }),
  mounted () {
    const self = this
    self.setLoadAsyncData()
    self.catalogoClear()
    self.paginasClear()
  },
  methods: {
    ...mapMutations([
      'catalogoClear',
      'paginasClear'
    ]),
    setLoadAsyncData () {
      const self = this

      self.isLoading = true
      self.$proxies.catalogoProxy
        .getAll()
        .then(x => {
          // setTimeout(() => { self.grilla.isLoading = false }, 1000)
          self.isLoading = false
          if (x.data && x.data.items) {
            self.cards = x.data.items
          } else {
            console.log(x.data.mensaje)
          }
        })
        .catch(x => {
          self.isLoading = false
          console.log(x.data.mensaje)
        })
    },
    setVerCatalogo (id) {
      const self = this
      self.$router.push(`/catalogo/${id}`)
    }
  },
}
</script>

<style>
.app-main {
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
.loading {
  position: absolute;
  height: 100%;
  top: 50%;
  user-select: none;
}
</style>
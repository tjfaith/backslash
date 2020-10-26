<template>
  <div id="q-app">
     <q-pull-to-refresh @refresh="refresh">
    <router-view />
     </q-pull-to-refresh>
  </div>
</template>
<script>
export default {
  name: 'App',
  methods: {
    refresh (done) {
      setTimeout(() => {
        // this.items.push({}, {}, {}, {}, {}, {}, {})
        done()
      }, 1000)
    }
  }
}
</script>

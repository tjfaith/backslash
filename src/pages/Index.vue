<template>
  <div>
    <div>
      <q-tabs
        v-model="tab"
        narrow-indicator
        class="bg-primary text-white"
      >
        <q-tab name="mails">
          <div class="col self-center">
                <q-icon name="subtitles" class="iconTab bg-white text-negative" size="2.3em"/>
           </div>
            <small>TIMELINES</small>
        </q-tab>
        <q-tab name="alarms">
            <div class="col self-center">
           <q-icon name="description" class="iconTab bg-white text-negative" size="2.3em"/>
          </div>
             <small>MY<br>QUESTIONS</small>
        </q-tab>
        <q-tab  name="movies">
          <div class="col self-center">
           <q-icon name="account_balance_wallet" class="iconTab bg-white text-negative" size="2.3em"/>
           </div>
          <small>MANAGE <br> COURSES</small></q-tab>
        <q-tab  name="movies">
          <div class="col self-center">
          <q-icon name="cloud_download" class="iconTab bg-white text-negative" size="2.3em"/>
          </div>
          <small>RESOURCES</small></q-tab>
      </q-tabs>

      <div class="q-gutter-y-sm">
        <q-tab-panels
          v-model="tab"
          animated
          transition-prev="jump-left"
          transition-next="jump-right"
          class="text-negative text-center"
        >
          <q-tab-panel name="mails" class="q-pa-none">
            <timelines/>
          </q-tab-panel>

          <q-tab-panel name="alarms">
            <q-page-sticky position="bottom-right" :offset="[18, 18]">
            <q-btn fab icon="cloud_upload" color="primary" />
          </q-page-sticky>
          </q-tab-panel>

          <q-tab-panel name="movies">
            <div class="text-h6">Movies</div>
            Nostrum necessitatibus expedita dolores? Voluptatem repudiandae magni ea.
          </q-tab-panel>
        </q-tab-panels>
      </div>
    </div>
  </div>
</template>

<script>
import timelines from 'components/timelines.vue'

export default {
  name: 'PageIndex',
  components: { timelines },
  data () {
    return {
      tab: 'mails'
    }
  }
}
</script>
<style scoped>
  .iconTab{
    border-radius: 5px;
    padding: 5px;
    margin:5px;
  }
</style>

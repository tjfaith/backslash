<template>
    <div>
        <!-- CARD  -->
              <q-card square class="q-mt-sm">
                <div class="cardBG row items-center">
                  <div class="col">
                    <q-card-section horizontal class="items-center">
                        <q-card-section class="col-5">
                          <q-img
                            class="rounded-borders "
                            src="~assets/logo.png"
                          />
                        </q-card-section>
                         <small class="text-left">
                           Yaba College of Technology
                        </small>
                    </q-card-section>
                  </div>
                  <div class="col">
                    <q-chip class="bg-white" color="negative">2015-2020</q-chip>
                    <q-icon name="edit" class="q-ma-md" @click="open('bottom')" />
                  </div>
                </div>
              </q-card>
              <div class="q-mt-md">
                <q-card class="q-pa-md q-my-xs">
                  <div class="row">
                  <div class="col-9 text-left">
                      <b>Introduction to Computer Science</b>
                  </div>
                  <div class="col">
                    <label for="">2015</label>
                  </div>
                  </div>

                  <div class="row">
                    <div class="col-9 text-left">
                      <div class="d-flex" style="display:flex; flex-wrap:wrap">
                        <small style="width:100%">Higher National Diploma</small>
                        <small style="width:100%">Computer Science</small>
                        <small style="width:100%">Full Time</small>
                        </div>
                        <q-rating size="18px" v-model="stars" :max="5" color="primary" />
                        <span class="text-caption text-grey q-ml-sm">4.2 (551)</span>
                    </div>
                    <div class="col">
                       <small>10 days ago</small>
                    </div>
                  </div>

                </q-card>

                <q-card class="q-pa-md q-my-xs">
                  <div class="row">
                  <div class="col-9 text-left">
                      <b>Introduction to Computer Science</b>
                  </div>
                  <div class="col">
                    <label for="">2015</label>
                  </div>
                  </div>

                  <div class="row">
                    <div class="col-9 text-left">
                      <div class="d-flex" style="display:flex; flex-wrap:wrap">
                        <small style="width:100%">Higher National Diploma</small>
                        <small style="width:100%">Computer Science</small>
                        <small style="width:100%">Full Time</small>
                        </div>
                        <q-rating size="18px" v-model="stars" :max="5" color="primary" />
                        <span class="text-caption text-grey q-ml-sm">4.2 (551)</span>
                    </div>
                    <div class="col">
                       <small>10 days ago</small>
                    </div>
                  </div>

                </q-card>
<q-card class="q-pa-md q-my-xs">
                  <div class="row">
                  <div class="col-9 text-left">
                      <b>Introduction to Computer Science</b>
                  </div>
                  <div class="col">
                    <label for="">2015</label>
                  </div>
                  </div>

                  <div class="row">
                    <div class="col-9 text-left">
                      <div class="d-flex" style="display:flex; flex-wrap:wrap">
                        <small style="width:100%">Higher National Diploma</small>
                        <small style="width:100%">Computer Science</small>
                        <small style="width:100%">Full Time</small>
                        </div>
                        <q-rating size="18px" v-model="stars" :max="5" color="primary" />
                        <span class="text-caption text-grey q-ml-sm">4.2 (551)</span>
                    </div>
                    <div class="col">
                       <small>10 days ago</small>
                    </div>
                  </div>
                </q-card>

                <q-card class="q-pa-md q-my-xs">
                  <div class="row">
                  <div class="col-9 text-left">
                      <b>Introduction to Computer Science</b>
                  </div>
                  <div class="col">
                    <label for="">2015</label>
                  </div>
                  </div>

                  <div class="row">
                    <div class="col-9 text-left">
                      <div class="d-flex" style="display:flex; flex-wrap:wrap">
                        <small style="width:100%">Higher National Diploma</small>
                        <small style="width:100%">Computer Science</small>
                        <small style="width:100%">Full Time</small>
                        </div>
                        <q-rating size="18px" v-model="stars" :max="5" color="primary" />
                        <span class="text-caption text-grey q-ml-sm">4.2 (551)</span>
                    </div>
                    <div class="col">
                       <small>10 days ago</small>
                    </div>
                  </div>

                </q-card>

              </div>
        <!-- dialog -->
          <constrainform />
    </div>
</template>
<script>
import constrainform from 'components/constrain_form.vue'
import { bus } from '../main'
export default {
  components: { constrainform },
  data () {
    return {
      stars: 5,
      date: null
    }
  },
  methods: {
    open (position) {
      bus.$emit('constrain_dialog', position)
    }
  },
  created () {
  }
}
</script>
<style scoped>
.my-card{
  width: 100%;
  max-width: 300px;
}
.cardBG{
  background: #3f393dcb;
  color:#fff;
}
</style>

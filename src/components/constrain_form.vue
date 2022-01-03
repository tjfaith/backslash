<template>
   <q-dialog v-model="dialog" :position="position" >

        <q-card style="width: 350px" class="q-pa-md">
        <!-- SELECT SCHOOL CODE -->
        <div class="text-h6">SELECT YOUR CONSTRAIN</div>
         <q-form
      @submit="onSubmit"
      @reset="onReset"
      class="q-gutter-md"
    >
    <!-- SCHOOL SELECT -->
    <q-select
        v-model="school_model"
        use-input
        input-debounce="0"
        :options="options"
        label="Select School"
        @filter="filterFn"
        @input="updateProgramType"
        class="q-ma-sm"
        style="width: 100%; padding-bottom: 12px"
      >
       <template v-slot:selected-item="scope">
          <q-chip
            dense
            :tabindex="scope.tabindex"
            color="white"
            text-color="primary"
            class="q-ma-none"
          >
          <img style="width:2em" :src="scope.opt.icon"/>

            <!-- <q-avatar color="primary" text-color="white" :icon="scope.opt.icon" /> -->
             {{ scope.opt.label }}
          </q-chip>
        </template>
        <template v-slot:no-option>
          <q-item>
            <q-item-section class="text-grey">
              No results
            </q-item-section>
          </q-item>
        </template>
      </q-select>
      <!-- PROGRAM SELECT -->
      <q-select
        v-model="program_model"
        :options="program"
        :disable="disable_program"
        @input="disable_program_type = false"
        label="Program Methods"
        class="q-ma-sm"
        style="width: 100%; "
      />
      <!-- PROGRAM TYPE SELECT -->
      <q-select
        v-model="program_type_model"
        :options="program_type"
        :disable="disable_program_type"
        @input="disable_department = false"
        label="Program Type"
        class="q-ma-sm"
        style="width: 100%; "
      />
       <!-- DEPARTMENT SELECT -->
      <q-select
        v-model="department_model"
        use-input
        :options="department_option"
        :disable="disable_department"
        label="Department"
        @filter="filterDep"
        class="q-ma-sm"
        style="width: 100%; "
      >
       <template v-slot:selected-item="scope">
          <!-- <q-chip
            dense
            :tabindex="scope2.tabindex"
            color="white"
            text-color="primary"
            class="q-ma-none"
          > -->
         {{ scope.opt.label }}
          <!-- </q-chip> -->
        </template>
        <template v-slot:no-option>
          <q-item>
            <q-item-section class="text-grey">
              No results
            </q-item-section>
          </q-item>
        </template>
      </q-select>
       <q-btn label="Submit" type="submit" color="primary"/>
       </q-form>
      </q-card>
   </q-dialog>
</template>
<script>
import { bus } from '../main'
export default {
  data () {
    return {
      dialog: false,
      position: 'top',

      //   school
      options: [],
      school_model: [],

      //   program
      program: [],
      program_model: [],
      disable_program: true,

      //   program type
      program_type_model: [],
      program_type: [],
      disable_program_type: true,

      //   Department
      department_model: [],
      department_option: [],
      disable_department: true
    }
  },
  methods: {
    onSubmit () {
      alert('submitted')
    },
    onReset () {},

    // Filter method for school
    filterFn (val, update, abort) {
      update(() => {
        const needle = val.toLowerCase()
        this.options = this.options.filter(v => v.label.toLowerCase().indexOf(needle) > -1)
        this.getAllSchools()
      })
    },

    // Filter method for department
    filterDep (val, update, abort) {
      update(() => {
        const needle2 = val.toLowerCase()
        this.department_option = this.department_option.filter(v => v.label.toLowerCase().indexOf(needle2) > -1)
        this.getAllDepartment()
      })
    },

    // api to get all school to the select list
    getAllSchools () {
      this.axios.get(this.$hostname + 'general_api.php?action=school', this.signup_data).then((response) => {
        for (let index = 0; index < response.data.length; index++) {
          this.options[index] = {
            school_id: response.data[index].school_id,
            label: response.data[index].school_title,
            value: response.data[index].school_id,
            icon: this.$imageFolder + 'schools/' + response.data[index].school_id + '/icon/' + response.data[index].school_icon,
            full_time: response.data[index].full_time,
            part_time: response.data[index].part_time,
            school_type: response.data[index].school_type
          }
        }
      }).catch(error => {
        alert(error)
      })
    },
    updateProgramType () {
      // rest program
      this.program = []
      this.program_type = []

      // rest program type
      this.program_type = []
      this.program_type_model = []

      // reset department
      this.department_option = []
      this.department_model = []
      this.disable_department = true

      // fill program type
      if (this.school_model.full_time === 1 || this.school_model.part_time === 1) {
        if (this.school_model.full_time === 1) {
          this.program.push('Full Time')
        }
        if (this.school_model.part_time === 1) {
          this.program.push('Part Time')
        }
        this.disable_program = false
      } else {
        this.disable_program = true
      }
      if (this.school_model.full_time === 0 && this.school_model.part_time === 0) {
        this.program_model = ['No Value for this school']
        this.disable_program_type = false
      } else {
        this.program_model = []
        this.disable_program_type = true
      }
      // get program type
      const schoolType = { school_type: this.school_model.school_type }
      this.axios.post(this.$hostname + 'general_api.php?action=program_type', schoolType).then((response) => {
        for (let index = 0; index < response.data.length; index++) {
          this.program_type.push(response.data[index].program_type_title)
        }
      }).catch((error) => {
        alert(error)
      })
      this.getAllDepartment()
    },

    // Get all department
    getAllDepartment () {
      const schoolId = { school_id: this.school_model.school_id }
      this.axios.post(this.$hostname + 'general_api.php?action=all_department', schoolId).then((response) => {
        for (let index = 0; index < response.data.length; index++) {
          this.department_option[index] = {
            department_id: response.data[index].department_id,
            label: response.data[index].department_title,
            school_id: response.data[index].school_id
          }
        }
      }).catch((error) => {
        alert(error)
      })
    }
  },
  created () {
    bus.$on('constrain_dialog', (position) => {
      this.position = position
      this.dialog = true
      this.getAllSchools()
    })
  }
}
</script>
